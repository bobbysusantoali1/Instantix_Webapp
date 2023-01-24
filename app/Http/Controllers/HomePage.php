<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;

class HomePage extends Controller
{
    public function view(){
        $events = event::all();
        return view('Components.Home',[
            'title' => 'Home Page InstanTix',
            'events' => $events,
            'first_event' => $events->first()
        ]);
    }
}
