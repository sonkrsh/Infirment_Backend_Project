<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>adminDashboard</title>
</head>
<body>
    <a method="post" href="{{ asset('/adminLogout') }}"><button type="button" class="btn btn-danger">Logout</button> </a>
    
    
    <div class="container" style="justify-content: center;">
        <h3 style="text-align: center">Post Blog</h3>
        <form action="{{ asset('adminPost') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="post">Post Name</label>
              <input type="text" class="form-control" name="post" id="post">
            </div>
            <label for="comment">Description:</label>
            <textarea class="form-control" rows="5" name="desc" id="comment"></textarea>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
    </div>
   
</body>
</html>