<?php

namespace App\Services\User;

use Exception;
use App\Helpers\ResponseFormatter;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserServiceImplement extends Service implements UserService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
    public function login($payload)
    {
        try {
            $user = $this->mainRepository->findUserByEmail($payload['email']);
            if (!$user) {
                return ResponseFormatter::error(null, 'user not found', 404);
            }
            if (!Hash::check($payload['password'], $user->password)) {
                return ResponseFormatter::error(null, 'wrong password', 401);
            }
            Auth::login($user);
            $token = $user->createToken('authToken')->plainTextToken;
            $data = [
                'user' => $user,
                'token' => $token
            ];
            return ResponseFormatter::success($data, 'success login');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error login');
        }
    }

    public function logout()
    {
        try {
            $user = Auth::user();
            $user->tokens()->delete();
            return ResponseFormatter::success(null, 'success logout');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error logout');
        }
    }
}
