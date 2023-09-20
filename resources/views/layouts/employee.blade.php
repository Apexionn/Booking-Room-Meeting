<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('CSS/styles.css') }}">
</head>
</head>
<body>
	<div class="logo">
    <a href="index"><img src="{{ asset('IMG/logo.png') }}"></a>
  </div>
  <ul>
  <li><a href="/login"><div class="logout"> <img src="{{ asset('IMG/logout.png') }}"></div></a></li>
  <li><a href=" "><div id = "digital-clock"> </div>
 <script src = "{{ asset('JS/script.js') }}"> </script></a></li>
 <li><a href="yourbookings" id="btn1"><b>Your Bookings</b></a></li>
</ul>

<div class="header">

<h1>MEETING ROOM<br>BOOKING</h1>
<p>Book your Meeting Room easily</p>


</div>



<div class="elements">

	<div class="btn">
	<a href="#box"><b>Rooms</b></a>
	</div>

<div class="bgsembilan">
	<img src="{{ asset('IMG/thumb.png') }}">
</div>


<div class="bgdelapan">
	<img src="{{ asset('IMG/black2.png') }}">
</div>

<div class="bgtujuh">
	<img src="{{ asset('IMG/spark.png') }}">
</div>

<div class="bgenam">
	<img src="{{ asset('IMG/black1.png') }}">
</div>

<div class="bglima">
	<img src="{{ asset('IMG/blue2.png') }}">
</div>


<div class="bgempat">
	<img src="{{ asset('IMG/blue1.png') }}">
</div>


<div class="bgtiga">
	<img src="{{ asset('IMG/mockup.png') }}">
</div>


<div class="bgdua">
	<svg xmlns="http://www.w3.org/2000/svg" width="340" height="371" viewBox="0 0 357 388" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M44.5245 312.103C14.9892 289.927 10.5083 267.676 2.50827 212.176C-1.99173 154.676 2.45155 77.5083 17.5242 46.2688C34.4803 11.1258 46.4205 -1.25618 90.5243 0.268681C133.041 1.73866 142.008 18.6765 265.008 88.6765C296.556 113.102 335.024 160.769 345.524 200.269C359.366 236.847 369 361.5 321.524 384.769C282.5 401 219.024 341.497 169.524 330.603C96.5244 308.997 79.0244 330.603 44.5245 312.103Z" fill="#2B3DB7"/>
	</svg>
</div>

<div class="bgsatu">
	<svg xmlns="http://www.w3.org/2000/svg" width="1500"
height="1772" viewBox="0 0 1280 1772" fill="none"> <path fill-rule="evenodd"
clip-rule="evenodd" d="M1041.11 1661.03C808.199 1774.9 475.088 1798.22
238.635 1742.07C-3.05715 1684.68 -477.617 1359.23 -575.918 1158.25C-683.031
939.251 -400.208 822.346 -264.648 589.339C-129.702 357.388 236.821 382.251
504.915 278.036C759.287 179.155 983.651 -25.5812 1242.89 3.32086C1544.21
36.915 1855.97 179.078 1929.37 436.847C2000.54 686.785 2023.99 1223.17
1835.27 1449.83C1694.93 1618.39 1246.46 1560.64 1041.11 1661.03Z"
fill="#FFA234"/>
	</svg>
</div>

</div>



<div id="box">

</div>

@yield('content')






</body>
</html>
