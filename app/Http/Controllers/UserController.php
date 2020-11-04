<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(session()->has('user')){
            return redirect('/user-dashboard');
        }   
        else{
            return view('user/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function logout(){
        session()->forget('user');
        return redirect('user-login');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'username'=>'required',
                'email'=>'required',
                'password' => 'min:4|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:4'
            ]
            );

            $name =  $request->username;
            $email =   $request->email;
          $pasword =  $request->password;
          $password2 =  $request->confirm_password;

          $hashedPass = Hash::make($password2);

          $admindb = new User();
          $admindb->name =  $name;
          $admindb->email =$email;
          $admindb->password = $hashedPass;
           $admindb->save();
           return redirect()->back()->with('msg','SuccesFully Register Now You Can Login If Super User Allow');
    }


    public function check(Request $request){
        if($request->isMethod('post')){
            $email =  $request->email;
            $pass = $request->password ;
            $fun = DB::table('users')->where('email','=',$email)->first();
            if($fun){
              if(Hash::check($pass,$fun->password)){
                  if($fun->access==null || $fun->access==0){
                      return redirect()->back()->with('msg','You Dont Have access to Login By SuperUSer');
                  }
                  else{
                      $request->session()->put('user', 'xscdfvgfaddaxcfdfhxx');
                   return redirect('user-dashboard');
                  }
                
            }
            else{
                return redirect()->back()->with('msg','Wrong Password');
            }
            }
            else{
                return redirect()->back()->with('msg','Wrong Email');
            }
            
        }
        else{
            if($request->session()->get('user')){
                return redirect('user-dashboard');
             }
             else{
                return view('user/login');
             }
        }

    }

    public function dashboard(Request $request){
        $admindata = DB::table('admin_posts')->get();
        return view('user/userDashboard',['admindata'=>$admindata]);
      }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
