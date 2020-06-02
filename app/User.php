<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, Uuid;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id'
    ];

    public static function findByUuid(string $uuid)
    {
        return parent::where('uuid', $uuid)->first();
    }

    public static function findByEmail(string $email)
    {
        return parent::where('email', $email)->first();
    }

    public static function find(string $uuid)
    {
        return self::findByUuid($uuid);
    }
}
