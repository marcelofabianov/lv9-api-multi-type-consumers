<?php

declare(strict_types=1);

namespace App\Interfaces\Domain\Observers;

use App\Interfaces\Domain\Models\IUserModel;
use App\Interfaces\Main\Base\Domain\IObserver;

interface IUserObserver extends IObserver
{
    public function created(IUserModel $user): void;

    public function updating(IUserModel $user): void;

    public function updated(IUserModel $user): void;

    public function deleted(IUserModel $user): void;

    public function restored(IUserModel $user): void;
}
