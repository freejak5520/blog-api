<?php

declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(append: 'auth:api', prepend: [
            EnsureFrontendRequestsAreStateful::class,
        ]);

//        $middleware->alias([
//            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
//        ]);
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $exception) {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        });

        $exceptions->shouldRenderJsonWhen(function (\Illuminate\Http\Request $request) {
            if ($request->is("api/*")) {
                return true;
            }
            return false;
        });
    })->create();
