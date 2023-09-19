<?php
$employeeId = auth()->user()->id; // Assuming you have a 'id' field in your user model
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Form Booking</title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('CSS/styleform.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('CSS/styleordered.css')); ?>">
</head>
</head>
<body>
	<div class="logo">
  </div>
  <ul>
  <li><a href="/"><div class="logout"> <img src="<?php echo e(asset('IMG/logout.png')); ?>"></div></a></li>
  <li><a href=" "><div id = "digital-clock"> </div>
 <script src = "<?php echo e(asset('JS/script.js')); ?>"> </script></a></li>
 <li><a href="/yourbookings" id="btn1"><b>Your Bookings</b></a></li>
</ul>


</div>
<div class="form">
    <form action="<?php echo e(route('booking.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
  <h2 class="heading1">BOOKING FORM</h2>
  <h2 class="heading2">1</h2>

  <label class="add1">Name</label>
  <label class="add2">Date</label><br>

  <input type="hidden" name="room_id" value="<?php echo e($roomId); ?>">
  <input type="text" name="name" required>
  <?php if($clickedDate): ?>
  <!-- Hidden input field to send the date with the form submission -->
  <input type="hidden" name="date" value="<?php echo e($clickedDate); ?>">
  <input type="date" id="date" value="<?php echo e($clickedDate); ?>" disabled>
  <?php endif; ?>

  


  <label class="add3">Time</label>
  <label class="add4">Description</label><br>

  <input type="time" name="start_time" required>
  <label class=":"> : </label>
  <input type="time" name="end_time" required>
  <input type="text" name="description" required>


  <br>
  <button type="submit" style="color: white;">ADD</button>
</form>
</div>

<div id="popup" class="popup">
<div class="popup-content">
  <div class="letak">
      <span class="close" onclick="hidePopup()">
      </span>
      <h2 class="close1">Your order has been made!</h2>
      <img class="berhasil" src="<?php echo e(asset('IMG/Ok.png')); ?>">
      <h3 class="close3">You can check your booked room on</h3>
      <a href="/yourbookings" class="close4"><h3>Your Bookings</h3></a><br>
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

// Check if the 'success' parameter exists in the URL
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('success')) {
  showPopup(); // Show popup if the 'success' parameter is present
}
</script>

<?php if(session('error')): ?>
<script>
    alert("<?php echo e(session('error')); ?>");
</script>
<?php endif; ?>


<div class="elements">

    <div class="bgempat">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="101" viewBox="0 0 100 101" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M51.1383 2.53928C61.831 4.39273 71.0413 9.85862 79.155 17.7452C87.9994 26.342 96.4391 35.7965 98.5079 48.5828C100.987 63.9035 101.445 81.9499 91.2961 92.784C81.2038 103.558 65.0437 101.432 51.1383 99.1502C39.5316 97.2452 30.0963 89.9883 21.4025 81.3126C12.0663 71.9959 2.06937 62.3409 0.465466 48.5828C-1.31507 33.3096 1.8593 16.0201 12.6479 6.21705C22.9723 -3.16417 37.9133 0.246923 51.1383 2.53928Z" fill="#FFA234"/>
          </svg>
    </div>

    <div class="bgtiga">
        <svg xmlns="http://www.w3.org/2000/svg" width="606" height="739" viewBox="0 0 402 384" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M185.072 145.13C233.423 88.4281 270.583 -5.79704 344.779 1.12167C419.244 8.06541 430.473 113.139 476.248 172.282C515.085 222.462 574.511 254.816 588.954 316.605C608.556 400.464 629.662 504.253 567.866 564.235C505.78 624.499 403.576 595.365 318.611 579.013C248.686 565.555 73.9964 556.492 30 500.5C-11.1231 448.165 -0.773936 444.41 8.5 378.5C16.9145 318.698 145.888 191.083 185.072 145.13Z" fill="#2B3DB7"/>
          </svg>
    </div>

    <div class="bgdua">
        <svg xmlns="http://www.w3.org/2000/svg" width="251" height="233" viewBox="0 0 251 233" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M127.969 12.3343C154.11 15.0768 181.333 9.98596 202.729 25.0444C227.789 42.6816 253.829 68.5455 250.751 98.7489C247.744 128.261 209.278 137.014 189.081 158.998C166.675 183.384 160.919 227.155 127.969 232.389C94.1836 237.755 66.8565 206.689 43.3819 182.141C20.8039 158.53 1.65541 131.165 0.174366 98.7489C-1.36998 64.9473 7.09937 26.6284 35.4023 7.48993C61.8917 -10.4222 96.0276 8.98334 127.969 12.3343Z" fill="#2B3DB7"/>
          </svg>
    </div>

    <div class="bgsatu">
        <svg xmlns="http://www.w3.org/2000/svg" width="255" height="549" viewBox="0 0 255 549" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M-184.408 252.242C-170.929 166.922 -177.83 57.2803 -112.587 14.4525C-47.7651 -28.0989 22.7928 39.3794 87.468 73.7725C129.338 96.0386 152.768 150.077 182.683 190.708C218.074 238.777 251.133 282.659 253.112 347.864C255.465 425.385 258.177 500.203 198.951 538.487C140.918 576 82.7693 499.453 18.7279 492.697C-52.5213 485.181 -139.547 556.008 -188.914 497.571C-238.397 438.998 -197.733 336.586 -184.408 252.242Z" fill="#FFA234"/>
          </svg>
    </div>
</div>
</body>
</html>




<?php /**PATH /Users/lintang/Documents/laravel/bookingmeetingroomV2/resources/views/employee/booking/create.blade.php ENDPATH**/ ?>