<?php

namespace App\Http\Controllers;
use App\registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Requester;
use App\Deliverie;
class loginController extends Controller
{

    public function Login(Request $request){
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $data=registration::all();
        $check=0;
        // $pass=$request->password;
        // echo $pass;
        // die();
        $demo=0;
        foreach($data as $data)
        {
            if($data->email==$request->email && Hash::check($request->password, $data->password) && $data->status==1)
            {
                if($data->email=="demo@demo.com")
                {
                    $demo=1;
                }
                $check=1;
                break;
            }
        }

        if($check==1)
        {
           if($demo==1)
           {
               session()->put('demo',1);
           }
           else{
               session()->put('demo',0);
           }
           session()->put('name',$data->fname);
           session()->put('email',$request->email);
           session()->put('user_id',$data->id);
           $date=Carbon::now();
           $date=$date->toDateString();
       
           $t=Deliverie::all();
   
           foreach($t as $t1){
               $d=$t1->created_at;
               $d= $d->addDays(1);
               $d=$d->toDateString();
               
               if($date > $d){
                   $tt=Deliverie::find($t1->id);
                   $tt->changable=1;
                   $tt->save();
               }
           }
   
            return redirect('/traveller')->with('success','Login success');
        }
        else{
            return back()->with('error','Login failed');
        }
    }
    public function Logout(){
       session()->forget('email');
       session()->forget('user_id');
       session()->forget('name');
       session()->put('demo',0);
       session()->put('name',null); 
        return redirect('/')->with('success','logout success');

    }
}
