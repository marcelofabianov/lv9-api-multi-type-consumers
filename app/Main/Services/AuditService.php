<?php

declare(strict_types=1);

namespace App\Main\Services;

use App\Interfaces\Main\Dto\IAuditSaveDto;
use App\Interfaces\Main\Repositories\IAuditRepository;
use App\Interfaces\Main\Services\IAuditService;

final class AuditService implements IAuditService
{
    public function __construct(
        private readonly IAuditRepository $repository
    ) {
    }

    public function save(IAuditSaveDto $dto): void
    {
        $this->repository->save($dto);
    }
}
