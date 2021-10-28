<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('/');

Route::get('auth/login', 'App\Http\Controllers\LoginController@login')->name('auth.login');
Route::get('auth/register', 'App\Http\Controllers\LoginController@register')->name('auth.register');
Route::post('auth/registration', 'App\Http\Controllers\LoginController@registration')->name('auth.registration');
Route::post('auth/signIn', 'App\Http\Controllers\LoginController@signIn')->name('auth.signIn');
Route::get('auth/logout', 'App\Http\Controllers\LoginController@logOut')->name('auth.logout');

Route::resource('user', UserController::class);
