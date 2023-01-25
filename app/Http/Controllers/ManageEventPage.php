<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManageEventPage extends Controller
{
    public function view($id){
        $data = event::where('id', $id)->first();
        $tickets = ticket::where('event_id', $data->id)->get();
        return view('Components.ManageEventPage', [
            'title' => 'Manage Event',
            'data_event' => $data,
            'ticket' => $tickets
        ]);
    }
    public function update(Request $request, $event_id){

        $validate = $request->validate([
            'event_name' => ['required','min:5','max:30'],
            'event_desc' => ['required', 'min:5'],
            'event_image' => ['required','image'],
            'event_artist' => ['required'],
            'event_location' => ['required','min:5'],
            'event_date' => ['required'],
            'event_start_time' => ['required'],
            'event_end_time' => ['required']
        ]);

        $validateticketregular = $request->validate([
            'EventRegularTicket' => ['required','numeric','min:10'],
            'EventRegularPrice' => ['required','numeric','min:10000']
        ]);

        $validateticketvip = $request->validate([
            'EventVIPTicket' => ['required','numeric','min:10'],
            'EventVIPPrice' => ['required','numeric','min:20000']
        ]);

        $image = $request->file('event_image');
        $Ext_Image = $image->getClientExtension();

        Storage::putFileAs('public/images',$image, str_replace(' ', '', $request->event_name).'.'.$Ext_Image);
        $Image_Url = 'images/'.str_replace(' ', '', $request->event_name).'.'.$Ext_Image;
        // update event table
        DB::table('events')
        ->join('tickets', 'events.id', '=', 'tickets.event_id')
        ->where('events.id', '=', $event_id)
        ->update([
            'event_name' =>$request->event_name,
            'event_desc' => $request->event_desc,
            'event_image' => $Image_Url,
            'event_artist' => $request->event_artist,
            'event_location' => $request->event_location,
            'event_date' => $request->event_date,
            'event_start_time' => $request->event_start_time,
            'event_end_time' => $request->event_end_time,
        ]);
        // update ticket Regular
        DB::table('events')
        ->join('tickets', 'events.id', '=', 'tickets.event_id')
        ->where('events.id', '=', $event_id)
        ->where('tickets.category_name', '=', 'Regular')
        ->update([
            'category_init_stock' =>$request->EventRegularTicket,
            'price' => $request->EventRegularPrice,

        ]);
        // update ticket VIP
        DB::table('events')
        ->join('tickets', 'events.id', '=', 'tickets.event_id')
        ->where('events.id', '=', $event_id)
        ->where('tickets.category_name', '=', 'VIP')
        ->update([
            'category_init_stock' =>$request->EventVIPTicket,
            'price' => $request->EventVIPPrice,
        ]);
        return redirect()->route('view-dashboard')->with('alert', 'Manage Event Success');
    }

}
