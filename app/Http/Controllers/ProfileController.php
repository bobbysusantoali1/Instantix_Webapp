<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view(){
        $curr_user = Auth::user();
        return view('Components.MyProfile',[
            'title' => 'My Profile',
            'user' => $curr_user
        ]);
    }
}
