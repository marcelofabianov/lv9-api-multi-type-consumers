<?php

declare(strict_types=1);

use function Pest\Laravel\get;

test('Visit root url', function () {
    $actual = get('/')
        ->assertOk()
        ->json();

    expect($actual)->toEqual([]);
})->group('example');
