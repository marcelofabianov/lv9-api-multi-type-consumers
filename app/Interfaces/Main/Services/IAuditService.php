<?php

declare(strict_types=1);

namespace App\Interfaces\Main\Services;

use App\Interfaces\Main\Dto\IAuditSaveDto;
use App\Interfaces\Main\Repositories\IAuditRepository;

interface IAuditService
{
    public function __construct(IAuditRepository $repository);

    public function save(IAuditSaveDto $dto): void;
}
