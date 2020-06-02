<?php

namespace App\Modules\Users\Services;

use App\Exceptions\AppError;
use App\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthenticateUserService
{
    public function execute(array $data)
    {
        [
            "email" => $email,
            "password" => $password
        ] = $data;

        $user = User::findByEmail($email)->first();

        if (!isset($user)) {
            throw new AppError("Invalid credentials", 401);
        }

        $passwordChecks = Hash::check($password, $user->password);

        if (!$passwordChecks) {
            throw new AppError("Invalid credentials", 401);
        }

        $token = $user->createToken(Uuid::uuid4());

        return [
            "user" => $user,
            "token" => $token->plainTextToken
        ];
    }
}
