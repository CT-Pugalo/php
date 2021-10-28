<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show dashboard
     */
    public function index(){
        return view('dashboard');
    }
    /**
     * Show Login form
     */
    public function login(){
        return view('auth.login');
    }
    /**
     * Show register form
     */
    public function register(){
        return view('auth.register');
    }

    public function signIn(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4', 'max:20']
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('user.index');
        }
    }

    /**
     * Add the user to the databse if not already exist
     */
    public function registration(Request $request){
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:4', 'max:20']
        ]);
        $user=User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('name')),
        ]);
        Auth::login($user);
        return redirect()->route('user.index');
    }

    public function logOut() {
        Auth::logout();
        return redirect()->route('/');
    }
}
