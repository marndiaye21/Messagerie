<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(AuthUserRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return response()->json([
                "message" => "Identifiant ou mot de passe incorrect"
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = Auth::user()->createToken("api_token");
        return ['token' => $token->plainTextToken];
    }
}
