<?php

declare(strict_types=1);

use App\Domain\Enums\AuditEventTypeEnum;
use App\Domain\Models\Audit;
use App\Domain\Models\User;
use App\Interfaces\Main\Repositories\IAuditRepository;
use App\Main\Dto\AuditSaveDto;
use Latte\Email;
use Latte\Uuid;

test('Should create an audit record', function () {
    $user = User::factory()->createOneQuietly();

    $dto = new AuditSaveDto(
        targetRecordId: Uuid::random(),
        userId: Uuid::create($user->uuid),
        name: fake()->name,
        email: Email::create(fake()->email),
        model: User::class,
        eventType: AuditEventTypeEnum::UPDATING,
        recordBeforeOperation: null,
        recordAfterOperation: null
    );

    /**
     * @var IAuditRepository $repository
     */
    $repository = app()->get(IAuditRepository::class);
    $repository->save($dto);

    $audit = Audit::first();

    $expected = [
        'uuid' => $audit->uuid,
        'targetRecordId' => $dto->targetRecordId->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'email' => $dto->email->getValue(),
        'model' => $dto->model,
        'eventType' => $dto->eventType->value,
        'recordBeforeOperation' => $dto->recordBeforeOperation,
        'recordAfterOperation' => $dto->recordAfterOperation,
        'observations' => $dto->observations,
        'createdAt' => $audit->createdAt->toISOString(),
        'updatedAt' => $audit->updatedAt->toISOString(),
        'deletedAt' => null,
    ];

    expect($audit->toArray())->toEqual($expected);
})
    ->group('Repositories')
    ->group('Integration');
