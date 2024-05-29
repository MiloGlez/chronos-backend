<?php

namespace App\Repository\Employee\Interfaces;

use Illuminate\Contracts\Auth\Authenticatable;

interface AuthRepositoryInterface
{
    public function attemptLogin(string $email, string $password): ?Authenticatable;
}
