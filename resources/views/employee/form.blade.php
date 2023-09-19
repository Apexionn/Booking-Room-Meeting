@php
    $employeeId = auth()->user()->id;
@endphp

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<title>Form Booking</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('CSS/NEWstyleform.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/popup.css') }}">
</head>
</head>
<body>
	<div class="logo">
        <a href="{{ route('home.employee', ['id' => $employeeId]) }}"><img src="{{ asset('IMG/logo.png') }}"></a>
    </div>
    <ul>
        <li><a href="{{ route('employee.account', ['id' => auth()->user()->id]) }}"><div class="user"> <img src="{{ asset('images/'.$user->image) }}"></div></a></li>
        <li><a href=" "><div id = "digital-clock"> </div>
        <script src = "{{ asset('JS/script.js') }}"> </script></a></li>
    </ul>

{{-- Rooms --}}
<div class="container1">
    @foreach ($rooms as $room)
        <div class="room" data-room="{{ $room->id }}" data-room-name="{{ $room->name }}">
            <img src="{{ asset('images/'.$room->image) }}">
            <div class="btn-room">
                <b>{{ $room['name'] }}</b>
            </div>
        </div>
    @endforeach
</div>

{{-- Table Shows when clicked based on the room clicked --}}
<!-- Schedules -->
<div class="container2">
    <h2>Schedules</h2>
        <table class="Data-table" id="bookingTable" style="display: none;">
            <thead>
                <tr>
                    <th class="first">Name</th>
                    <th class="second">Jam</th>
                </tr>
            </thead>
            <tbody id="bookingTableBody">
                <!-- Table rows will be added here dynamically using JavaScript -->
            </tbody>
        </table>
</div>

    <!-- Clicked Room -->
    <script>
        $(document).ready(function () {
            $('.room').click(function () {
                // Menghapus class "selected-room" dari semua rooms
                $('.room').removeClass('selected-room');

                // Mengambil ID Room dari atribut data-room
                var roomId = $(this).data('room');

                // Mengambil Nama Room dari atribut data-room-name
                var roomName = $(this).data('room-name');

                // Mengupdate input room di booking form dengan nama room yang diambil dari kode diatas ini
                $('#room').val(roomName);

                // Menambahkan class "selected-room" ke room yang di klik
                $(this).addClass('selected-room');

                // Mengupdate input yang hidden dengan ID room yang dipilih oleh user
                $('#selectedRoom').val(roomId);

                // Memunculkan Data Table
                $('#bookingTable').show();

                // AJAX call to fetch and populate the table with status 0 bookings
                $.ajax({
                    url: "{{ route('get.bookings') }}",
                    type: "GET",
                    data: {
                        roomId: roomId,
                        clickedDate: "{{ $clickedDate }}"
                    },
                    success: function (data) {
                        // Mengkosongkan atau menghapus body tablenya
                        $('#bookingTableBody').empty();

                        // Menyortir data bookingnya dengan menggunakan time_start
                        data.bookings.sort(function (a, b) {
                            // Mengkonversikan string waktu menjadi objek Tanggal untuk perbandingan
                            var timeA = new Date('1970-01-01T' + a.time_start);
                            var timeB = new Date('1970-01-01T' + b.time_start);
                            return timeA - timeB;
                        });

                        // Isi tabel dengan data yang diurutkan
                        if (data.bookings.length > 0) {
                            $.each(data.bookings, function (index, booking) {
                                var row = '<tr><td class="booking-name">' + booking.name + '</td><td class="booking-hour">' + booking.time_start + ' - ' + booking.time_end + '</td></tr>';
                                $('#bookingTableBody').append(row);
                            });
                        } else {
                            // Menangani kasus dimana tidak ditemukan pemesanan dengan status 0
                            $('#bookingTableBody').append('<tr><td colspan="2" class="error">Empty!</td></tr>');
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</div>

<form action="{{ route('store.booking') }}" method="POST">
    @csrf
    <div class="container3">
        <h2 class="heading1">BOOKING FORM</h2><br>

        <label class="add1">Name</label>
        <label class="add2">Department</label>
        <label class="add3">Room</label><br>

        <input type="hidden" name="name" value="{{ $user->name }}">
        <input type="text" name="name" value="{{ $user->name }}" disabled>
        <input type="hidden" name="department" value="{{ $user->division }}">
        <input type="text" name="department" value="{{ $user->division }}" disabled>
        <input type="text" name="room" id="room" value="Select The Room" readonly required>
        {{-- Pakenya Yang Selected Room buat masukin ke database! --}}
        <input type="hidden" name="selectedRoom" id="selectedRoom"><br>

        <label class="add4">Date</label>
        <label class="add5">Time</label>
        <label class="add6">Descriptions</label><br>

        @if($clickedDate)
        <input type="hidden" name="date" value="{{ $clickedDate }}">
        <input type="date" name="date" id="date" value="{{ $clickedDate }}" disabled>
        @endif

        <input type="time" name="start_time" required>
        <label class=":"> : </label>
        <input type="time" name="end_time" required>
        <input type="text" name="description" required>

        <input type="hidden" name="user_id" value="{{ $employeeId }}">

        <button class="batal" onclick="window.location = '{{ route('home.employee', ['id' => $employeeId]) }}'"><a href="{{ route('home.employee', ['id' => $employeeId]) }}" style="text-decoration: none; color: white;">Cancel</a></button>
        <input type="submit" name="submit" value="Add" style="color: white;">
    </div>
</form>

<div id="popup" class="popup">
    <div class="popup-content">
        <div class="letak">
            <span class="close" onclick="hidePopup()">
            <img class="berhasil" src="{{ asset('IMG/Ok2.png') }}">
            <h2 class="close1">Your order has been made!</h2><br><br>
            <a href="{{ route('home.employee', ['id' => $employeeId]) }}" class="close5">Close</a>
            <a href="{{ route('Allbookings', ['id' => auth()->user()->id]) }}" class="close4">Your Booking</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showPopup() {
        document.getElementById("popup").style.display = "block";
    }

    function hidePopup() {
        document.getElementById("popup").style.display = "none";
    }

    // Memeriksa apakah parameter 'sukses' ada di URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        showPopup();
    }
</script>

@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

</body>
</html>
