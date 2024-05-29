<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\Employee\EloquentAuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    private EloquentAuthRepository $authRepository;

    public function __construct(EloquentAuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = $this->authRepository->attemptLogin($credentials['email'], $credentials['password']);

        if ($user) {
            // Genera un token para el usuario
            $token = JWTAuth::fromUser($user);

            // Devuelve el token al cliente
            return response()->json([
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'token' => $token
            ]);
        }

        return $this->responseFail([], 'Las credenciales proporcionadas no coinciden con nuestros registros.', Response::HTTP_UNAUTHORIZED);
    }
}
