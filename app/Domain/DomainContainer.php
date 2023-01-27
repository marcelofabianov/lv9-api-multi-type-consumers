<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Models\Audit;
use App\Domain\Models\User;
use App\Domain\Observers\UserObserver;
use App\Interfaces\Domain\Models\IAuditModel;
use App\Interfaces\Domain\Models\IUserModel;

final class DomainContainer
{
    public static function register(): void
    {
        self::models();
    }

    protected static function models(): void
    {
        app()->bind(IAuditModel::class, function () {
            return new Audit();
        });

        app()->bind(IUserModel::class, function () {
            return new User();
        });
    }

    public static function observers(): void
    {
        User::observe(UserObserver::class);
    }
}
