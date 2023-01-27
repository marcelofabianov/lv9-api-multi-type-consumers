<?php

declare(strict_types=1);

namespace App\Domain\Observers;

use App\Domain\Enums\AuditEventTypeEnum;
use App\Interfaces\Main\Base\Domain\IModel;
use App\Main\Dto\AuditSaveDto;
use Illuminate\Contracts\Auth\Authenticatable;
use Latte\Json;
use Latte\Uuid;

trait AuditSave
{
    private readonly Authenticatable|null $user;

    private readonly string $model;

    private function audit(
        AuditEventTypeEnum $eventType,
        string $targetRecordId,
        IModel|null $before,
        IModel|null $after
    ): void {
        $before = is_null($before) ? null : Json::create($before->toArray());
        $after = is_null($after) ? null : Json::create($after->toArray());

        $dto = new AuditSaveDto(
            Uuid::create($targetRecordId),
            Uuid::create($this->user->id),
            $this->user->name,
            $this->user->email,
            $this->model,
            $eventType,
            $before,
            $after,
        );

        $this->auditService->save($dto);
    }
}
