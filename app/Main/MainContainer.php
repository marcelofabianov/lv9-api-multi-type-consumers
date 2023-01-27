<?php

declare(strict_types=1);

namespace App\Main;

use App\Domain\DomainContainer;
use App\Interfaces\Domain\Models\IAuditModel;
use App\Interfaces\Main\Repositories\IAuditRepository;
use App\Interfaces\Main\Services\IAuditService;
use App\Main\Repositories\AuditRepository;
use App\Main\Services\AuditService;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class MainContainer
{
    public static function register(): void
    {
        DomainContainer::register();
        self::audit();
    }

    protected static function audit(): void
    {
        app()->bind(IAuditRepository::class, function () {
            $model = app()->get(IAuditModel::class);

            return new AuditRepository($model);
        });

        app()->bind(IAuditService::class, function () {
            $repository = app()->get(IAuditRepository::class);

            return new AuditService($repository);
        });
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
                'json.response',
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
