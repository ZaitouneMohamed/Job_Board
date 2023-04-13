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

    public function update_profile(Request $request)
    {
        $this->validate($request,[
            "email" => "required|email",
            "name" => "required"
        ]);
        User::find(auth()->user()->id)->update([
            "name" => $request->name,
            "email" => $request->email
        ]);
        return redirect()->back();
    }
    
    public function update_password(Request $request)
    {
        $this->validate($request,[
            "old_password" => "required",
            "password1" => "required",
            "password2" => "required"
        ]);
        if (Hash::check($request->old_password, auth()->user()->password)) {
            if ($request->password1 === $request->password2) {
                User::find(auth()->user()->id)->update([
                    "password" => Hash::make($request->password1),
                ]);
                return redirect()->back();
            } else {
                return redirect('/jobList');
            }
        }else {
            return redirect('/');
        }
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
            if (Auth::user()->hasRole('admin')) {
                return redirect("/admin");
            }elseif (Auth::user()->hasRole('user')) {
                return redirect("/user");
            }else {
                return redirect("/is-admin");
            }
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
