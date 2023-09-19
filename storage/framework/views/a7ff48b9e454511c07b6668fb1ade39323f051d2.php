<?php
    use App\Models\Room;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<title>Your Bookings</title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('CSS/ybooking.css')); ?>">
</head>
</head>
<body>
	<div class="logo">
        <a href="<?php echo e(route('home.employee', ['id' => auth()->user()->id])); ?>"><img src="<?php echo e(asset('IMG/logo.png')); ?>"></a>
    </div>
    <ul>
        <li><a href="<?php echo e(route('employee.account', ['id' => auth()->user()->id])); ?>"><div class="user"> <img src="<?php echo e(asset('images/'.$user->image)); ?>"></div></a></li>
        <li><a href=" "><div id = "digital-clock"> </div>
        <script src = "<?php echo e(asset('JS/script.js')); ?>"> </script></a></li>
    </ul>

<div class="form">
    <h2 class="heading1">Your Booking(s)</h2>
    <div class="back-btn">
        <a class="" href="<?php echo e(route('home.employee', ['id' => auth()->user()->id])); ?>">Back</a>
    </div>
    <div class="bookings-container">

        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($booking->status == 0): ?>
                <div class="bookings">
                <?php
                    $room = Room::find($booking->room_id);
                    $roomName = $room ? $room->name : 'Room Not Found';
                ?>
                    <p><?php echo e($roomName); ?></p>
                    <span class="first"><?php echo e($booking->booking_date); ?> |</span>
                    <span><?php echo e($booking->time_start); ?> -</span>
                    <span><?php echo e($booking->time_end); ?> |</span>
                    <span><?php echo e($booking->name); ?></span>
                    <input type="submit" class="cancel" name="Pesan" value="Cancel" data-booking-id="<?php echo e($booking->id); ?>" id="sendButton">
                    <div class="popup" id="confirmationPopup">
                        <div class="popup-content">
                            <p>Are you sure?</p>
                            <div class="button-container">
                                <button class="button close5" id="cancelButton">No</button>
                                <button class="button close4" id="confirmButton">Yes</button>
                            </div>
                        </div>
                    </div>


                    <div class="popup" id="successPopup">
                        <div class="popup-content2">
                            <p>Your booking has been canceled</p>
                            <button class="button close4-success" id="closeSuccessButton">OK</button>
                        </div>
                    </div>

                    <script src="<?php echo e(asset("JS/popup-ybooking.js")); ?>"></script>
                </div>

            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

</div>


<div class="elements">
    <div class="bgempat">
        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="95" viewBox="0 0 93 128" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M83.1932 23.9688C89.9022 32.9545 92.7098 43.9475 92.8247 56.2138C92.9498 69.5849 92.1086 83.3959 83.8638 95.5827C73.9847 110.185 60.4761 125.676 44.4383 127.734C28.4902 129.782 17.8318 116.77 9.00879 105.192C1.64434 95.5283 0.0408693 82.8734 0.0907902 69.5405C0.144405 55.2226 -0.0448205 40.1614 9.29978 27.4805C19.6735 13.4031 35.3637 1.07232 51.0962 0.324661C66.1518 -0.390827 74.8955 12.8553 83.1932 23.9688Z" fill="#2B3DB7"/>
        </svg>
    </div>

    <div class="bgtiga">
        <svg xmlns="http://www.w3.org/2000/svg" width="600" height="1000" viewBox="0 0 304 647" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M272.548 174.991C338.165 99.2157 474.24 -4.94359 571.048 0.990674C668.206 6.94644 719.203 29.9322 776.659 104.991C825.408 168.675 802.702 296.54 819.048 376.336C841.232 484.636 822.171 514.271 738.824 594.87C655.085 675.846 522.544 642.167 412.035 624.403C321.085 609.784 92.8596 605.215 37.6005 534.183C-14.05 467.789 -0.351659 462.475 14.5094 376.336C27.9934 298.179 219.37 236.4 272.548 174.991Z" fill="#FFA234"/>
        </svg>
    </div>

    <div class="bgdua">
        <svg xmlns="http://www.w3.org/2000/svg" width="251" height="233" viewBox="0 0 251 233" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M127.969 12.3343C154.11 15.0768 181.333 9.98596 202.729 25.0444C227.789 42.6816 253.829 68.5455 250.751 98.7489C247.744 128.261 209.278 137.014 189.081 158.998C166.675 183.384 160.919 227.155 127.969 232.389C94.1836 237.755 66.8565 206.689 43.3819 182.141C20.8039 158.53 1.65541 131.165 0.174366 98.7489C-1.36998 64.9473 7.09937 26.6284 35.4023 7.48993C61.8917 -10.4222 96.0276 8.98334 127.969 12.3343Z" fill="#FFA234"/>
        </svg>
    </div>

    <div class="bgsatu">
        <svg xmlns="http://www.w3.org/2000/svg" width="700" height="420" viewBox="0 0 368 420" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M124.127 460.354C210.108 436.349 323.818 431.501 359.209 356.684C394.372 282.351 315.581 214.159 271.607 148.583C243.139 106.129 184.435 87.0204 138.662 59.4523C84.5099 26.8375 34.9747 -3.74195 -32.3669 1.42226C-112.428 7.56184 -189.756 13.0137 -221.272 80.8639C-252.153 147.348 -165.682 201.207 -150.225 269.192C-133.027 344.828 -194.328 446.155 -127.654 492.612C-60.8232 539.178 39.1298 484.085 124.127 460.354Z" fill="#2B3DB7"/>
        </svg>
    </div>
</div>

</body>
</html>

<?php /**PATH /Users/lintang/Documents/laravel/bookingmeetingroomV2/resources/views/employee/yourbookings.blade.php ENDPATH**/ ?>