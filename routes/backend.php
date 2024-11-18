<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route::get('users', 'App\Http\Controllers\Backend\User\UserController@index');

route::prefix('admin')->name('admin.')->group(function () {
    route::controller('App\Http\Controllers\Backend\Auth\AuthController')->name('auth.')->group(function () {
        route::get('login', 'login')->name('login');
        route::post('login', 'authenticate');
    })->middleware('guest');
});
