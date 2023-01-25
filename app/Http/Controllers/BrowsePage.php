<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class BrowsePage extends Controller
{
    public function view(Request $request){
        $events = event::all();
        $events = event::latest()->Searching(request(['search']), request(['selected']))
                 ->get();
        return view('Components.BrowsePage', [
            'title' => 'Browse',
            'active' => 'Browse',
            'events' => $events ,
            'datas' => $request->datas
        ]);
    }
}
