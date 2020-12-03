<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Admin;
use DB;
use App\Country;

class adminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('adminLogin');
    }


    public function Login(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $data=Admin::all();
        $email=$request->email;
        $password=$request->password;
        $check=0;
        foreach($data as $data)
        {
            if($data->email==$email && Hash::check( $password,$data->password))
            {
                $check=1;
                break;
            }
            
        }
        if($check==1)
        {
            $request->session()->put('username',$data->name);
            $request->session()->put('email',$data->email);
            //return view('admin-profile');
            return redirect('admindashboard')->with('success','Login Successfully');
        }
        else 
            {
                return redirect('admin')->with('error','Login Failed');
            }
    }
    public function update(Request $req)
    {
        $data=Admin::all();

        $pass=$req->input('oldpassword');
        $new=$req->input('newpassword');
        $c=$req->input('cpassword');
        $user=session('email');
        // echo $user;
        // die();
        foreach($data as $val)
        {
            if($val['email']==$user && $val['password']==$pass)
            {
                if($new==$c)
                {
                    DB::update("update admins set password = $new where email = ?", [$user]);
                    return redirect('adminprofile')->with('success',"Sucsessfully updated"); 
                       
                }
                else{
                    return redirect('adminprofile')->with('error',"Enter coorect Conf-password");
                }
            }
            else
            {
                return redirect('adminprofile')->with('error',"Enter correct oldpassword");
            }
        }
    }

    public function store(Request $r){
// 
           
        $this->validate($r,
        [
           
            'email'=>'required|unique:admins|email',
            'password'=>'required|confirmed|min:4',
           
        ]);
        $t= new Admin();
        $t->name=$r->uname;
        $t->email=$r->email;
        $t->password= Hash::make($r->password);
        $t->save();
        return redirect('admin')->with('success','registered successfully');
    }
    public function reset(Request $req)
    {
        $data=Admin::all();

    }
    public function logout(Request $req)
    {
        if(session()->has('username'))
        {
            session()->forget('username');
            session()->forget('email');
        }
        return view('admin.adminLogin');
    }
    
        
}
   

