<?php
$errorCode = $errorCode ?? 500;
$errorMessage = $errorMessage ?? "Internal Server Error";
$codes = [
    400 => "Bad Request",
    403 => "Forbidden",
    404 => "Not Found",
    500 => "Internal Server Error",
    503 => "Service Unavailable",
];
$seo->title("{$errorCode} — LoomPHP");
?>
<div class="py-20 px-4 pt-14 text-center">
    <h1 class="text-6xl font-bold text-muted-foreground"><?= $errorCode ?></h1>
    <p class="mt-4 text-lg text-muted-foreground"><?= htmlspecialchars(
        $codes[$errorCode] ?? $errorMessage,
    ) ?></p>
    <a href="/" class="btn mt-6">Go Home</a>
</div>
