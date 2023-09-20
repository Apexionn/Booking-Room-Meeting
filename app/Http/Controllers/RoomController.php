<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use PHPUnit\TextUI\TestRunner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RoomController extends Controller{
    public function index(){
        return view('admin.rooms.dashboard',[
            'rooms' => Room::latest()->filters(request(['search']))->get()
        ]);
    }

    // Create
    public function create(){
        return view('admin.rooms.createRoom');
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $data = Room::create($request->all());
        if($request->hasFile('image')){
            $fileName = $request->file('image')->getClientOriginalName();
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $fileName .= $fileExtension;
            $newFileName = uniqid();
            $img = $newFileName . '.' . $fileExtension;
            $request->file('image')->move('images/', $img);
            $data->image = $img;
            $data->save();
        }
        return redirect('/rooms');
    }

    /**update**/
    public function select($id){
        $data = Room::find($id);
        $roomData = $data;
        return view('admin.rooms.updateRoom',[
            'roomData' => $roomData,
            'id' => $id
        ]);
    }

public function update(Request $request, $id)
{
    // Menemukan ruang untuk pembaruan berdasarkan id
    $room = Room::find($id);

    if (!$room) {
        // Menangani kasus dimana ruangannya tidak ada.
        return redirect('/rooms')->with('error', 'Room not found.');
    }

    if ($request->hasFile('image')) {
        // Validasi dan proses gambar baru
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240', // Max size 10MB
        ]);

        // Hapus gambar lama jika ada
        if ($room->image && file_exists(public_path('images/' . $room->image))) {
            unlink(public_path('images/' . $room->image));
        }

        // Unggah gambar baru
        $fileExtension = $request->file('image')->getClientOriginalExtension();
        $newFileName = uniqid();
        $newRoomImage = $newFileName . '.' . $fileExtension;
        $request->file('image')->move(public_path('images/'), $newRoomImage);

        // Perbarui gambar di database
        $room->update(['image' => $newRoomImage]);
    }

    // Perbarui nama ruangan
    if ($request->filled('name')) {
        $room->update(['name' => $request->name]);
    }

    return redirect('/rooms')->with('success', 'Room updated successfully.');
}

    public function delete($id){
        $data = Room::find($id);
        $data->delete();
        return redirect('/rooms');
    }

    function home($id){
        // Retrieve all bookings
        $bookings = Booking::all();
        $userID = Auth::id();
        $user = Auth::user();

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

        return view('employee/home', compact('events', 'userID', 'user'),[
            'rooms' => Room::get(),
            'user_id' => $id
        ]);
    }
    
    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('rooms')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu">';
            foreach($data as $row)
            {
                $output .= '<li><a class="dropdown-item" href="#">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
