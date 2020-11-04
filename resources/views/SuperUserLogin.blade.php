<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super User Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet"/>
</head>
<body>

  <div class="container">
    <h2>Super User Login Form</h2>
    <form action="{{ asset('SuperUserCheck') }}"  method="post">
      @csrf
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter email" name="email" required>
    
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
            
        <button type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>
    
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
      @if($errors->any())
      <h4>{{$errors->first()}}</h4>
      @endif
    </form>
  </div>
  
</body>
</html>