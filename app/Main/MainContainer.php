<?php

declare(strict_types=1);

namespace App\Main;

use App\Domain\DomainContainer;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class MainContainer
{
    public static function register(): void
    {
        DomainContainer::register();
    }

    public static function httpRoutes(): void
    {
        // Root
        Route::get('/', fn () => response()->json());

        self::httpRoutesApi();
    }

    protected static function httpRoutesApi(): void
    {
        Route::as('api.')
            ->prefix('api')
            ->middleware([
                'api',
                'auth:api',
            ])->group(function () {
                // Default Route API
                Route::get('/', fn () => response()->json([
                    'data' => [],
                    'status' => [
                        'code' => Response::HTTP_OK,
                        'message' => 'OK',
                    ],
                ]));

                //
            });
    }
}
