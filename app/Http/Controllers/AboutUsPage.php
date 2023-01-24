<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsPage extends Controller
{
    public function view(){
        return view('Components.AboutUsPage', [
            'title' => 'About Us',
            'active' => 'About Us'
        ]);
    }
}
