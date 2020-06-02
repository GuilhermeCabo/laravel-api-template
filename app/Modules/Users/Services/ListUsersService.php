<?php

namespace App\Modules\Users\Services;

use App\User;

class ListUsersService {

    public function execute()
    {
        return User::all();
    }
}
