<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Infirment_Backend</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

      
    </head>
    <body>

      <div class="container">
       
        <div class="main_box" style="height: 100vh;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-direction: column;
    }">
     <h2>Infirment Technologies Private Limited </h2>
     <p style="text-align: right">Project made by sourav kumar singh</p>
          <div style="text-align: center" class="superuser">
            <h2>Login With SuperUser</h2>
            <a href="{{ url('/SuperUser-Login') }}" class="btn btn-xs"><button type="button" class="btn btn-secondary">Login ->Super User</button></a>
          </div>
          <div style="text-align: center" class="Admin">
            <h2>Click to Register and Login With Admin</h2>
            <a href="{{ url('/register-admin') }}" class="btn btn-xs"><button type="button" class="btn btn-info">Register or Login -> Admin</button></a>

          </div>
          <div style="text-align: center" class="superuser">
            <h2>Click to Register and Login With User</h2>
            <a href="{{ url('/register-user') }}" class="btn btn-xs"><button type="button" class="btn btn-success">Register or Login -> User</button> </a>
          </div>
        </div>
      </div>
      
    </body>
</html>
