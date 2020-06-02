<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {

    use Uuid;

    public static function findByUuid(string $uuid)
    {
        return parent::where('uuid', $uuid)->first();
    }

    public static function find(string $uuid) {
        return self::findByUuid();
    }
}
