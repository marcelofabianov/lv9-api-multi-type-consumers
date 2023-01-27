<?php

declare(strict_types=1);

use App\Interfaces\Main\Dto\IAuditSaveDto;
use App\Interfaces\Main\Repositories\IAuditRepository;
use App\Main\Services\AuditService;

test('Using the Audit Service class and calling the save method, it should execute the save method of the repository', function () {
    $auditRepository = $this->createMock(IAuditRepository::class);

    $auditSaveDto = $this->createMock(IAuditSaveDto::class);
    $auditRepository->expects($this->once())->method('save')->with($this->equalTo($auditSaveDto));

    $auditService = new AuditService($auditRepository);

    $auditService->save($auditSaveDto);
})
    ->group('Services')
    ->group('Unit');
