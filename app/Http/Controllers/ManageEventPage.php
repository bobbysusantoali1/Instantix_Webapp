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
        // baru bisa update data di event, enggak paham cara update tiket kategori reg dan vip
        $image = $request->file('event_image');
        $Ext_Image = $image->clientExtension();

        Storage::putFileAs('public/images',$image, str_replace(' ', '', $request->event_name).'.'.$Ext_Image);
        $Image_Url = 'images/'.str_replace(' ', '', $request->event_name).'.'.$Ext_Image;

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
        return redirect('/HomePage')->with('status', 'Manage Event Success');
    }
    

}
