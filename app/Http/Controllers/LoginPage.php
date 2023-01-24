<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPage extends Controller
{
    public function view(){
        return view('Components.LoginPage', [
            'title' => 'Login'
        ]);
    }
}
