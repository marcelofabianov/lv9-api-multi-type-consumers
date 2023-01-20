<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Domain\Seeders\FakeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if ((bool) env('APP_FAKE_SEEDERS', false)) {
            (new FakeSeeder())->run();
        }
    }
}
