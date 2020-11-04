<?php

namespace App\Http\Controllers;

use App\Models\SuperUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

use function Ramsey\Uuid\v1;

class SuperUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register-Superuser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session()->has('king')){
            return redirect('SuperUserDasboard');
        }
        else{
            return view('SuperUserLogin');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'Username'=>'required',
                'email'=>'required',
                'password' => 'min:2|required_with:password2|same:password2',
                'password2' => 'min:2'
            ]
            );
            
           $name =  $request->Username;
             $email =   $request->email;
           $pasword =  $request->password;
           $password2 =  $request->password2;
           $hashedPass = Hash::make($password2);

           $superuserdb = new SuperUser();
           $superuserdb->name =  $name;
           $superuserdb->email =$email;
           $superuserdb->password = $hashedPass;
            $superuserdb->save();

             return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */

     public function check(Request $request){
        if($request->isMethod('post')){
            $email =  $request->email ;
            $pass = $request->psw ;
            $fun = DB::table('super_users')->where('email','=',$email)->first();
           if($fun){
            if(Hash::check($pass,$fun->password)){
                $request->session()->put('king', 'adssad');
                return redirect('SuperUserDasboard');
            }
            else{
                return redirect()->back()->withErrors(['Wrong Email OR Password']);
            }
           }
            else{
                return redirect()->back()->withErrors(['Wrong Email']);
            }
        }

        else{
            if($request->session()->get('king')){
                return redirect('SuperUserDasboard');
             }
             else{
                return view('SuperUserLogin');
             }
        }
     }
     public function logout(){
        session()->forget('king');
        return redirect('SuperUser-Login');
    }

    public function dashboard()
    {
        $admindb = DB::table('admins')->get();
        $userdb = DB::table('users')->get();
     //   dd($admindb);
        return view('SuperUserDasboard',['admin' => $admindb,'user'=>$userdb]);
        
       /*  return view('SuperUserDasboard'); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function permissionAdmin(Request $request,$id)
    {   
        DB::table('admins')->where('id','=',$id)->update(['access'=>'1']);
        return redirect()->back();
    }

    public function permissionUser(Request $request,$id)
    {   
        DB::table('users')->where('id','=',$id)->update(['access'=>'1']);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuperUser $superUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperUser $superUser)
    {
        //
    }
}
