<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use App\Mail\RejectMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function form($id, $clickedDate)
    {
        $rooms = Room::get();
        $userID = Auth::id();
        $user = Auth::user();
        $bookings = Booking::all();

        return view('employee.form', compact('clickedDate', 'rooms', 'userID', 'user', 'bookings'));
    }

    public function create(Request $request)
    {
        $clickedDate = $request->query('clickedDate');
        $roomId = $request->query('roomId');
        $room = Room::find($roomId);

        return view('employee.booking.create', compact('clickedDate', 'room', 'roomId'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $employeeId = auth()->user()->id;

        // Mengecek jika user belum memilih ruangan
        if (empty($data['selectedRoom'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Maaf, Anda belum Pilih Ruangan Meeting!');
        }

        $startTime = $data['start_time'];
        $endTime = $data['end_time'];

        // Mengecek jika jam akhir tidak kurang dari jam awal
        if (strtotime($endTime) <= strtotime($startTime)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Maaf, Jam Akhir harus lebih dari Jam Awal!.');
        }

        // Mengambil data booking dari tanggal booking, room yang ada atau id, dan status 0 atau masih booked
        $previousEvent = Booking::where('booking_date', $data['date'])
            ->where('room_id', $data['selectedRoom'])
            ->where('status', '0')
            ->where('time_end', '<=', $startTime)
            ->orderBy('time_end', 'desc')
            ->first();

        if ($previousEvent) {
            $breakEndTime = date('H:i:s', strtotime($previousEvent->time_end) + (15 * 60)); // Menambahkan 15 menit di setiap pemesanan
            if (strtotime($breakEndTime) >= strtotime($startTime)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Maaf, Harus ada istirahat 15 menit sebelum pemesanan berikutnya.');
            }
        }

        if ($startTime === $endTime) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Maaf, Jam Awal dan Jam Akhir Tidak Boleh Sama!.');
        }

        // Mengecek jika ada Booking yang mempunyai ruangan dan jam yang sama
        $existingBooking = Booking::where('room_id', $data['selectedRoom'])
            ->where('booking_date', $data['date'])
            ->where('status', "0")
            ->where(function ($query) use ($data) {
                $query->where(function ($q) use ($data) {
                    $q->where('time_start', '>=', $data['start_time'])
                    ->where('time_start', '<', $data['end_time']);
                })->orWhere(function ($q) use ($data) {
                    $q->where('time_start', '<=', $data['start_time'])
                    ->where('time_end', '>', $data['start_time']);
                });
            })
            ->first();

        if ($existingBooking) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Maaf, Waktu yang Anda pilih sudah dipesan untuk ruangan ini!');
        }

        // Membuat Booking
        Booking::create([
            'user_id' => $data['user_id'],
            'room_id' => $data['selectedRoom'],
            'name' => $data['name'],
            'department' => $data['department'],
            'status' => '0',
            'description' => $data['description'],
            'booking_date' => $data['date'],
            'time_start' => $data['start_time'],
            'time_end' => $data['end_time'],
        ]);

        return redirect()->route('form.employee', ['id' => $employeeId, 'clickedDate' => $data['date'], 'success' => true]);
    }

    //  Mengambil semua data booking untuk halaman admin di bagian bookings
    public function index(){
        return view('admin.bookings.dashboard',[
            'bookings' =>Booking::latest()->filters(request(['search']))->get()
        ]);
    }

    // Select booking for rejection
    public function select($id){
        $select = Booking::find($id);

        return view('admin.bookings.reject-form', [
            'id' => $id,
            'booking' => $select
        ]);
    }

    // Reject & send Mail
    public function reject(Request $request, $id){
        $whyyyy = $request->reason;
        $booking = Booking::find($id);
        $room = Room::find($booking->room_id);
        $roomName = $room ? $room->name : 'Room Not Found';
        // Mendapatkan Emailnya User / Employee
        $email= $booking->users[0]->email;
        $date= $booking->booking_date;
        $time= $booking->time_start;
        $data=['room_id' => $roomName, 'booking_date' => $date, 'time_start' => $time,'body' => $whyyyy];
        // Mengubah status booking setelah di reject
        Booking::where('id',$id)->update(['status'=>'1']);
        // Mengirim Notifikasi Email
        Mail::to($email)->send(new RejectMail($data));
        return redirect('/bookings');
    }

    public function getBookings(Request $request)
    {
        $roomId = $request->input('roomId');
        $clickedDate = $request->input('clickedDate');

        // Fetch bookings with status 0 based on the room ID and clickedDate
        $bookings = Booking::where('room_id', $roomId)
            ->where('booking_date', $clickedDate)
            ->where('status', '0') // Filter by status 0 (booked)
            ->select('name', 'time_start', 'time_end')
            ->get();

        return response()->json(['bookings' => $bookings]);
    }

    // public function search(Request $request){
    //     $query = $request->get('query');
    //     $filterResult = Booking::where('name', 'LIKE', '%'. $query. '%')->get();
    //     return response()->json($filterResult);
    // }

    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');

            // Mengambil Semua nama room di table room yang lagi dicari oleh admin
            $roomid = Room::where('name', 'LIKE', "%{$query}%")
            ->distinct()
            ->get();

            // Mengambil Semua nama user di table bookings yang statusnya 0, datanya akan muncul sesuai yang lagi dicari oleh admin
            $names = DB::table('bookings')
                ->where('status', '0')
                ->where('name', 'LIKE', "%{$query}%")
                ->distinct()
                ->pluck('name'); // Agar datanya tidak mengulang / Banyak data yang sama

            // Mengambil Semua tanggal booking di table bookings yang statusnya 0, datanya akan muncul sesuai yang lagi dicari oleh admin
            $dates = DB::table('bookings')
                ->where('status', '0')
                ->where('booking_date', 'LIKE', "%{$query}%")
                ->distinct()
                ->pluck('booking_date');

            // Mengambil Semua jam awal di table bookings yang statusnya 0, datanya akan muncul sesuai yang lagi dicari oleh admin
            $times = DB::table('bookings')
            ->where('status', '0')
            ->where('time_start', 'LIKE', "%{$query}%")
            ->distinct()
            ->pluck('time_start');

            $output = '<ul class="dropdown-menu">';

            // Add booking names to autocomplete suggestions
            foreach ($roomid as $roomname) {
                $output .= '<li><a class="dropdown-item" href="#">'.$roomname->name.'</a></li>';
            }

            // Add booking names to autocomplete suggestions
            foreach ($names as $name) {
                $output .= '<li><a class="dropdown-item" href="#">'.$name.'</a></li>';
            }

            // Add booking dates to autocomplete suggestions
            foreach ($dates as $date) {
                $output .= '<li><a class="dropdown-item" href="#">'.$date.'</a></li>';
            }
            // Add booking times to autocomplete suggestions
            foreach ($times as $time) {
                $output .= '<li><a class="dropdown-item" href="#">'.$time.'</a></li>';
            }

            $output .= '</ul>';
            echo $output;
        }
    }
}

