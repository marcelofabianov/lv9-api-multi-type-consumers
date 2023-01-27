<?php

declare(strict_types=1);

namespace App\Domain\Factories;

use App\Domain\Models\Audit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Latte\Uuid;

final class AuditFactory extends Factory
{
    public $model = Audit::class;

    public function definition(): array
    {
        return [
            'uuid' => Uuid::random()->getValue(),
            'targetRecordId' => '',
            'userId' => '',
            'name' => '',
            'email' => '',
            'model' => '',
            'eventType' => '',
            'recordBeforeOperation' => '',
            'recordAfterOperation' => '',
            'createdAt' => now(),
            'updatedAt' => now(),
        ];
    }
}
