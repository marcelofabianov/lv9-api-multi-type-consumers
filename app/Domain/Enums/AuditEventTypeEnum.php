<?php

declare(strict_types=1);

namespace App\Domain\Enums;

enum AuditEventTypeEnum: string
{
    case RETRIEVED = 'RETRIEVED';
    case CREATING = 'CREATING';
    case CREATED = 'CREATED';
    case UPDATING = 'UPDATING';
    case UPDATED = 'UPDATED';
    case SAVING = 'SAVING';
    case SAVED = 'SAVED';
    case DELETING = 'DELETING';
    case DELETED = 'DELETED';
    case TRASHED = 'TRASHED';
    case FORCE_DELETED = 'FORCE_DELETED';
    case RESTORING = 'RESTORING';
    case RESTORED = 'RESTORED';
    case REPLICATING = 'REPLICATING';
}
