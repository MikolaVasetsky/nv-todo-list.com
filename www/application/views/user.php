<?php require_once('layouts/header.php'); ?>

	<style>
		body {
			background-color: #eee;
		}

		.form-user {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		.form-user .form-user-heading{
			margin-bottom: 10px;
		}
		.form-user .form-control {
			position: relative;
			height: auto;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			padding: 10px;
			font-size: 16px;
		}
		.form-user .form-control:focus {
			z-index: 2;
		}
		.form-user input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form-user .last_field {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	</style>

<div class="container pt-5">
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" href="#login" role="tab" data-toggle="tab">Login</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#register" role="tab" data-toggle="tab">Register</a>
		</li>
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="login">
			<form class="form-user" method="POST" action="/user/login">
				<h2 class="form-user-heading">Login</h2>

				<label for="email" class="sr-only">Email address</label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>

				<label for="password" class="sr-only">Password</label>
				<input type="password" name="password" id="password" class="form-control last_field" placeholder="Password" required>

				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="register">
			<form class="form-user" method="POST" action="/user/register">
				<h2 class="form-user-heading">Register</h2>

				<label for="first_name" class="sr-only">First name</label>
				<input type="first_name" name="first_name" id="reg_first_name" class="form-control" placeholder="First name" required autofocus>

				<label for="last_name" class="sr-only">Last name</label>
				<input type="last_name" name="last_name" id="reg_last_name" class="form-control" placeholder="Last name" required autofocus>

				<label for="email" class="sr-only">Email address</label>
				<input type="email" name="email" id="reg_email" class="form-control" placeholder="Email address" required autofocus>

				<label for="password" class="sr-only">Password</label>
				<input type="password" name="password" id="reg_password" class="form-control" placeholder="Password" required>

				<label for="confirm_password" class="sr-only">Confirm Password</label>
				<input type="password" name="confirm_password" id="reg_confirm_password" class="form-control last_field" placeholder="Confirm Password" required>

				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
		</div>
	</div>
</div>

<?php require_once('layouts/footer.php'); ?>

<script>
var reg_password = document.getElementById("reg_password"),
	reg_confirm_password = document.getElementById("reg_confirm_password");

function validatePassword(){
	if(reg_password.value != reg_confirm_password.value) {
		reg_confirm_password.setCustomValidity("Passwords Don't Match");
	} else {
		reg_confirm_password.setCustomValidity('');
	}
}

reg_password.onchange = validatePassword;
reg_confirm_password.onkeyup = validatePassword;
</script>