<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EOPage extends Controller
{
    public function view(){
        return view('Components.EOPage',[
            'title' => 'EO Page',
        ]);
    }
}
