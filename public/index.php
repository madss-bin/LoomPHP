<?php

$envPath = __DIR__ . "/../.env";
if (file_exists($envPath)) {
    foreach (
        file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
        as $line
    ) {
        $line = trim($line);
        if ($line === "" || str_starts_with($line, "#")) {
            continue;
        }
        $parts = explode("=", $line, 2);
        if (count($parts) < 2) {
            continue;
        }
        $key = trim($parts[0]);
        $value = trim(trim($parts[1]), '"\'');
        if (getenv($key) === false) {
            putenv("$key=$value");
            $_ENV[$key] = $value;
        }
    }
}

session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use LoomPHP\Config;
use LoomPHP\Csrf;
use LoomPHP\Seo;

define("IS_DEV", getenv("APP_ENV") !== "production");

// Error handling
if (!IS_DEV) {
    error_reporting(0);
    ini_set("display_errors", "0");
    ini_set("log_errors", "1");
} else {
    error_reporting(E_ALL);
    ini_set("display_errors", "1");
}

if (file_exists(__DIR__ . "/../src/hooks.php")) {
    require_once __DIR__ . "/../src/hooks.php";
}

/**
 * @param string $buffer
 * @return string
 */
function minify_html(string $buffer): string
{
    $protected = [];
    $placeholder = '%%PROTECTED_' . uniqid() . '%%';
    $count = 0;
    
    $buffer = preg_replace_callback(
        '/<(script|style|pre)\b[^>]*>.*?<\/\1>/s',
        function ($matches) use (&$protected, &$count, $placeholder) {
            $key = $placeholder . $count . '%%';
            $protected[$key] = $matches[0];
            $count++;
            return $key;
        },
        $buffer
    );
    
    $buffer = preg_replace('/<!--(?![\s\[]).*?-->/s', '', $buffer);
    
    $buffer = preg_replace('/>\s+</', '><', $buffer);
    
    $buffer = trim($buffer);
    
    $buffer = preg_replace('/\s+/', ' ', $buffer);
    
    foreach ($protected as $key => $content) {
        $buffer = str_replace($key, $content, $buffer);
    }
    
    return $buffer;
}

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$trailingSlashPolicy = Config::get("trailing_slash", "never");
$hasTrailingSlash = $uri !== "/" && str_ends_with($uri, "/");
$normalized = rtrim($uri, "/") ?: "/";

if ($trailingSlashPolicy === "never" && $hasTrailingSlash) {
    header("HTTP/1.1 308 Permanent Redirect");
    header("Location: $normalized");
    exit();
}

if ($trailingSlashPolicy === "always" && !$hasTrailingSlash && $uri !== "/") {
    header("HTTP/1.1 308 Permanent Redirect");
    header("Location: $uri/");
    exit();
}

$uri = $normalized;

Csrf::check();

/** @var string */
$path = null;
/** @var array */
$routeParams = [];
/** @var string[]  */
$layouts = [];

if (str_starts_with($uri, "/api/")) {
    $apiFile = __DIR__ . "/../src/api/" . ltrim(substr($uri, 5), "/") . ".php";
    if (file_exists($apiFile)) {
        header("Content-Type: application/json");
        require $apiFile;
        exit();
    }
    $apiResult = matchDynamicRoute(
        ltrim(substr($uri, 5), "/"),
        __DIR__ . "/../src/api",
        $routeParams,
    );
    if ($apiResult !== null) {
        header("Content-Type: application/json");
        require $apiResult["file"];
        exit();
    }
    http_response_code(404);
    header("Content-Type: application/json");
    echo json_encode(["error" => "Not found"]);
    exit();
}

$pageFile = $uri === "/" ? "" : ltrim($uri, "/");

$paths =
    $pageFile === ""
        ? [
            __DIR__ . "/../src/pages/index.php",
            __DIR__ . "/../src/pages/home/+page.php",
            __DIR__ . "/../src/pages/home.php",
        ]
        : [
            __DIR__ . "/../src/pages/{$pageFile}/index.php",
            __DIR__ . "/../src/pages/{$pageFile}.php",
            __DIR__ . "/../src/pages/{$pageFile}/home.php",
            __DIR__ . "/../src/pages/{$pageFile}/+page.php",
        ];

foreach ($paths as $p) {
    if (file_exists($p)) {
        $path = $p;
        break;
    }
}

if ($path === null) {
    $dynamicResult = matchDynamicRoute(
        $pageFile,
        __DIR__ . "/../src/pages",
        $routeParams,
    );
    if ($dynamicResult !== null) {
        $path = $dynamicResult["file"];
        $layouts = $dynamicResult["layouts"];
    }
}

if ($path === null) {
    http_response_code(404);
    $errorCode = 404;
    $path = __DIR__ . "/../src/pages/error.php";
}

if ($layouts === []) {
    $segments = $pageFile === "" ? [] : explode("/", $pageFile);
    $layoutDir = __DIR__ . "/../src/pages";
    foreach ($segments as $seg) {
        $layoutDir .= "/{$seg}";
        if (file_exists("{$layoutDir}/layout.php")) {
            $layouts[] = "{$layoutDir}/layout.php";
        }
    }
}

set_exception_handler(function (Throwable $e) {
    http_response_code(500);
    $errorCode = 500;
    $seo = new Seo();
    ob_clean();
    ob_start();
    require __DIR__ . "/../src/pages/error.php";
    $content = ob_get_clean();
    if (!IS_DEV) {
        $content = minify_html($content);
    }
    require __DIR__ . "/../src/pages/layout.php";
    exit();
});

$pageData = [];
$seo = new Seo();

ob_start();
require $path;
$content = ob_get_clean();

foreach (array_reverse($layouts) as $layout) {
    ob_start();
    require $layout;
    $content = ob_get_clean();
}

ob_start();
require __DIR__ . "/../src/pages/layout.php";
$html = ob_get_clean();

if (!IS_DEV) {
    $html = minify_html($html);
}

echo $html;

/**
 *
 * @param string $path
 * @param string $baseDir
 * @param array  $params
 * @return array|null
 */
function matchDynamicRoute(
    string $path,
    string $baseDir,
    array &$params,
): ?array {
    if ($path === "" || $path === "/") {
        return null;
    }

    $path = rtrim($path, "/");
    $baseDir = rtrim($baseDir, "/");

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator(
            $baseDir,
            RecursiveDirectoryIterator::SKIP_DOTS,
        ),
    );

    foreach ($iterator as $file) {
        if (!$file->isFile() || $file->getExtension() !== "php") {
            continue;
        }

        $relPath = substr($file->getPathname(), strlen($baseDir) + 1);

        if (!str_contains($relPath, "[")) {
            continue;
        }

        $filename = $file->getFilename();
        if ($filename === "layout.php" || $filename === "+page.php") {
            continue;
        }

        $quoted = preg_quote($relPath, "#");
        $regex =
            "#^" .
            preg_replace_callback(
                "/\\\\\[(\w+)\\\\\]/",
                fn($m) => "(?P<{$m[1]}>[^/]+)",
                $quoted,
            ) .
            "$#";

        if (preg_match($regex, $path . ".php", $matches)) {
            $params = array_filter(
                $matches,
                fn($k) => is_string($k),
                ARRAY_FILTER_USE_KEY,
            );
            $layouts = [];
            $dir = dirname($file->getPathname());
            $dirPath = "";
            $patternDir = dirname($relPath);
            $segments = $patternDir === "." ? [] : explode("/", $patternDir);
            foreach ($segments as $seg) {
                $dirPath .= "/{$seg}";
                $layoutFile = $baseDir . $dirPath . "/layout.php";
                if (file_exists($layoutFile)) {
                    $layouts[] = $layoutFile;
                }
            }

            return [
                "file" => $file->getPathname(),
                "layouts" => $layouts,
            ];
        }
    }

    return null;
}
