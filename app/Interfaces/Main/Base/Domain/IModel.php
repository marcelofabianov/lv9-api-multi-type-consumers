<?php

declare(strict_types=1);

namespace App\Interfaces\Main\Base\Domain;

use Carbon\CarbonInterface;

/**
 * @property string $uuid
 * @property CarbonInterface $createdAt
 * @property CarbonInterface $updatedAt
 * @property CarbonInterface|null $deletedAt
 * @method IModel newInstance()
 * @method IModel fill(array $attributes)
 * @method IModel find(string $uuid)
 */
interface IModel
{
}
