<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AddNewEventPage extends Controller
{
    public function view(){
        return view('Components.AddNewEventPage', [
            'title' => 'AddNewEvent',
        ]);
    }
    public function create(){
        $events = DB::table('events')->get();
        return view('Components.AddNewEventPage', [
            'title' => 'AddNewEvent',
        ], compact('events'));
        // return view('Components.AddNewEventPage', compact('events'));
    }

    public function insert(Request $request){
        $image = $request->file('EventImage');
        $imageName = $image->getClientOriginalName();
        Storage::putFileAs('public/images', $image, $imageName);

        DB::table('events')
        // ->join('ticketcategories', 'events.id', '=', 'ticketcategories.event_id')
        ->insert([
            'event_name'=>$request->EventName,
            'event_image'=>$imageName,
            'event_artist'=>$request->EventArtist,
            'event_address'=>$request->EventLocation,
            'event_date'=>$request->EventDate,
            'event_start_time'=> $request->EventStartTime,
            'event_end_time'=> $request->EventEndTime,
            // bingung masukin ticekt stock sama harganya di ticket category
        ]);

        return redirect('/EOPage');
    }
}
