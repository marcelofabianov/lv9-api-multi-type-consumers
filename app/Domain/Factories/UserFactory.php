<?php

declare(strict_types=1);

namespace App\Domain\Factories;

use App\Domain\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Latte\Uuid;

/**
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
final class UserFactory extends Factory
{
    public $model = User::class;

    public function definition(): array
    {
        return [
            'uuid' => Uuid::random()->getValue(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'inactivatedIn' => null,
            'createdAt' => now(),
            'updatedAt' => now(),
        ];
    }

    public function unverified(): self
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
