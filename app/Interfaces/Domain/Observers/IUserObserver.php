<?php

declare(strict_types=1);

namespace App\Interfaces\Domain\Observers;

use App\Interfaces\Domain\Models\IUserModel;
use App\Interfaces\Main\Base\Domain\IObserver;

interface IUserObserver extends IObserver
{
    public function created(IUserModel $model): void;

    public function updated(IUserModel $model): void;

    public function deleted(IUserModel $model): void;

    public function restored(IUserModel $model): void;
}
