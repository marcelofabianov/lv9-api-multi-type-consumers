<?php

declare(strict_types=1);

use App\Models\User;
use Laravel\Passport\Passport;

use function Pest\Laravel\get;

use Symfony\Component\HttpFoundation\Response;

test('Visiting the API default private route', function () {
    $user = User::factory()->createOne();
    Passport::actingAs($user, ['common']);

    $actual = get('/api')
        ->assertOk()
        ->json();

    $expected = [
        'data' => [],
        'status' => [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
        ],
    ];

    expect($expected)->toEqual($actual);
})->group('example');
