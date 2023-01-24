<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class BrowsePage extends Controller
{
    public function view(Request $request){
        $data = event::all();
        return view('Components.BrowsePage', [
            'title' => 'Browse',
            'active' => 'Browse',
            'data' => $data,
            'datas' => $request->datas
        ]);
    }
}
