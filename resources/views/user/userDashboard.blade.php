<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <title>userDashboard</title>
</head>
<body>
    <div class="container-fluid">
        <a method="post" href="{{ asset('/userLogout') }}"><button type="button" class="btn btn-danger">Logout</button> </a>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="posts">
                        

                        @foreach ($admindata as $admindatas) 
                        <div class="indiv" style="border: solid ;padding-top:2rem;text-align: center; margin-top: 3rem; ">
                        <div class="postheading">
                            <h2>
                                {{$admindatas->postHeading}}
                            </h2>
                        </div>
                        <div class="postdesc">
                            <p>  {{$admindatas->postDesc}}</p>
                        </div>
                    </div>
                        @endforeach 
                                                
                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
</body>
</html>