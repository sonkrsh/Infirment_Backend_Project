<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <title>User Register</title>
</head>
<body>
    <div class="signup-form">	
        <a href="/"> <button type="button" class="btn btn-info">Home</button></a>
        <form action="{{ asset('user') }}" method="post">
            @csrf
            <h2>Create User Account</h2>
            <p class="lead">It's free and hardly takes more than 30 seconds.</p>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" id="width" class="form-control" name="username" placeholder="Username" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                    <input type="email" id="width" class="form-control" name="email" placeholder="Email Address" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" id="width" class="form-control" name="password" placeholder="Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                        <i class="fa fa-check"></i>
                    </span>
                    <input type="password" id="width" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                </div>
            </div>        
            <div class="form-group">
                <button type="submit" id="width" class="btn btn-primary btn-block btn-lg">Sign Up</button>
            </div>
            <p class="small text-center">By clicking the Sign Up button, you agree to our <br><a href="#">Terms &amp; Conditions</a>, and <a href="#">Privacy Policy</a>.</p>
        </form>
        <div class="text-center">Already have an account? <a class="login" href="{{ asset('/user-login') }}">Login here</a>.</div>
        @if(session()->has('msg'))
    <div class="alert alert-success">
        {{ session()->get('msg') }}
    </div>
@endif
    </div>
</body>
</html>