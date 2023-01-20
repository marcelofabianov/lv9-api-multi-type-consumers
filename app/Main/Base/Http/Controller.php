<?php

declare(strict_types=1);

namespace App\Main\Base\Http;

use App\Interfaces\Main\Base\Http\IController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController implements IController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
}
