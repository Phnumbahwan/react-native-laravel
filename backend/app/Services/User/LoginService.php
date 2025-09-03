<?php

namespace App\Services\User;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function login(LoginRequest $request)
    {
        // Check email
        $user = User::where('email', $request['email'])->first();

        // Check password
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'Invalid input'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}
