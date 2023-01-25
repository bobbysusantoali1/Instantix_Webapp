<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\ticket;
use Illuminate\Http\Request;

class ManageEventPage extends Controller
{
    // public function view(){
    //     return view('Components.ManageEventPage', [
    //         'title' => 'ManageEvent',
    //     ]);
    // }
    public function view($id){
        $data = event::where('id', $id)->first();
        $tickets = ticket::where('event_id', $data->id)->get();
        return view('Components.ManageEventPage', [
            'title' => 'Manage Event',
            'data_event' => $data,
            'ticket' => $tickets
        ]);
    }
}
