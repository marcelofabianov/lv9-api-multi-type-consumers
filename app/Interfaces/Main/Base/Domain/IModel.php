<?php

declare(strict_types=1);

namespace App\Interfaces\Main\Base\Domain;

use Carbon\CarbonInterface;

/**
 * @property string $id
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @property ?CarbonInterface $deleted_at
 */
interface IModel
{
}
