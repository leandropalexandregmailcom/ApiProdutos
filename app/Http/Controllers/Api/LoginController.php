<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = request(['email', 'password']);

        if(!Auth::attempt($credenciais))
        {
            return response()->json(['message' => 'Não autorizado'], 404);
        }

        $usuario = request()->user();
        $response = array(
            'user' => $usuario->name,
            'email' => $usuario->email,
            'token' => $usuario->createToken('token')->accessToken
        );

        return response()->json($response, 200);
    }

    public function logout(Request $request)
    {
        if($request->user()->token()->revoke())
        {
            return response()->json(['message' => 'Logout efetuado com sucesso'], 200);
        }
        return response()->json(['message' => 'Algo deu errado'], 404);
    }
}
