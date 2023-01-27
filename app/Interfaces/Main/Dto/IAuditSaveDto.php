<?php

declare(strict_types=1);

namespace App\Interfaces\Main\Dto;

use App\Domain\Enums\AuditEventTypeEnum;
use Latte\Email;
use Latte\Json;
use Latte\Uuid;

/**
 * @property-read Uuid $targetRecordId
 * @property-read Uuid $userId
 * @property-read string $name
 * @property-read Email $email
 * @property-read string $model
 * @property-read AuditEventTypeEnum $eventType
 * @property-read Json|null $recordBeforeOperation
 * @property-read Json|null $recordAfterOperation
 * @property-read string|null $observations
 */
interface IAuditSaveDto
{
    public function __construct(
        Uuid $targetRecordId,
        Uuid $userId,
        string $name,
        Email $email,
        string $model,
        AuditEventTypeEnum $eventType,
        ?Json $recordBeforeOperation,
        ?Json $recordAfterOperation,
        string|null $observations = null
    );

    public function toArray(): array;
}
