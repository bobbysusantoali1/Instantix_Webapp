<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\event;
use App\Models\ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

        $ticket_sold = [];
        $ticket_type = [];

        foreach ($tickets as $ticket){
            $ticket_type[] = $ticket->category_name;
            $ticket_sold[] = $ticket->myBook->sum('quantity');
        }

        $retVal = [
            'event' => $event,
            'tickets' => $tickets,
            'ticket_type' => $ticket_type,
            'ticket_sold' => $ticket_sold
        ];

        // dd($retVal);

        return view('eventOrganizer.eventDetail', $retVal);
    }

    public function addTicketIndex(event $event){
        // dd($event);

        $retVal = [
            'event' => $event
        ];

        return view('eventOrganizer.addTicket', $retVal);
    }

    public function addTicket(Request $request){
        // dd($request);

        $validated = $request->validate([
            'eventId' => '',
            'ticketType' => ['required'],
            'ticketPrice' => ['required','numeric','min:20000'],
            'ticketStock' => ['required','numeric','min:1'],
            'ticketDesc' => ['required', 'min:5']
        ]);

        $request->flash();

        try {
            $ticket = event::findOrFail($validated['eventId'])->ticket->where('category_name', $validated['ticketType'])->first();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors('Event not found')->withInput();
        }

        if ($ticket){
            return redirect()->back()->withErrors('Ticket type already exist, please choose another type')->withInput();
        }

        $ticket = new ticket();
        $ticket['event_id'] = $validated['eventId'];
        $ticket['category_name'] = $validated['ticketType'];
        $ticket['category_desc'] = $validated['ticketDesc'];
        $ticket['category_init_stock'] = $validated['ticketStock'];
        $ticket['category_curr_stock'] = $validated['ticketStock'];
        $ticket['price'] = $validated['ticketPrice'];
        $ticket->save();

        return redirect('/dashboard/myEvents/'.$validated['eventId']);
    }
}
