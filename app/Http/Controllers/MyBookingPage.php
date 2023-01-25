<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\myBook;
use Illuminate\Support\Facades\Auth;

class MyBookingPage extends Controller
{
    public function view(){
        $data = myBook::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('Components.MyBooking', [
            'title' => 'My Booking',
            'data' => $data,
        ]);
    }
}
