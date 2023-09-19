<?php
$employeeId = auth()->user()->id; // Assuming you have a 'id' field in your user model
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($roomdata->name); ?> CALENDAR</title>
    <!-- Include FullCalendar CSS and other dependencies -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('CSS/stylecalendar.css')); ?>">



</head>
<body>
    <div class="logo">
        <a href="<?php echo e(route('index.employee', ['id' => $employeeId])); ?>"><img src="<?php echo e(asset('IMG/logo.png')); ?>"></a>
        </div>
        <ul>
        <li><a href="/"><div class="logout"> <img src="<?php echo e(asset('IMG/logout.png')); ?>"></div></a></li>
        <li><a href=" "><div id = "digital-clock"> </div>
        <script src = "<?php echo e(asset('JS/script.js')); ?>"> </script></a></li>
        <li><a href="/yourbookings" id="btn1"><b>Your Bookings</b></a></li>
    </ul>


    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div id='calendar' class="custom-calendar-style"></div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

    <div class="room1">
        <div class="btnr1">
        <p><b><?php echo e($roomdata->name); ?></b></p>
        </div>
        <img src="<?php echo e(asset('images/'. $roomdata->image )); ?>">
        <div class="btnr1">
        </div>
    </div>

    <div class="bgsatu">
        <img src="<?php echo e(asset('IMG/1.png')); ?>">
    </div>

    <script>
        // Assign the room ID to a JavaScript variable
        var roomId = <?php echo e($roomdata->id); ?>;
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 800,
                headerToolbar: {
                    start: 'prev',
                    center: 'title',
                    end: 'next',
                },
                dateClick: function(info) {
                    // Get the clicked date
                    var clickedDate = info.date;

                    // Get today's date
                    var today = new Date();
                    today.setHours(0, 0, 0, 0);

                    // Compare the clicked date with today's date
                    if (clickedDate < today) {
                        // If clicked date is before today, do nothing
                        window.alert("Maaf, Anda tidak bisa pesan dihari yang sudah lewat!");
                        return;
                    }

                    // Handle the click action for dates after today
                    // For example, you can navigate to a new page
                    // var roomId = 5;
                    var newPageUrl = '<?php echo e(route('booking.date', ['id' => ':id', 'date' => ':date'])); ?>'
                        .replace(':id', roomId)
                        .replace(':date', info.dateStr);

                    window.location.href = newPageUrl;


                },


            });
            calendar.render();
        });
        </script>
</body>
</html>
<?php /**PATH /Users/lintang/Documents/laravel/bookingmeetingroomV2/resources/views/employee/booking/calendar.blade.php ENDPATH**/ ?>