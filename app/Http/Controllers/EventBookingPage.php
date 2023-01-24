<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\ticket;
use App\Models\myBook;

class EventBookingPage extends Controller
{
    public function view($id){
        $event = event::find($id);
        return view('Components.EventDetailPage', [
            "data_event" => $event
        ]);
    }

    public function book(Request $request, $id){
        $event = event::where('id', $id)->first();
        $tickets = $event->ticket;
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
        $ticket = ticket::where('id', $request->ticket_id)->first();
        $curr_stock = $ticket->category_curr_stock;
        $new_stock = $curr_stock - $request->quantity;
        $updated_data = ['category_curr_stock' => $new_stock];
        event::where('id', $request->event_id)->update($updated_data);

        return view('Components.MyBooking', [
            'title' => 'My Booking'
        ]);
    }
}
