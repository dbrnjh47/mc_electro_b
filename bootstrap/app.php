<?php

use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Middleware\CityMiddleware;
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
        $middleware->encryptCookies(except: [
            'city_id', 'user_currency',
        ]);

        $middleware->append(\Illuminate\Session\Middleware\StartSession::class);
        // $middleware->append(LocaleMiddleware::class);
        $middleware->append(CityMiddleware::class);
        $middleware->web(append: [
            // \Illuminate\Session\Middleware\StartSession::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
