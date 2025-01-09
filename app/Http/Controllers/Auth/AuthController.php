<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('companies.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function register(Request $request){

        $userData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create($userData);

        if($user){
            return redirect()->route('login');
        } else {
            return redirect()->route('register');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
