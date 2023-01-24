<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePage extends Controller
{
    public function view(){
        return view('Components.Home',[
            'title' => 'Home Page InstanTix',
        ]);
    }
}
