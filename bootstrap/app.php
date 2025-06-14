<?php

// bootstrap/app.php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Ini adalah bagian penting untuk Laravel 11:
        // Mendaftarkan alias untuk route middleware
        $middleware->alias([
            // 'auth' => \App\Http\Middleware\Authenticate::class,
            // 'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'admin' => \App\Http\Middleware\IsAdmin::class, // <-- Tambahkan baris ini
            // ... alias lain dari Breeze jika ada
        ]);

        // Anda tidak perlu membuat grup middleware terpisah kecuali ada kebutuhan sangat spesifik
        // Middleware global (berlaku untuk semua request) atau web/api group bisa ditambahkan di sini juga
        // Contoh untuk menambahkan middleware ke grup 'web' (optional, IsAdmin lebih baik di alias)
        // $middleware->web(append: [
        //     \App\Http\Middleware\TrimStrings::class,
        // ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
