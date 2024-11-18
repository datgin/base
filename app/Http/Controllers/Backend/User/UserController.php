<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\User\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserServiceInterface $userService){}

    public function index(){
        $users = $this->userService->paginate();
        dd($users);
        return view('backend.users.index', compact('users'));
    }
}
