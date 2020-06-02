<?php

namespace App\Modules\Users\Services;

use App\Exceptions\AppError;
use App\User;

class DeleteUserService {

    public function execute(string $id)
    {
        $user = User::find($id);

        if (!isset($user)) {
            throw new AppError("User not found", 404);
        }

        $user->delete();
    }
}
