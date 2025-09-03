<?php

namespace App\Services\User;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    /**
     * Register a new user.
     *
     * @param  array  $data
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(RegisterRequest $request): User
    {
        // Create and return the user
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }
}
