<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class BrowsePage extends Controller
{
    public function view(Request $request){
        $events = event::all();
        if($request->input('selected') != ''){
            $events = event::latest()->Searching(request(['search']))
                     ->where('event_location', $request->input('selected'))->get();
        }else{
            $events = event::latest()->Searching(request(['search']))->get();
        }
        return view('Components.BrowsePage', [
            'title' => 'Browse',
            'active' => 'Browse',
            'events' => $events ,
            'datas' => $request->datas
        ]);
    }
}
