<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\ticket;
use Illuminate\Http\Request;

class EventDetailPage extends Controller
{
    public function view($id){
        $events = event::find($id);
        $tickets = ticket::where('event_id', $events->id)->get();
        return view('Components.EventDetailPage', [
            'title' => 'Event Detail',
            'data_event' => $events,
            'ticket' => $tickets
        ]);
    }
    public function delete($id){
        $tickets = ticket::where('event_id', $id)->get();
        foreach ($tickets as $ticket) {
            if ($ticket->category_init_stock != $ticket->category_curr_stock){
                return redirect()->route('view-event', ['id' => $id])->with('alert', 'Cannot delete event because at least 1 ticket has been sold!');
            }
        }
        // kalau udah divalidasi boleh didelete
        foreach ($tickets as $ticket) {
            ticket::destroy($ticket->id);
        }
        event::destroy($id);
        return redirect()->route('view-home')->with('alert', 'Success remove event');
    }
}
