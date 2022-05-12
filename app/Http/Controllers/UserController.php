<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __invoke()
    {
        if (Auth::guard('api')->check()) {
            return response()->json([
                'user' => Auth::guard('api')->user()
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }
}
