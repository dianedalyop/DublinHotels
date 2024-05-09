<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'booking_in_date' => 'required|date',
            'booking_out_date' => 'required|date',
        ]);


        Booking::create([
            'user_id' => auth()->id(),
            'check_in_date' => $validatedData['booking_in_date'],
            'check_out_date' => $validatedData['booking_out_date'],

        ]);


        return redirect()->route('bookingsuccess')->with('success', 'Your reservation was successful!');
    }
    public function success()
    {

        return view('bookingsuccess');
    }
}
