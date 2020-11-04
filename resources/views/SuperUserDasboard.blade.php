<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <title>SuperUserDasboard</title>
</head>
<body>
    <div class="container">
      <a method="post" href="{{ asset('superLogout') }}"><button type="button" class="btn btn-danger">Logout</button> </a>
        <div class="row">
            <div class="col-sm-12">
                <h3>Admin Data</h3>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Series</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Permission</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($admin as $admins) 
                      <tr>
                        <th scope="row">{{ $admins->id }}</th>
                        <td>{{ $admins->name }}</td>
                        <td>{{ $admins->email }}</td>
                        @if($admins->access==null)
                       
                        <td>Not Allowed</td></td>
                        @endif
                        
                        @if($admins->access!=null)
                       
                        <td>Allowed</td></td>

                        @endif
                        
                        @if($admins->access==null)
                       
                      <td> <a method="post" href="{{ asset('/SuperUserDasboard/permissionAdmin/'.$admins->id ) }}"><button  name="id" value="{{$admins->id}}" type="button" class="btn btn-danger">Give Here to give Permission</button> </a> </td>
                        @endif
                      {{--   @if($admins->access!=null)
                        
                        <td><button type="button" class="btn btn-success">Click to Alloowed</button></td>
                        @endif            --}}             
                      </tr>
                      
                      @endforeach 
                    </tbody>
                  </table>
            </div>
        </div>
      
      <div class="row">
          <div class="col-sm-12">
              <h3>User Data</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Series</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Status</th>
                    <th scope="col">Permission</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $users) 
                  <tr>
                    <th scope="row">{{ $users->id }}</th>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    @if($users->access==null)
                       
                    <td>Not Allowed</td></td>
                    @endif
                    
                    @if($users->access!=null)
                   
                    <td>Allowed</td></td>

                    @endif
                    

                    @if($users->access==null)
                    <td> <a method="post" href="{{ asset('/SuperUserDasboard/permissionUser/'.$users->id ) }}"><button  name="id" value="{{$admins->id}}" type="button" class="btn btn-danger">Give Here to give Permission</button> </a> </td>
                    @endif          
                  </tr>
                  
                  @endforeach 
                
                </tbody>
              </table>
          </div>
      </div>
              
    </div>
</body>
</html>