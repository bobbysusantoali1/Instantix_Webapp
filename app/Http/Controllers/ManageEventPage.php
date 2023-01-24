<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageEventPage extends Controller
{
    public function view(){
        return view('Components.ManageEventPage', [
            'title' => 'ManageEvent',
        ]);
    }
}
