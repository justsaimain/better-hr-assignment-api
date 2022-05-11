<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

final class LogoutUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            return "Logout success";
        } else {
            return "Not authenticated";
        }
    }
}
