<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use View;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(){
        // User::create([
        //     'name' => 'Thierry',
        //     'email' => 'ramananathumingthierry@gmail.com',
        //     'password' => Hash::make('0000')
        // ]);
        return View('auth.login');
    }

    public function dologin(LoginRequest $request){
        
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }

        return back()->withErrors([
            'email' => 'Identifications incorrect',
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Vous êtes maintentant déconnecté!');
    }
}
