<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\ticket;

class EventBookingPage extends Controller
{
    public function view(Request $request, $id){
        $data = event::where('id', $id)->first();
        $tickets = ticket::where('event_id', $id)->get();
        $ticket = [];
        $ticket['category_name'] = $request->input('role');
        $ticket['quantity'] = $request->quant;
        foreach ($tickets as $type) {
            if ($type->category_name == $request->input('role')) {
                $ticket['price'] = $type->price;
                break;
            }
        }
        return view('Components.EventBookingPage', [
            'title' => 'Event Booking',
            'data' => $data,
            'ticket' => $ticket
        ]);
    }

    // public function purchase(Request $request, $id){
    //     return view('Components.EventBookingPage', [
    //         'title' => 'Event Booking']
    //     ]);
    // }
}
