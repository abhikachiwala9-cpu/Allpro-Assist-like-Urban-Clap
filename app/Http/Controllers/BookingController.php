<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function booking()
    {
        $pending=Booking::where('status',0)->get();
        $assign=Booking::where('status',1)->get();
        $confirm=Booking::where('status',2)->get();
        // print_r($data);
        return view('booking',compact('pending','assign','confirm'));
    }

    
}
