<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/account.css') }}">
</head>
<body>
    <div class="logo">
        <a href="{{ route('home.employee', ['id' => auth()->user()->id]) }}"><img src="{{ asset('IMG/logo.png') }}"></a>
    </div>
    <ul>
        <li>
            <div class="popover">
                <ul>
                    <li>
                        <a href=""><img class="user" src="{{ asset('images/'.$user->image) }}"></a>
                        <div class="content">
                            <a href=" " class="acc">My Account</a>
                            <a href="{{ route('Allbookings', ['id' => auth()->user()->id]) }}" class="bookings">My Bookings</a>
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
    </ul>

    <div class="container">
        <div class="left-column">
            <form action="{{ route('update-profile-image', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="photo">
                    <div class="pfp-container">
                        <img class="pfp" src="{{ asset('images/'.$user->image) }}" id="profile-image">
                    </div>
                </label>
                <input type="file" name="image" id="photo" style="display: none;">
                <br>
                <input type="submit" name="submit" value="Save" style="color: white;">
            </form>
            <br>
        </div>
        <div class="right-column">
            <label class="add1">Name &nbsp : &nbsp</label>
            <input type="text" name="name" value="{{ $user->name }}" readonly><br>

            <label class="add2">City &nbsp &nbsp &nbsp &nbsp:   &nbsp</label>
            <input type="text" name="city" value="{{ $user->division }}" readonly><br>

            <label class="add3">E-mail &nbsp:   &nbsp</label>
            <input type="email" name="mail" value="{{ $user->email }}" readonly>

            <a class="" href="{{ route('home.employee', ['id' => auth()->user()->id]) }}">Back</a>
        </div>
    </div>

    <div class="elements">
        <div class="bgdua">
            <svg xmlns="http://www.w3.org/2000/svg" width="300" height="517" viewBox="0 0 347 517" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M163.213 132.641C203.641 89.4388 225.045 24.7371 279.266 7.35886C336.381 -10.947 393.105 12.5382 439.765 44.003C487.342 76.0856 519.766 123.446 536.352 180.722C556.826 251.424 590.491 336.455 542.474 398.689C494.67 460.647 405.023 425.95 332.696 444.677C256.078 464.516 181.9 539.391 112.936 509.908C39.4233 478.481 -9.16473 388.929 2.2333 303.4C12.745 224.522 107.642 192.025 163.213 132.641Z" fill="#FFA41C"/>
            </svg>
        </div>
        <div class="bgsatu">
            <svg xmlns="http://www.w3.org/2000/svg" width="400" height="400" viewBox="0 0 352 351" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M120.821 560.307C63.9643 566.699 4.47204 581.961 -42.9932 542.717C-101.098 494.677 -169.395 418.934 -154.66 332.543C-139.859 245.76 -35.6717 253.661 16.5235 193.764C65.9694 137.022 68.1151 9.76814 134.259 0.989858C199.847 -7.71466 234.915 94.6305 275.715 159.366C311.262 215.766 355.33 272.358 350.88 344.689C346.544 415.18 299.348 466.982 254.187 509.308C215.322 545.734 168.814 554.912 120.821 560.307Z" fill="#2B3DB7"/>
            </svg>
        </div>
    </div>
</body>
</html>
