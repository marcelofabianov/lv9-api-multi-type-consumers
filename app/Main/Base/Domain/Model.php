<?php

declare(strict_types=1);

namespace App\Main\Base\Domain;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Latte\Uuid;

class Model extends Eloquent
{
    use HasUuids;
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'createdAt';

    const UPDATED_AT = 'updatedAt';

    const DELETED_AT = 'deletedAt';

    protected $keyType = 'string';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $dates = [
        'createdAt', 'updatedAt', 'deletedAt',
    ];

    public function newUniqueId(): string
    {
        return Uuid::random()->getValue();
    }

    public function uniqueIds(): array
    {
        return ['uuid'];
    }
}
