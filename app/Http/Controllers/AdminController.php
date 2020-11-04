<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session()->has('admin')){
            return redirect('/admin-dashboard');
        }   
        else{
            return view('admin/login');
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

          $admindb = new Admin();
          $admindb->name =  $name;
          $admindb->email =$email;
          $admindb->password = $hashedPass;
           $admindb->save();
           return redirect()->back()->with('msg','SuccesFully Register Now You Can Login If Super User Allow');
    }

    public function check(Request $request){
        if($request->isMethod('post')){
            $email =  $request->email ;
            $pass = $request->password ;
            $fun = DB::table('admins')->where('email','=',$email)->first();
            $id = $fun->id;
            if($fun){
                if(Hash::check($pass,$fun->password)){
                    if($fun->access==null || $fun->access==0){
                        return redirect()->back()->with('msg','You Dont Have access to Login By SuperUSer');
                    }
                    $request->session()->put('admin', $id);
                    return redirect('/admin-dashboard');
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
            if($request->session()->get('admin')){
                return redirect('/admin-dashboard');
             }
             else{
                return view('admin/login');
             }
        }
    }
   public function logout(){
       session()->forget('admin');
       return redirect('admin-login');
   }
    public function dashboard(Request $request){
      return view('admin/adminDashboard');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {
        $id = session()->get('admin');
       $post = $request->post;
       $desc = $request->desc;
       $adminpost = new AdminPost();
       $adminpost->adminid = $id ;
       $adminpost->postHeading = $post;
       $adminpost->postDesc = $desc;
       $adminpost->save();
       return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
