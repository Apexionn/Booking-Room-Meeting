<?php
use App\Models\Room;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <link rel="stylesheet" href="{{ asset("CSS/NEWstyleadmin.css") }}">
    <title>Manage Bookings</title>
</head>
<body>
    <div class="logo">
        <a href="/bookings"><img src="{{ asset('IMG/logo.png') }}"></a>
    </div>
    <ul class="li-nav">
        <li>
            <div class="popover">
                <ul>
                    <li>
                        <a href=""><img class="user" src="{{ asset('IMG/user.png') }}"></a>
                        <div class="content">
                            <a href="/rooms" class="acc">Rooms</a>
                            <a href="/bookings" class="bookings">Bookings</a>
                            <a href="/manage-employees" class="logout">Users</a>
                            <a href="/" class="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#">
                <div id="digital-clock"></div>
                <script src="{{ asset('JS/script.js') }}"></script>
            </a>
        </li>
        <h2>Admin</h2>
    </ul>

{{-- search --}}
<div class="container-search">
    <form class="search-form" role="search" action="/bookings">
        {{ csrf_field() }}
        <input class="typeahead form-control" type="search" placeholder="Search..." aria-label="Search" name="search" id="search" autocomplete="off">
        <button class="search" type="submit">Search</button>
        <div id="dataList"></div>
    </form>
</div>

{{-- Autocomplete --}}
<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete-bookings.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#dataList').fadeIn();
                        $('#dataList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){
            $('#search').val($(this).text());
            $('#dataList').fadeOut();
        });
    });
</script>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th class="number">No</th>
                <th>Room</th>
                <th>Employee</th>
                <th>Description</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>Action</th>
            </tr>
        </thead>
        @php
            $no = 1;
        @endphp
        <tbody>
            @if ($bookings->isEmpty())
                <tr class="error-data">
                    <td colspan="7" rowspan="7">No Data Found!</td>
                </tr>
            @else
                @foreach ($bookings as $booking)
                    <tr class="table-row {{ $no % 2 == 0 ? 'even-row' : 'odd-row' }}">
                        @if ($booking->status == 0)
                            @php
                                $room = Room::find($booking->room_id);
                                $roomName = $room ? $room->name : 'Room Not Found';
                            @endphp
                            <td>{{ $no++ }}</td>
                            <td>{{ $roomName }}</td>
                            <td>{{ $booking->name}}</td>
                            <td>{{ $booking->description }}</td>
                            <td>{{ $booking->booking_date}}</td>
                            <td>{{ $booking->time_start}}-{{ $booking->time_end}}</td>
                            <td>
                                <div class="tes">
                                    <a class="delete" href="/reject-form/{{ $booking->id }}">Reject</a>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif

    <div class="bgsatu">
        <svg xmlns="http://www.w3.org/2000/svg" width="500" height="374" viewBox="0 0 440 374" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M168.226 13.088C250.096 -0.940394 349.095 -18.5911 405.149 48.5739C460.745 115.189 413.519 218.94 415.498 309.373C417.574 404.182 468.688 507.301 416.85 583.052C362.42 662.593 256.811 690.917 168.226 670.718C89.4626 652.759 64.3758 548.769 4.92638 489.128C-60.5859 423.405 -189.378 406.902 -191.959 309.373C-194.531 212.192 -75.622 177.029 -4.87236 118.831C50.0791 73.6283 100.442 24.7027 168.226 13.088Z" fill="#FFA234"/>
        </svg>
    </div>

    <div class="bgdua">
        <svg xmlns="http://www.w3.org/2000/svg" width="133" height="156" viewBox="0 0 133 156" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M57.5704 0.000630187C75.4184 0.106808 88.0734 17.286 101.035 31.0885C114.564 45.4954 130.705 59.1421 132.677 79.9805C134.798 102.413 126.341 125.486 111.386 140.516C97.0619 154.912 76.7781 155.298 57.5704 155.462C38.1517 155.627 13.3359 159.886 2.93393 141.439C-7.45204 123.022 12.9109 101.663 15.0054 79.9805C16.6505 62.9502 5.8215 45.2667 13.6437 30.5687C22.8374 13.2937 39.6718 -0.105849 57.5704 0.000630187Z" fill="#2B3DB7"/>
        </svg>
    </div>

    <div class="bgempat">
        <svg xmlns="http://www.w3.org/2000/svg" width="219" height="473" viewBox="0 0 219 473" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M253.723 0.592054C343.507 8.29298 367.653 96.9201 418.61 153.345C454.922 193.552 500.07 229.441 504.277 278.025C508.764 329.83 492.886 385.563 441.721 420.181C392.282 453.632 319.702 442.307 253.723 447.551C173.669 453.913 77.1423 497.604 21.5657 453.573C-34.1482 409.433 35.1459 338.943 39.7457 278.025C43.8383 223.823 10.4731 168.338 46.6439 121.44C92.309 62.2331 163.658 -7.13306 253.723 0.592054Z" fill="#2B3DB7"/>
        </svg>
    </div>

    <div class="bgenam">
        <svg xmlns="http://www.w3.org/2000/svg" width="111" height="116" viewBox="0 0 111 116" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.76866 26.1278C19.998 9.59547 41.876 -0.792358 58.9866 0.812426C74.8431 2.29959 77.2931 22.0009 86.8659 33.3586C95.0149 43.0271 109.968 47.6337 110.127 61.4887C110.295 76.0276 99.8438 91.0918 87.6552 101.853C76.442 111.753 62.1831 115.409 48.8097 115.626C36.8311 115.82 26.022 111.516 19.1926 102.963C12.9704 95.1712 2.14889 80.1003 0.848753 69.5C-1.11761 53.4677 0.153679 41.6672 9.76866 26.1278Z" fill="#FFA234"/>
        </svg>
    </div>
</body>
</html>
