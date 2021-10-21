<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Symfony\Component\Routing\Route as RoutingRoute;

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
    return view('app');
});
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('signIn', [AuthController::class, 'login'])->name('signIn');
Route::get('signOut', [AuthController::class, 'signOut'])->name('signOut');
Route::get('registration', [AuthController::class, 'registration'])->name('registration');
Route::post('register', [AuthController::class, 'register'])->name('register');
