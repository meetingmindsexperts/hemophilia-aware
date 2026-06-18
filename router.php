<?php
/**
 * router.php — LOCAL DEV ONLY router for PHP's built-in server.
 *
 * The built-in server (`php -S`) does NOT read .htaccess, so clean URLs like
 * /nurses or /patient/register would otherwise fall through to the home page.
 * This mirrors the production .htaccess routing for local testing.
 *
 * Run with:  php -S 127.0.0.1:8099 router.php
 * Production uses .htaccess (Apache) and ignores this file.
 */
declare(strict_types=1);

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

// Serve existing real files (assets, *.php, *.css, fonts, …) as-is.
if ($path !== '/' && is_file(__DIR__ . $path)) {
    return false;
}

// /{slug}/register  ->  register.php?event={slug}
if (preg_match('#^/(patient|nurses|physician)/register/?$#', $path, $m)) {
    $_GET['event'] = $m[1];
    require __DIR__ . '/register.php';
    return true;
}

// /{slug}  ->  {slug}.php
if (preg_match('#^/(patient|nurses|physician)/?$#', $path, $m)) {
    require __DIR__ . '/' . $m[1] . '.php';
    return true;
}

// Clean path that maps directly to a real .php file (e.g. /register).
$asPhp = __DIR__ . '/' . trim($path, '/') . '.php';
if ($path !== '/' && is_file($asPhp)) {
    require $asPhp;
    return true;
}

// Everything else -> home.
require __DIR__ . '/index.php';
return true;
