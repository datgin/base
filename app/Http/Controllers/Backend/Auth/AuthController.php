<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Services\Interfaces\Auth\AuthServiceInterface;

class AuthController extends Controller
{

    public function __construct(protected AuthServiceInterface $authService) {}
    public function login()
    {
     return  $this->authService->login();
    }

    public function authenticate(AuthLoginRequest $request)
    {
        $response = $this->authService->authenticate();

        return handleResponse($response, 200);
    }
}
