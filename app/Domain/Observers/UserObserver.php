<?php

declare(strict_types=1);

namespace App\Domain\Observers;

use App\Domain\Enums\AuditEventTypeEnum;
use App\Domain\Models\User;
use App\Interfaces\Domain\Models\IUserModel;
use App\Interfaces\Domain\Observers\IUserObserver;
use App\Interfaces\Main\Services\IAuditService;

final class UserObserver implements IUserObserver
{
    use AuditSave;

    public function __construct(
        private readonly IAuditService $auditService
    ) {
        $this->user = auth()->user();
        $this->model = User::class;
    }

    public function created(IUserModel $user): void
    {
        if (auth()->check()) {
            $this->audit(AuditEventTypeEnum::CREATED, $user->uuid, null, $user);
        }
    }

    public function updating(IUserModel $user): void
    {
        if (auth()->check()) {
            $before = User::query()->find($user->uuid);
            $this->audit(AuditEventTypeEnum::UPDATING, $user->uuid, $before, $user);
        }
    }

    public function updated(IUserModel $user): void
    {
        if (auth()->check()) {
            $this->audit(AuditEventTypeEnum::UPDATED, $user->uuid, null, $user);
        }
    }

    public function deleted(IUserModel $user): void
    {
        if (auth()->check()) {
            $this->audit(AuditEventTypeEnum::DELETED, $user->uuid, $user, null);
        }
    }

    public function restored(IUserModel $user): void
    {
        if (auth()->check()) {
            $this->audit(AuditEventTypeEnum::RESTORED, $user->uuid, null, $user);
        }
    }
}
