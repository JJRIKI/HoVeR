<?php
	if (isset($_POST["submit"])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$errEmail = 'no';
		$errPassword = 'no';
	}
?>
<script>
	function login() {
		if (document.getElementById("email") == 'jbek@anonymous.com') {
			document.getElementById("login_page").setAttribute("action","../Homeowner/home_page/index.html");
		}
	}
	</script>
<!DOCTYPE html>

<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Login</title>

		<!--<link rel="stylesheet" href="../login_page/bootstrap-scss/bootstrap.scss">-->
		<!--<link rel="stylesheet" href="style.css"-->
		<link rel="stylesheet" href="app.css">
	</head>
<body>

<form class="container" action="../Manager/home_page/index.html" method="post" id="login_page">
	<div class="form-row align-items-center">
		<div class="col-sm">
			<h1>Login</h1>
		</div>
	</div>
	<div class="form-row align-items-center">

		<div class="col-auto">
			<div class="form-group">
				<input type="email" class="form-control" name="" placeholder="user@example.com" id="email">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="" placeholder="Password" id="password">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" onclick="login()">Submit</button>
			</div>
		</div>

	</div>
</form>


</body>
</html>
