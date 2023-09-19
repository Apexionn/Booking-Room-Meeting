<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('CSS/stylelogin.css') }}">
	<title>Login</title>
</head>
<body>
    <div class="bd">
		<img src="{{ asset('IMG/bd.png') }}">
	</div>
    <div class="bg">
        <img src="{{ asset('IMG/bg.png') }}">
    </div>
	<div class="container">
		<img class="logo" src="{{ asset('IMG/logo.png') }}">
            <form method="POST" action="{{ route('Cobalogin') }}">
                @csrf
                @if($clickedDate)
                    <!-- Hidden input field to send the clickedDate with the form submission -->
                    <input type="hidden" name="clickedDate" value="{{ $clickedDate }}">
                @endif
                <div class="username">
                    <input type="text" placeholder="Username" value="{{ Session::get('username') }}" name="username" id="username"><img class="user" src="{{ asset('IMG/uname.png') }}"" style="width: 25px; height: auto; margin-bottom: -10px; margin-left: -315px;">
                </div>
                <br>
                <div class="password">
                    <input type="password" placeholder="Password" name="password" id="password"><img class="pw" src="{{ asset('IMG/pw.png') }}" style="width: 25px; height: auto; margin-bottom: -10px; margin-left: -315px;">
                </div>
                <br>
                <button class="submit" name="submit" type="submit">Login</button>
            </form>
    </div>
    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
</body>
</html>

