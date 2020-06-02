<?php

namespace App\Traits;

trait Uuid {
    public static function bootUuid()
    {
        static::creating(function ($model) {
            $model->id = \Ramsey\Uuid\Uuid::uuid4();
        });
    }
}
