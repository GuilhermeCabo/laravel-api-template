<?php

namespace App\Modules\Users\Services;

use App\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class CreateUserService {

    public function execute(array $data)
    {
        $data["password"] = Hash::make($data["password"]);

        return User::create($data);
    }
}
