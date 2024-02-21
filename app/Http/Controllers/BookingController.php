<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{

//ADMIN
public function indexAdmin()
{
    $booking = Booking::with('quote')->orderBy('booking_date', 'asc')->get(); 
    return view('admin.adminBookings', compact('booking'));
}


    public function adminstore(Request $request)
{
    $tomorrow = now()->addDay()->format('Y-m-d');
    $request->validate([
        'quote_id' => 'required|exists:quotes,id',
        'booking_date' => 'required|date|after_or_equal:'.$tomorrow,
        'booking_time' => 'required',
    ]);

    $existingBookingForQuote = Booking::where('quote_id', $request->quote_id)->first();
    if ($existingBookingForQuote) {

        return back()->withInput()->withErrors(['quote_id' => 'This service is already booked.']);
    }

    $existingBookingForDateTime = Booking::where('booking_date', $request->booking_date)
                                         ->where('booking_time', $request->booking_time)
                                         ->first();
    if ($existingBookingForDateTime) {
        return back()->withInput()->withErrors(['booking_date' => 'This schedule is already taken. Please choose another time.']);
    }

    Booking::create([
        'user_id' => $request->user_id, 
        'quote_id' => $request->quote_id,
        'booking_date' => $request->booking_date,
        'booking_time' => $request->booking_time,
    ]);

    $quote = Quote::find($request->quote_id);
    if ($quote) {
        $quote->status = 'Booked';
        $quote->save();
    }

    return redirect('/admin/bookings')->with('status', 'Service booked successfully.');
}

public function adminupdate(Request $request, int $id)
    {
        $tomorrow = now()->addDay()->format('Y-m-d');
        $request->validate([
            'quote_id' => 'required|exists:quotes,id',
            'booking_date' => 'required|date|after_or_equal:'.$tomorrow,
            'booking_time' => 'required',
        ]);


    

        $existingBooking = Booking::where('id', '!=', $id) 
                                  ->where('booking_date', $request->booking_date)
                                  ->where('booking_time', $request->booking_time)
                                  ->first();
    
       
        if ($existingBooking) {
            return back()->withInput()->withErrors(['booking_date' => 'This schedule is already taken. Please choose another time.']);
        }
    

        $booking = Booking::findOrFail($id);
        $booking->update([
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
        ]);

        $quote = Quote::find($request->quote_id);
        if ($quote) {
        $quote->status = 'Booked';
        $quote->save();
    }
    
        return redirect('/admin/bookings')->with('status', 'Booking details updated successfully.');
    }

    public function adminschedule()
    {
        $user_id = Auth::id();
        $booking = Booking::where('user_id', $user_id)->get();

        return view('users.userBookingsCreate', compact('booking'));
    }


    public function admindestroy(int $id)
    {
        $quote = Booking::findOrFail($id);
        $quote->delete();

        return redirect()->back()->with('status', 'Booking details deleted successfully');
    }

//USER
    public function indexUser()
    {
        $user_id = Auth::id();
        $booking = Booking::where('user_id', $user_id)->orderBy('booking_date', 'asc')->get();

        return view('users.userBookings', compact('booking'));
    }

    public function schedule()
    {
        $user_id = Auth::id();
        $booking = Booking::where('user_id', $user_id)->get();

        return view('users.userBookingsCreate', compact('booking'));
    }

    public function store(Request $request)
{
    $tomorrow = now()->addDay()->format('Y-m-d');
    $request->validate([
        'quote_id' => 'required|exists:quotes,id',
        'booking_date' => 'required|date|after_or_equal:'.$tomorrow,
        'booking_time' => 'required',
    ]);

    $existingBookingForQuote = Booking::where('quote_id', $request->quote_id)->first();
    if ($existingBookingForQuote) {

        return back()->withInput()->withErrors(['quote_id' => 'This service is already booked.']);
    }


    $existingBookingForDateTime = Booking::where('booking_date', $request->booking_date)
                                         ->where('booking_time', $request->booking_time)
                                         ->first();
    if ($existingBookingForDateTime) {
        return back()->withInput()->withErrors(['booking_date' => 'This schedule is already taken. Please choose another time.']);
    }

    Booking::create([
        'user_id' => $request->user_id, 
        'quote_id' => $request->quote_id,
        'booking_date' => $request->booking_date,
        'booking_time' => $request->booking_time,
    ]);

    $quote = Quote::find($request->quote_id);
    if ($quote) {
        $quote->status = 'Booked';
        $quote->save();
    }

    return redirect('/my-bookings')->with('status', 'Service booked successfully.');
}

    

    public function edit(int $id){
        $booking = Booking::findOrFail($id);
        return view('userBookingsEdit', compact('booking'));
    }



    public function update(Request $request, int $id)
    {
        $tomorrow = now()->addDay()->format('Y-m-d');
        $request->validate([
            'quote_id' => 'required|exists:quotes,id',
            'booking_date' => 'required|date|after_or_equal:'.$tomorrow,
            'booking_time' => 'required',
        ]);
    

        $existingBooking = Booking::where('id', '!=', $id) 
                                  ->where('booking_date', $request->booking_date)
                                  ->where('booking_time', $request->booking_time)
                                  ->first();
    
       
        if ($existingBooking) {
            return back()->withInput()->withErrors(['booking_date' => 'This schedule is already taken. Please choose another time.']);
        }
    

        $booking = Booking::findOrFail($id);
        $booking->update([
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
        ]);

        $quote = Quote::find($request->quote_id);
        if ($quote) {
        $quote->status = 'Booked';
        $quote->save();
    }
    
        return redirect('/my-bookings')->with('status', 'Booking details updated successfully.');
    }
    

public function destroy(int $id)
    {
        $quote = Booking::findOrFail($id);
        $quote->delete();

        return redirect()->back()->with('status', 'Booking details deleted successfully');
    }
}


