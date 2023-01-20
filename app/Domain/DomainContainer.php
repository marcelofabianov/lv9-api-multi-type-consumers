<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Models\User;
use App\Domain\Observers\UserObserver;
use App\Interfaces\Domain\Models\IUserModel;

class DomainContainer
{
    public static function register(): void
    {
        self::models();
        self::observers();
    }

    protected static function models(): void
    {
        app()->bind(IUserModel::class, function () {
            return new User();
        });
    }

    protected static function observers(): void
    {
        User::observe(UserObserver::class);
    }
}
