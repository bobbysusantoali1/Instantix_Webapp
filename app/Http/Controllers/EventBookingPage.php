<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\ticket;
use App\Models\myBook;

class EventBookingPage extends Controller
{
    public function view(Request $request, $id){
        $event = event::where('id', $id)->first();
        $tickets = ticket::where('event_id', $id)->get();
        $ticket = [];
        $ticket['category_name'] = $request->input('role');
        $ticket['quantity'] = $request->qty;
        foreach ($tickets as $type) {
            if ($type->category_name == $request->input('role')) {
                $ticket['price'] = $type->price;
                $ticket['id'] = $type->id;
                break;
            }
        }
        return view('Components.EventBookingPage', [
            'title' => 'Event Booking',
            'data_event' => $event,
            'ticket' => $ticket
        ]);
    }

    public function purchase(Request $request){
        // $data = new myBook();
        // $data['user_id'] = $request->evet_id;
        // $data['ticket_id'] = $request->ticket_id;
        // $data['quantity'] = $request->quanity;
        // $data->save();

        myBook::create([
            'user_id' => $request->user_id,
            'ticket_id' => $request->ticket_id,
            'quantity' => $request->quantity
        ]);

        return view('Components.MyBooking', [
            'title' => 'My Booking'
        ]);
    }
}
