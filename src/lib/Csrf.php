<?php

namespace LoomPHP;

class Csrf
{
    public static function token(): string
    {
        if (empty($_SESSION["_csrf_token"])) {
            $_SESSION["_csrf_token"] = bin2hex(random_bytes(32));
        }
        return $_SESSION["_csrf_token"];
    }

    public static function hidden(): string
    {
        return '<input type="hidden" name="_csrf_token" value="' .
            self::token() .
            '">';
    }

    public static function validate(?string $token = null): bool
    {
        $token ??=
            $_POST["_csrf_token"] ?? ($_SERVER["HTTP_X_CSRF_TOKEN"] ?? "");
        $stored = $_SESSION["_csrf_token"] ?? "";
        return $token !== "" && $stored !== "" && hash_equals($stored, $token);
    }

    public static function check(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !self::validate()) {
            $isJson = str_starts_with(
                $_SERVER["CONTENT_TYPE"] ?? "",
                "application/json",
            );
            if ($isJson) {
                http_response_code(419);
                header("Content-Type: application/json");
                echo json_encode(["error" => "CSRF token validation failed"]);
                exit();
            }
            http_response_code(419);
            echo '<!DOCTYPE html><html class="dark"><head><meta charset="UTF-8"><title>419 Expired</title>';
            echo "<style>body{font-family:system-ui;display:flex;justify-content:center;align-items:center;min-height:100vh;margin:0;background:#000;color:#fafafa}";
            echo ".card{text-align:center}h1{font-size:4rem;margin:0}pre{color:#888}</style></head>";
            echo '<body><div class="card"><h1>419</h1><p>Session expired or invalid form submission.</p><pre>¯\_(ツ)_/¯</pre></div></body></html>';
            exit();
        }
    }
}
