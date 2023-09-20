<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowYourBookingsController extends Controller
{
    public function yourBookings($id)
    {
        $userID = Auth::id();
        $user = Auth::user();
        // Get bookings for the user with the provided ID
        $bookings = Booking::where('user_id', $id)->get();

        return view('employee.yourbookings', compact('userID', 'user'), ['bookings' => $bookings]);
    }

    public function cancel(Request $request, $id)
    {
        $bookingId = $id;

        $booking = Booking::find($bookingId);

        if ($booking && $booking->user_id == Auth::id()) {
            $booking->status = "1";
            $booking->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


}

