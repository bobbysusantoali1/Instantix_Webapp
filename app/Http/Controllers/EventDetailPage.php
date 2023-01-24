<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\ticket;
use Illuminate\Http\Request;

class EventDetailPage extends Controller
{
    public function view($id){
        $data = event::where('id', $id)->first();
        $tickets = ticket::where('event_id', $data->id)->get();
        return view('Components.EventDetailPage', [
            'title' => 'Event Detail',
            'data_event' => $data,
            'ticket' => $tickets
        ]);
    }
}
