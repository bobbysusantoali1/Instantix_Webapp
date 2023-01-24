<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventBookingPage extends Controller
{
    public function view(){
        return view('Components.EventBookingPage', [
            'title' => 'Event Booking'
        ]);
    }
}
