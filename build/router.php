<?php
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if ($uri !== "/" && is_file(__DIR__ . $uri)) {
    return false;
}

$buildFile = __DIR__ . "/../build" . $uri;
if ($uri !== "/" && is_file($buildFile)) {
    // MIME type mapping
    $mimeTypes = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'mjs' => 'application/javascript',
        'json' => 'application/json',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'webp' => 'image/webp',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf' => 'font/ttf',
        'eot' => 'application/vnd.ms-fontobject',
        'otf' => 'font/otf',
    ];
    
    $ext = strtolower(pathinfo($buildFile, PATHINFO_EXTENSION));
    $mimeType = $mimeTypes[$ext] ?? 'application/octet-stream';
    
    header("Content-Type: $mimeType");
    header("Content-Length: " . filesize($buildFile));
    readfile($buildFile);
    exit;
}

require __DIR__ . "/index.php";
