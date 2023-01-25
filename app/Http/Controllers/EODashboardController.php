<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\event;
use App\Models\ticket;

class EODashboardController extends Controller
{
    public function myEvents(){
        $events = Auth::user()->event;

        $retVal = [
            'events' => $events
        ];

        return view('eventOrganizer.myEvents', $retVal);
    }

    public function eventDetail(event $event){

        Gate::authorize('manage-event', $event);

        $tickets = $event->ticket;

        $retVal = [
            'event' => $event,
            'tickets' => $tickets
        ];

        return view('eventOrganizer.eventDetail', $retVal);
    }
}
