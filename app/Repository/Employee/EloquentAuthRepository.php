<?php

namespace App\Repository\Employee;

use App\Models\ChronoEmployee;
use App\Repository\Employee\Interfaces\AuthRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class EloquentAuthRepository implements AuthRepositoryInterface
{
    public function attemptLogin(string $email, string $password): ?Authenticatable
    {
        $user = ChronoEmployee::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }
}
