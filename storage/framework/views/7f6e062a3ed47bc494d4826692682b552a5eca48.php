<?php $__env->startSection('content'); ?>
<div class="form">
    <form action="/update/<?php echo e($data->id); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
    <h2 class="heading1">EDIT</h2>
    <h2 class="heading2"><?php echo e($data->name); ?></h2>

    <label class="add1">Room Name</label>
    <label class="add2">Picture</label><br>

     <input type="text" name="name" id="name" value="<?php echo e($data->name); ?>">
     <input type="file" name="image" id="image"> <br>
                <img src="<?php echo e(asset('images/'.$data->image)); ?>" alt="image" width="40" class="picture"> <br>
        
        <br>
        <button class="batal" onclick="window.location = 'admin'" style="color: #fff;">Cancel</button>
        <button type="submit" style="color: #fff;">Update Data</button>
    </form>
</div>

<div class="bgsatuu">
    <svg xmlns="http://www.w3.org/2000/svg" width="800" height="450" viewBox="0 0 440 374" fill="none">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M168.226 13.088C250.096 -0.940394 349.095 -18.5911 405.149 48.5739C460.745 115.189 413.519 218.94 415.498 309.373C417.574 404.182 468.688 507.301 416.85 583.052C362.42 662.593 256.811 690.917 168.226 670.718C89.4626 652.759 64.3758 548.769 4.92638 489.128C-60.5859 423.405 -189.378 406.902 -191.959 309.373C-194.531 212.192 -75.622 177.029 -4.87236 118.831C50.0791 73.6283 100.442 24.7027 168.226 13.088Z" fill="#FFA234"/>
    </svg> </div>
    <div class="bgduaa"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="156" viewBox="0 0 133 156" fill="none">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M57.5704 0.000630187C75.4184 0.106808 88.0734 17.286 101.035 31.0885C114.564 45.4954 130.705 59.1421 132.677 79.9805C134.798 102.413 126.341 125.486 111.386 140.516C97.0619 154.912 76.7781 155.298 57.5704 155.462C38.1517 155.627 13.3359 159.886 2.93393 141.439C-7.45204 123.022 12.9109 101.663 15.0054 79.9805C16.6505 62.9502 5.8215 45.2667 13.6437 30.5687C22.8374 13.2937 39.6718 -0.105849 57.5704 0.000630187Z" fill="#2B3DB7"/>
    </svg></div>
    <div class="bgtigaa"><svg xmlns="http://www.w3.org/2000/svg" width="269" height="291" viewBox="0 0 269 291" fill="none">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.11092 57.0701C30.1066 17.109 83.7764 -5.22344 127.499 1.90881C168.017 8.51828 177.777 58.7702 204.118 89.2067C226.541 115.116 265.326 129.45 268.221 164.509C271.259 201.299 247.437 237.508 218.43 262.526C191.745 285.542 156.207 292.223 122.298 290.368C91.9256 288.707 63.7136 275.881 44.8405 253.03C27.6457 232.211 32.737 202.663 27.5318 175.628C19.6592 134.74 -14.5038 94.6313 7.11092 57.0701Z" fill="#FFA234"/>
    </svg></div>
    <div class="bgempatt"><svg xmlns="http://www.w3.org/2000/svg" width="300" height="473" viewBox="0 0 219 473" fill="none">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M253.723 0.592054C343.507 8.29298 367.653 96.9201 418.61 153.345C454.922 193.552 500.07 229.441 504.277 278.025C508.764 329.83 492.886 385.563 441.721 420.181C392.282 453.632 319.702 442.307 253.723 447.551C173.669 453.913 77.1423 497.604 21.5657 453.573C-34.1482 409.433 35.1459 338.943 39.7457 278.025C43.8383 223.823 10.4731 168.338 46.6439 121.44C92.309 62.2331 163.658 -7.13306 253.723 0.592054Z" fill="#2B3DB7"/>
    </svg></div>
    <div class="bglimaa"><svg xmlns="http://www.w3.org/2000/svg" width="500" height="300" viewBox="0 0 469 235" fill="none">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M259.237 3.29213C325.927 -10.2403 401.725 18.6345 442.784 77.2392C481.311 132.229 449.663 207.33 450.582 276.398C451.526 347.43 493.091 429.719 448.159 481.389C403.11 533.193 324.855 494.533 259.237 496.437C190.188 498.441 113.841 539.515 59.9333 492.654C4.10261 444.122 -9.69121 352.104 6.10665 276.398C19.8039 210.759 89.5415 187.447 133.525 139.993C177.258 92.8087 198.615 15.5933 259.237 3.29213Z" fill="#2B3DB7"/>
    </svg></div>
    <div class="bgenamm"><svg xmlns="http://www.w3.org/2000/svg" width="111" height="116" viewBox="0 0 111 116" fill="none">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.76866 26.1278C19.998 9.59547 41.876 -0.792358 58.9866 0.812426C74.8431 2.29959 77.2931 22.0009 86.8659 33.3586C95.0149 43.0271 109.968 47.6337 110.127 61.4887C110.295 76.0276 99.8438 91.0918 87.6552 101.853C76.442 111.753 62.1831 115.409 48.8097 115.626C36.8311 115.82 26.022 111.516 19.1926 102.963C12.9704 95.1712 2.14889 80.1003 0.848753 69.5C-1.11761 53.4677 0.153679 41.6672 9.76866 26.1278Z" fill="#FFA234"/>
    </svg></div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lintang/Documents/laravel/bookingmeetingroomV2/resources/views/admin/edit.blade.php ENDPATH**/ ?>