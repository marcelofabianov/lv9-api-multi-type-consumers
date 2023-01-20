<?php

declare(strict_types=1);

namespace App\Main\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JsonResponse
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $request->header('Accept', 'application/json');
        $request->header('Content-Type', 'application/json');

        return $next($request);
    }
}
