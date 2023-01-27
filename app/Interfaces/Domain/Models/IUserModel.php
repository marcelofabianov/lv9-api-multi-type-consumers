<?php

declare(strict_types=1);

namespace App\Interfaces\Domain\Models;

use App\Interfaces\Main\Base\Domain\IModel;

/**
 * @property string $name
 * @property string $email
 * @property string $password
 * @property bool $status
 * @method IUserModel query() static
 * @method IUserModel find(string $uuid)
 */
interface IUserModel extends IModel
{
}
