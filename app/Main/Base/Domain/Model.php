<?php

declare(strict_types=1);

namespace App\Main\Base\Domain;

use App\Interfaces\Main\Base\Domain\IModel;
use Cappuccino\Id;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model implements IModel
{
    use HasUuids;
    use SoftDeletes;
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    public function newUniqueId(): string
    {
        return Id::make();
    }

    public function uniqueIds(): array
    {
        return ['id'];
    }
}
