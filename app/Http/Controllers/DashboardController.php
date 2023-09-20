<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::all();
        $events = [];

        foreach ($bookings as $booking) {
            // Mengecek jika status bookingnya 0 dan tanggal pemesanannya sepanjang hari sebelum hari ini (Ex. 1 September 2023, tanggal tersebut tidak akan muncul karena sudah lewat dari tanggal yang sudah ditentukan)
            if ($booking->status == 0 && $booking->booking_date >= now()->toDateString()) {
                // Mencari tanggal booking yang sudah dipesan dan diubah menjadi jam awal dan jam akhir, formatnya seperti ini (Tanggal Booking  15.00.00 - 16.00.00)
                $startDatetime = $booking->booking_date . ' ' . $booking->time_start;
                $endDatetime = $booking->booking_date . ' ' . $booking->time_end;

                // Mengambil nama room dari booking yang ada
                $room = Room::find($booking->room_id);
                $roomName = $room ? $room->name : 'Room Not Found';

                // Mengubah jam awal dan jam akhir dari tanggal di atas agar formatnya menjadi ini (15.00 - 16.00)
                $startTime = date('H:i', strtotime($startDatetime));
                $endTime = date('H:i', strtotime($endDatetime));

                // Membuat event dengan format ini (Jam Awal - Jam Akhir | Nama Orang | Nama Ruangan)
                $eventTitle = $startTime . ' - ' . $endTime . ' | ' . $booking->name . ' | ' . $roomName;

                $events[] = [
                    'title' => $eventTitle,
                    'start' => $startDatetime,
                    'end' => $endDatetime,
                ];
            }
        }

        return view('dashboard', compact('events'));
    }

    public function form(Request $request){
        return view('form');
    }

}
