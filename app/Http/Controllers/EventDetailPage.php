<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventDetailPage extends Controller
{
    public function view(){
        return view('Components.EventDetailPage', [
            'title' => 'Event Detail'
        ]);
    }
}
