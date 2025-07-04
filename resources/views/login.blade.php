<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Login Page</title>
</head>
<!-- <style>
      body{ background-image: url('../foto/2.jpg');}
</style> -->
<div class="background"></div>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<!-- <form action="#">
				<h1>Create Account</h1>
				<span>or use your email for registration</span>
				<form action="/register" method="POST">
					@csrf
					<input type="text" name="name" placeholder="Name" required />
					<input type="email" name="email" placeholder="Email" required />
					<input type="password" name="password" placeholder="Password" required />
					<button type="submit">Sign Up</button>
				</form>
			</form> -->
		</div>
		<div class="form-container sign-in-container">
			<form action="/login" method="POST">
				<h1>Sign in</h1>
				<span>or use your account</span>
				
					@csrf
					<input type="email" name="email" placeholder="Email" required />
					<input type="password" name="password" placeholder="Password" required />
					<button type="submit">Sign In</button>
				

				<a href="#">Forgot your password?</a>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<!-- <div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign in</button>
				</div> -->
			</div>
		</div>
	</div>


</body>

<script src="js/style.js"></script>

</html>