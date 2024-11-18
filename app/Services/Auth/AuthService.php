<?php

namespace App\Services\Auth;

use App\Services\BaseService;
use App\Services\Interfaces\Auth\AuthServiceInterface;

class AuthService extends BaseService  implements AuthServiceInterface
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function authenticate()
    {
        return $this->executeInTransaction(function () {
            $credentials = $this->payload();
            $remember = request()->has('remember') ? true : false;

            if (auth()->attempt($credentials, $remember)) {
                return successResponse('Đăng nhập thành công.');
            } else {
                auth()->logout();
                request()->session()->invalidate();
                return errorResponse('Tài khoản hoặc mật khẩu không chính xác!', 401);
            }
        }, 'Đăng nhập thất bại!');
    }

    public function logout() {}

    public function googleLogin() {}

    public function googleCallback() {}

    public function facebookLogin() {}

    public function facebookCallback() {}

    public function forgotPassword() {}

    public function payload()
    {
        return request()->except(['_token', '_method']);
    }
}
