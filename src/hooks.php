<?php
/**
 * LoomPHP Global Hooks / Middleware
 * 
 * This file runs before any route or API endpoint is executed.
 * You can use it to intercept requests, perform authentication checks,
 * inject response headers, or bootstrap global configurations.
 * 
 */

// Example Hook 1: Custom Global Headers
header("X-Powered-By: LoomPHP");

// Example Hook 2: Simple Authentication / Session Guard
// If you want to restrict access to a subpage, you can check it here:
/*
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
if (str_starts_with($uri, "/admin") && !isset($_SESSION["admin_logged_in"])) {
    header("Location: /login");
    exit();
}
*/
