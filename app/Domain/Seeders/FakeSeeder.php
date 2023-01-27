<?php

declare(strict_types=1);

namespace App\Domain\Seeders;

use App\Domain\Models\User;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\ClientRepository;
use Latte\Uuid;

class FakeSeeder
{
    public function run(): void
    {
        $user = User::factory()->createOne([
            'id' => Uuid::random()->getValue(),
            'email' => 'me@fake.com',
            'name' => fake()->name,
        ]);

        $client = new ClientRepository();
        $client = $client->create(
            $user->id,
            env('APP_NAME'),
            '',
            null,
            true,
            true
        );

        $template = Storage::disk('local')->get('commands/oauth/template.json');

        $params = [
            '{{GRANT_TYPE}}',
            '{{CLIENT_ID}}',
            '{{CLIENT_SECRET}}',
            '{{USERNAME}}',
            '{{PASSWORD}}',
            '{{SCOPE}}',
        ];

        $values = [
            'password',
            $client->id,
            $client->secret,
            $user->email,
            'password',
            'common',
        ];

        ds(str_replace($params, $values, $template))->label('Fake: OAuth');
    }
}
