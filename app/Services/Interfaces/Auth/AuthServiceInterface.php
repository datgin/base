<?php

namespace App\Services\Interfaces\Auth;

/**
 * Interface BaseServiceInterface
 */
interface AuthServiceInterface  {

    public function login();

    public function authenticate();

    public function logout();

    public function googleLogin();

    public function googleCallback();

    public function facebookLogin();

    public function facebookCallback();

    public function forgotPassword();

}
