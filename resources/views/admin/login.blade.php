<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
    <div class="signup-form">	
        <a href="/"> <button type="button" class="btn btn-info">Home</button></a>
        <form action="{{ asset('adminCheck') }}" method="post">
            @csrf
            <h2>Admin Login</h2>
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
                <button type="submit" id="width" class="btn btn-primary btn-block btn-lg">Login </button>
            </div>
        
        </form>

        @if(session()->has('msg'))
    <div class="alert alert-success">
        {{ session()->get('msg') }}
    </div>
@endif
    </div>
</body>
</html>