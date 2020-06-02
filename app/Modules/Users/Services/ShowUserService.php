<?php

namespace App\Modules\Users\Services;

use App\Exceptions\AppError;
use App\User;

class ShowUserService {

    public function execute(string $id)
    {
        $user = User::find($id);

        if (! isset($user)) {
            throw new AppError("User not found", 404);
        }

        return $user;
    }
}
