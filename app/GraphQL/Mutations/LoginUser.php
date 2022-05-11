<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class LoginUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::where('email', $args['email'])->first();
        if ($user) {
            if (Hash::check($args['password'], $user->password)) {
                $token = $user->createToken('User Token')->accessToken;
                return $token;
            } else {
                return "Password mismatch";
            }
        } else {
            return "User does not exist";
        }
    }
}
