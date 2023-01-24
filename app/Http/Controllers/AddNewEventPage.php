<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddNewEventPage extends Controller
{
    public function view(){
        return view('Components.AddNewEventPage', [
            'title' => 'AddNewEvent',
        ]);
    }
}
