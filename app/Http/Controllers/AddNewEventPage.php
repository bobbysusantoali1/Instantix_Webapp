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
            'title' => 'AddNewEvent'
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

        $validateticketregular = $request->validate([
            'EventRegularTicket' => ['required','numeric','min:10'],
            'EventRegularPrice' => ['required','numeric','min:10000']
        ]);

        $validateticketvip = $request->validate([
            'EventVIPTicket' => ['required','numeric','min:10'],
            'EventVIPPrice' => ['required','numeric','min:20000']
        ]);

        $image = $validate['event_image'];
        $Ext_Image = $image->clientExtension();

        Storage::putFileAs('public/images',$image, str_replace(' ', '', $validate['event_name']).'.'.$Ext_Image);
        $Image_Url = 'images/'.str_replace(' ', '', $validate['event_name']).'.'.$Ext_Image;

        $validate['event_image'] = $Image_Url;
        $validate['user_id'] = Auth::user()->id;
        event::create($validate);
        $idx = event::latest()->first();

        $init = new ticket();
        $init['event_id'] = $idx->id;
        $init['category_name'] = 'Regular';
        $init['category_desc'] = 'Hello iam under water';
        $init['category_init_stock'] = $validateticketregular['EventRegularTicket'];
        $init['category_curr_stock'] = $validateticketregular['EventRegularTicket'];
        $init['price'] = $validateticketregular['EventRegularPrice'];
        $init->save();

        $init1 = new ticket();
        $init1['event_id'] = $idx->id;
        $init1['category_name'] = 'VIP';
        $init1['category_desc'] = 'Hello iam under water exstra';
        $init1['category_init_stock'] = $validateticketvip['EventVIPTicket'];
        $init1['category_curr_stock'] = $validateticketvip['EventVIPTicket'];
        $init1['price'] = $validateticketvip['EventVIPPrice'];
        $init1->save();

        return redirect('/HomePage')->with('status', 'Add New Event Success');
    }
}
