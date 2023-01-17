<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\LoginRequest;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(LoginRequest $loginRequest)
    {
        $payload = $loginRequest->validated();
        return $this->userService->login($payload);
    }

    public function logout()
    {
        return $this->userService->logout();
    }
}
