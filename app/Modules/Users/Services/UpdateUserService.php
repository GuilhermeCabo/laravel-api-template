<?php

namespace App\Modules\Users\Services;

use App\Exceptions\AppError;
use App\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserService {

    public function execute(array $data, string $id)
    {
        $user = User::find($id);

        if (!isset($user)) {
            throw new AppError("User not found", 404);
        }

        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->password = Hash::make($data["password"]);
        $user->save();

        return $user;
    }
}
