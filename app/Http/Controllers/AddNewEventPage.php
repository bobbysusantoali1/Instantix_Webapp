<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\ticket;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AddNewEventPage extends Controller
{
    public function view(){
        return view('Components.AddNewEventPage', [
            'title' => 'AddNewEvent',
        ]);
    }

    public function insert(Request $request){
        $validate = $request->validate([
            'event_name' => ['required','min:5','max:30'],
            'event_image' => ['required','image'],
            'event_artist' => ['required'],
            'event_address' => ['required','min:5'],
            'event_date' => ['required'],
            'event_start_time' => ['required'],
            'event_end_time' => ['required']
        ]);

        $validateticket = $request->validate([
            'EventRegularTicket' => ['required','numeric','min:10'],
            'EventVIPTicket' => ['required','numeric','min:10'],
            'EventRegularPrice' => ['required','numeric','min:10000'],
            'EventVIPPrice' => ['required','numeric','min:20000']
        ]);

        $image = $validate['event_image'];
        $Ext_Image = $image->clientExtension();

        Storage::putFileAs('public/images',$image, str_replace(' ', '', $validate['event_name']).'.'.$Ext_Image);
        $Image_Url = 'images/'.str_replace(' ', '', $validate['event_name']).'.'.$Ext_Image;

        $validate['event_image'] = $Image_Url;
        $validate['organizer_id'] = Auth::user()->id;
        // dd($validate);
        event::create($validate);
        $idx = event::latest()->first();
        dd($idx);



        if(true){
            return redirect('/HomePage')->with('status', 'Add New Event Success');
        }else{
            return redirect()->back()->with('status', 'Fail');
        }
    }
}
