<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function () { 
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Sizin V1 versiyonlama dosyanız:
            Route::middleware('api')
                ->prefix('api/v1') // URL'ye otomatik /api/v1 ön eki ekler
                ->group(base_path('routes/api/v1/v1.php'));
        },
    )
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
