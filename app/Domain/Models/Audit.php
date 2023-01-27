<?php

declare(strict_types=1);

namespace App\Domain\Models;

use App\Domain\Factories\AuditFactory;
use App\Interfaces\Domain\Models\IAuditModel;
use App\Main\Base\Domain\Model;

final class Audit extends Model implements IAuditModel
{
    protected $table = 'audits';

    protected $fillable = [
        'targetRecordId',
        'userId',
        'name',
        'email',
        'model',
        'eventType',
        'recordBeforeOperation',
        'recordAfterOperation',
    ];

    protected static function newFactory(): AuditFactory
    {
        return new AuditFactory();
    }
}
