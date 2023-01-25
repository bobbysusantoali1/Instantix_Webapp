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

    public function view_book(Request $request, $id){
        $event = event::find($id);
        $ticket = event::where('id', $id)->first()->ticket->where('category_name', $request->category)->first();
        if ($ticket->category_curr_stock == 0 || ($request->qty > $ticket->category_curr_stock)) {
            return redirect()->route('view-event', ['id' => $id])->with('alert', 'Not enough stock!');
        } else {
            return view('Components.EventBookingPage', [
                'title' => 'Event Booking',
                'data_event' => $event,
                'ticket' => $ticket,
                'qty' => $request->qty
            ]);
        }

    }

    public function purchase(Request $request){
        myBook::create([
            'user_id' => $request->user_id,
            'ticket_id' => $request->ticket_id,
            'quantity' => $request->quantity
        ]);
        $ticket = ticket::where('id', $request->ticket_id)->first();
        $curr_stock = $ticket->category_curr_stock;
        $new_stock = $curr_stock - $request->quantity;
        $updated_data = ['category_curr_stock' => $new_stock];
        ticket::where('id', $request->ticket_id)->update($updated_data);

        return redirect()->route('view-book')->with('alert', 'Successfully bought tickets!');
    }
}
