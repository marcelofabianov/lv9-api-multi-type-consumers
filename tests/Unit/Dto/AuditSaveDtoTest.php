<?php

declare(strict_types=1);

use App\Domain\Enums\AuditEventTypeEnum;
use App\Domain\Models\User;
use App\Main\Dto\AuditSaveDto;
use Latte\Email;
use Latte\Uuid;

test('Create an instance of AuditSaveDto with the specified properties', function () {
    $expected = [
        'targetRecordId' => Uuid::random()->getValue(),
        'userId' => Uuid::random()->getValue(),
        'name' => fake()->name,
        'email' => fake()->email,
        'model' => User::class,
        'eventType' => AuditEventTypeEnum::CREATED->value,
        'recordBeforeOperation' => null,
        'recordAfterOperation' => null,
        'observations' => null,
    ];

    $dto = new AuditSaveDto(
        Uuid::create($expected['targetRecordId']),
        Uuid::create($expected['userId']),
        $expected['name'],
        Email::create($expected['email']),
        User::class,
        AuditEventTypeEnum::CREATED,
        null,
        null
    );

    expect($dto->toArray())->toEqual($expected);
})
    ->group('Dto')
    ->group('Unit');
