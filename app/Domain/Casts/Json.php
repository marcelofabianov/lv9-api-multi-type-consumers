<?php

declare(strict_types=1);

namespace App\Domain\Casts;

use Cappuccino\Json as CappuccinoJson;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Json implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        if (is_null($value)) {
            return null;
        }

        try {
            $json = CappuccinoJson::create($value);
        } catch (\Exception $e) {
            throw new \Exception('GET: Invalid type Casts!');
        }

        return $json;
    }

    public function set($model, $key, $value, $attributes)
    {
        if (is_a($value, CappuccinoJson::class)) {
            return $value->encode();
        }
        if (is_array($value)) {
            return CappuccinoJson::create($value)->encode();
        }
        if (is_null($value)) {
            return null;
        }

        try {
            $json = CappuccinoJson::create($value);
        } catch (\Exception $e) {
            throw new \Exception('SET: Invalid type Casts!');
        }

        return $json->encode();
    }
}
