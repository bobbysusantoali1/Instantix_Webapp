<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginPage extends Controller
{
    public function view(){
        return view('Components.LoginPage', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        $credential = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:5|max:20'
        ]);
        // ini buat nanti
        // if($request->remember){
        //     Cookie::queue('Login_Cookie_email', $credential['email'], 30);
        //     Cookie::queue('Login_Cookie_password', $credential['password'], 30);
        // }
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/HomePage');
        }

        return back()->with([
            'Login_Error' => "Login Failed !!!"
        ]);
    }

    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); # root
    }
}
