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
    // Asegúrate de que 'email' y 'password' están presentes en la solicitud
    if (!$request->filled('email') || !$request->filled('password')) {
        return response()->json(['error' => 'Faltan credenciales'], 400);
    }

    $email = $request->post('email');
    $password = $request->post('password');
    $user = $this->authRepository->attemptLogin($email, $password);

    if ($user) {
        $token = JWTAuth::fromUser($user);
        return response()->json([
            'success' => true,
            'message' => 'Inicio de sesión exitoso',
            'token' => $token
        ]);
    }

    return $this->responseFail([], 'Las credenciales proporcionadas no coinciden con nuestros registros.', Response::HTTP_UNAUTHORIZED);
}

}


