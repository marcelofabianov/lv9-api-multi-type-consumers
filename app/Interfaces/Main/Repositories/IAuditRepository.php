<?php

declare(strict_types=1);

namespace App\Interfaces\Main\Repositories;

use App\Interfaces\Domain\Models\IAuditModel;
use App\Interfaces\Main\Dto\IAuditSaveDto;

interface IAuditRepository
{
    public function __construct(IAuditModel $auditModel);

    public function save(IAuditSaveDto $dto): void;
}
