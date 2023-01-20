<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::name('default')->get('/', [\App\Http\Controllers\Api\DefaultController::class, 'index']);
