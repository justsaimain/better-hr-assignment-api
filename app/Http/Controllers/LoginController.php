<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token')->accessToken;

            return response()
                ->json([
                    'status' => true,
                    'user' => $user,
                    'token' => $token
                ])
                ->setStatusCode(200, 'Authorization');
        } else {
            return response()
                ->json([
                    'status' => false,
                    'error' => 'Error'
                ])
                ->setStatusCode(401, 'Unauthorized');
        }
    }
}
