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
    public function delete($id){
        $tickets = ticket::where('event_id', $id);
        foreach ($tickets as $ticket) {
            if ($ticket->category_init_stock != $ticket->category_curr_stock){
                {{ $ticket->id }}
                return redirect()->route('view-event')->with('alert', 'Cannot delete event because at least 1 ticket has been sold!');
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
