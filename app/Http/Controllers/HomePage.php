<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;

class HomePage extends Controller
{
    public function view(Request $request){
        $events = event::latest()->Searching(request(['search']), request(['selected']))->paginate(4);
        return view('Components.Home',[
            'title' => 'Home Page InstanTix',
            'events' => $events,
            'first_event' => $events->first(),
            'datas' => $request->datas
        ]);
    }
}
