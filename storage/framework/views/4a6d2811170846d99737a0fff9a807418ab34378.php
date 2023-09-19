<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo e(asset('CSS/stylelogin.css')); ?>">
	<title>Login</title>
</head>
<body>
    <div class="bd">
		<img src="<?php echo e(asset('IMG/bd.png')); ?>">
	</div>
    <div class="bg">
        <img src="<?php echo e(asset('IMG/bg.png')); ?>">
    </div>
	<div class="container">
		<img class="logo" src="<?php echo e(asset('IMG/logo.png')); ?>">
            <form method="POST" action="<?php echo e(route('Cobalogin')); ?>">
                <?php echo csrf_field(); ?>
                <?php if($clickedDate): ?>
                    <!-- Hidden input field to send the clickedDate with the form submission -->
                    <input type="hidden" name="clickedDate" value="<?php echo e($clickedDate); ?>">
                <?php endif; ?>
                <div class="username">
                    <input type="text" placeholder="Username" value="<?php echo e(Session::get('username')); ?>" name="username" id="username"><img class="user" src="<?php echo e(asset('IMG/uname.png')); ?>"" style="width: 25px; height: auto; margin-bottom: -10px; margin-left: -315px;">
                </div>
                <br>
                <div class="password">
                    <input type="password" placeholder="Password" name="password" id="password"><img class="pw" src="<?php echo e(asset('IMG/pw.png')); ?>" style="width: 25px; height: auto; margin-bottom: -10px; margin-left: -315px;">
                </div>
                <br>
                <button class="submit" name="submit" type="submit">Login</button>
            </form>
    </div>
    <?php if(session('error')): ?>
        <script>
            alert("<?php echo e(session('error')); ?>");
        </script>
    <?php endif; ?>
</body>
</html>

<?php /**PATH /Users/lintang/Documents/laravel/bookingmeetingroomV2/resources/views/login.blade.php ENDPATH**/ ?>