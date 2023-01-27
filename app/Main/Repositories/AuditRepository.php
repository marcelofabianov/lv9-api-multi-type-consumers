<?php

declare(strict_types=1);

namespace App\Main\Repositories;

use App\Interfaces\Domain\Models\IAuditModel;
use App\Interfaces\Main\Dto\IAuditSaveDto;
use App\Interfaces\Main\Repositories\IAuditRepository;

final class AuditRepository implements IAuditRepository
{
    public function __construct(
        private readonly IAuditModel $auditModel
    ) {
    }

    public function save(IAuditSaveDto $dto): void
    {
        $audit = $this->auditModel->newInstance();
        $audit->fill($dto->toArray());
        $audit->save();
    }
}
