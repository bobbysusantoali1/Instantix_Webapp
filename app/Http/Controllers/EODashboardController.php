<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EODashboardController extends Controller
{
    public function myEvents(){
        $events = Auth::user()->event;

        $retVal = [
            'events', $events
        ];

        return view('eventOrganizer.myEvents', $retVal);
    }
}
