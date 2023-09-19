<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('CSS/styleadmin.css') }}">
</head>
<body>
  <div class="logo">
    <img src="{{ asset('IMG/logo.png') }}">
  </div>
  <ul>
  <li><a href="/"><div class="logout"> <img src="{{ asset('IMG/logout.png') }}"></div></a></li>
  <li><a href="admin"><div id = "digital-clock"> </div>
 <script src = "{{ asset('JS/script.js') }}"> </script></a></li>
  <h2>Admin</h2>
</ul>

<div class="container mt-4">
    @yield('content')
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
