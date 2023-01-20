<?php

declare(strict_types=1);

use App\Domain\Models\User;
use Laravel\Passport\Passport;
use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\get;

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
