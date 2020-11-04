<!DOCTYPE html>
<html>
<head>
<title>Super User Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="{{ asset('css/style.css') }}" rel="stylesheet"/>

<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Super User SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="{{ asset('SuperUser') }}" id="superuser" method="post">
                    @csrf
					<input class="text" type="text" name="Username" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" id="psd" name="password" placeholder="Password" required="">
					<input class="text w3lpass"  id="psd2" type="password" name="password2" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP">
				</form>
			<p>Don't have an Account? <a class="login" href="{{ asset('/SuperUser-Login') }}" > Login Now!</a></p>
			</div>
		</div>
	
	</div>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	
	<!-- //main -->

	<script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
</body>
</html>