<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register_form()
    {
        if (auth()->check()) {
            return redirect('/');
        }
        return view('auth.register');
    }

    public function login_form()
    {
        if (auth()->check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function login(Request $request) {
        $this->validate($request,[
            "email" => "required|email",
            "password" => "required"
        ]);
        if (auth()->attempt([
                "email" => $request->email,
                "password" => $request->password
            ])
        ) {
            return redirect('/');
        }else {
            return redirect('/login')->with([
                "error" => "these information do not match any one of our records"
            ]);
        }
    }

    public function register(Request $request) {
        $this->validate($request,[
            "name" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        auth()->login($user);
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
