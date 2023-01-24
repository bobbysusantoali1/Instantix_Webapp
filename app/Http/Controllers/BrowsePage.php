<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowsePage extends Controller
{
    public function view(){
        return view('Components.BrowsePage', [
            'title' => 'Browse',
            'active' => 'Browse',
        ]);
    }
}
