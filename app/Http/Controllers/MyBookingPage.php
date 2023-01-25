<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\ticket;
use Illuminate\Http\Request;
use App\Models\myBook;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;

class MyBookingPage extends Controller
{
    public function view(){
        $bookings = myBook::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $tickets = new Collection(ticket::class);
        foreach ($bookings as $booking) {
            $tickets->add(ticket::find($booking->ticket_id));
        }
        $events = new Collection(event::class);
        foreach ($tickets as $ticket) {
            $events->add(event::find($ticket->event_id));
        }
        return view('Components.MyBooking', [
            'title' => 'My Booking',
            'bookings' => $bookings,
            'tickets' => $tickets,
            'events' => $events
        ]);
    }
}
