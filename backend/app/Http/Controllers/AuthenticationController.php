<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\User\LoginService;
use App\Services\User\RegisterService;

class AuthenticationController extends Controller
{
    protected $loginService;
    protected $registerService;

    public function __construct(LoginService $loginService, RegisterService $registerService)
    {
        $this->loginService = $loginService;
        $this->registerService = $registerService;
    }

    public function login(LoginRequest $request)
    {
        return $this->loginService->login($request);
    }

    public function register(RegisterRequest $request)
    {
        return $this->registerService->register($request);
    }
}
