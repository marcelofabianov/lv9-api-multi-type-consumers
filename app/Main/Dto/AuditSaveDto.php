<?php

declare(strict_types=1);

namespace App\Main\Dto;

use App\Domain\Enums\AuditEventTypeEnum;
use App\Interfaces\Main\Dto\IAuditSaveDto;
use Latte\Email;
use Latte\Json;
use Latte\Uuid;

final class AuditSaveDto implements IAuditSaveDto
{
    public function __construct(
        public readonly Uuid $targetRecordId,
        public readonly Uuid $userId,
        public readonly string $name,
        public readonly Email $email,
        public readonly string $model,
        public readonly AuditEventTypeEnum $eventType,
        public readonly ?Json $recordBeforeOperation,
        public readonly ?Json $recordAfterOperation,
        public readonly string|null $observations = null
    ) {
    }

    public function toArray(): array
    {
        $before = is_null($this->recordBeforeOperation) ? null : $this->recordBeforeOperation->encode();
        $after = is_null($this->recordAfterOperation) ? null : $this->recordAfterOperation->encode();

        return [
            'targetRecordId' => $this->targetRecordId->getValue(),
            'userId' => $this->userId->getValue(),
            'name' => $this->name,
            'email' => $this->email,
            'model' => $this->model,
            'eventType' => $this->eventType->value,
            'recordBeforeOperation' => $before,
            'recordAfterOperation' => $after,
            'observations' => $this->observations,
        ];
    }
}
