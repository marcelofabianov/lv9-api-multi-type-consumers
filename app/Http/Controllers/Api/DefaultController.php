<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => [],
            'status' => [
                'code' => Response::HTTP_OK,
                'message' => 'OK',
            ],
        ]);
    }
}
