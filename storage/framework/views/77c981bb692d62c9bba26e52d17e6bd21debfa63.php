<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset("CSS/NEWstyleadmin.css")); ?>">
    <title>Create Employees</title>
</head>
<body>
    <div class="logo">
        <a href="/manage-employees"><img src="<?php echo e(asset('IMG/logo.png')); ?>"></a>
    </div>
    <ul>
        <li>
            <div class="popover">
                <ul>
                    <li>
                        <a href=""><img class="user" src="<?php echo e(asset('IMG/user.png')); ?>"></a>
                        <div class="content">
                            <a href="/rooms" class="acc">Rooms</a>
                            <a href="/bookings" class="bookings">Bookings</a>
                            <a href="/manage-employees" class="logout">Users</a>
                            <a href="" class="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#">
                <div id="digital-clock"></div>
                <script src="<?php echo e(asset('JS/script.js')); ?>"></script>
            </a>
        </li>
        <h2>Admin</h2>
    </ul>

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

    <div class="form">
        <h2 class="heading1">Add</h2>
        <h2 class="heading2">New Employee</h2>
        <br>
        <form action="/insert-user-data" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <label for="name" class="add1">Name :
            <input class="form-control" type="text" name="name" id="name" required>
        </label>
        <br>
        <label for="password" class="add1">Password :
            <input class="form-control" type="password" name="password" id="password" required>
        </label>
        <br>
        <label for="email" class="add1">Email :
            <input class="form-control" type="email" name="email" id="email" required>
        </label>
        <br>
        <label for="role" class="add1">
            Role :
            <select name="role" id="role" class="add1" required>
                <option selected></option>
                <option value="1" class="form-select">Employee</option>
                <option value="2" class="form-select">Admin</option>
            </select>
        </label>
        <br>
        <label for="division" class="add1">
            Division :
            <select name="division" id="division" class="" required>
                <option selected></option>
                <option value="Jakarta" class="form-select">Jakarta</option>
                <option value="Bekasi" class="form-select">Bekasi</option>
            </select>
        </label>
        <br>
        <label for="image" class="add1">Add Image :
            <input class="form-control" type="file" name="image" id="image">
            <br> <br>
            <img class="preview" id="blah" src="#" alt="Image Preview"/>
        </label>
        
        <div class="duo-button">
            <button class="batal" style="color: #fff;">Cancel</button>
            <button class="submit"type="submit" name="sumbit" style="color: #fff;">Add</button>
        </div>
        </form>

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
                window.location.href = '/manage-employees';
            }
        });

        image.onchange = evt => {
            const [file] = image.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>
</html>


<?php /**PATH /Users/lintang/Documents/laravel/bookingmeetingroomV2/resources/views/admin/employees/createEmployees.blade.php ENDPATH**/ ?>