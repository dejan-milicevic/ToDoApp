<?php

namespace App\Services;

use App\User;
use Auth;
use Hash;

class UserService
{
    public function createUser($data)
    {
        $user = new User;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->company = $data['company'];
        $user->country = $data['country'];
        $user->save();
        Auth::login($user);
    }
}