<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Đăng nhập hệ thống</title>
	<base href="{{ asset(' ') }}">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="loginmodal-container">
		<h1>Tài khoản của bạn</h1>
		<br>
		<form>
			<input type="text" name="user" placeholder="Tên tài khoản" autocomplete="off">
			<p class="error"></p>
			<input type="password" name="pass" placeholder="Mật khẩu" autocomplete="off">
			<p class="error"></p>
			<input type="submit" name="login" class="login loginmodal-submit" value="Đăng nhập">
		</form>
		<div class="login-help">
			<a href="#">Quên mật khẩu</a>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>