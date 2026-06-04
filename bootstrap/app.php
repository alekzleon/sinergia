<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$basePath = dirname(__DIR__);
$publicPath = $_ENV['APP_PUBLIC_PATH'] ?? $_SERVER['APP_PUBLIC_PATH'] ?? getenv('APP_PUBLIC_PATH') ?: null;

if (! $publicPath && is_file($basePath.'/.env')) {
    foreach (file($basePath.'/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), 'APP_PUBLIC_PATH=')) {
            $publicPath = trim(substr(trim($line), strlen('APP_PUBLIC_PATH=')), " \t\n\r\0\x0B\"'");
            break;
        }
    }
}

$app = Application::configure(basePath: $basePath)
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

if ($publicPath) {
    $app->usePublicPath($publicPath);
}

return $app;
