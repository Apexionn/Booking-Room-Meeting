<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('CSS/rejectform.css') }}">
    <title>Rejection Form</title>
</head>
<body>
    <div class="form">
        <h2 class="heading1">Reject Booking {{ $booking->users[0]->name }}</h2>
        <br>
            <form action="/reject-booking/{{ $id }}" method="">
                @csrf
                <div class="add1">
                    <label class="why" for="reason">Alasan pesanan ini dibatalkan :</label>
                    <textarea name="reason" id="reason" cols="90" rows="8" class="form-control"></textarea>
                </div>
                <div class="duo-button">
                    <button class="batal" style="color: #fff;">Cancel</button>
                    <button name="submit" type="submit" style="color: #fff;">Reject</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const roomForm = document.getElementById('roomForm');
        const cancelButton = document.querySelector('.batal');

        cancelButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Optionally, you can ask for user confirmation before canceling
            const confirmCancel = confirm('Are you sure you want to cancel? Any unsaved changes will be lost.');

            if (confirmCancel) {
                // Redirect the user to the /rooms page or any other desired action
                window.location.href = '/bookings';
            }
        });
    </script>
</body>
</html>
