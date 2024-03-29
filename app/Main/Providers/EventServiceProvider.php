<?php

declare(strict_types=1);

namespace App\Main\Providers;

use App\Domain\DomainContainer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
        DomainContainer::observers();
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
