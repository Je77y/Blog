<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
	<title>Đăng nhập hệ thống</title>
	<base href="{{ asset(' ') }}">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="loginmodal-container">
		<h1>Tài khoản của bạn</h1>
		<br>
		<form action="{{ route('admin.signup') }}" method="POST">
			{{ csrf_field() }}
			<input type="text" name="email" placeholder="Email" autocomplete="off">
			<div class="error">
				<div class="message-error"></div>
			</div>
			<input type="password" name="password" placeholder="Mật khẩu" autocomplete="off">
			<div class="error">
				<div class="message-error"></div>
			</div>
			<input type="submit" class="login loginmodal-submit" value="Đăng nhập">
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