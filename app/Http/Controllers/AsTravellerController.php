<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AsTravellerController extends Controller
{
    public function index()
    {
        $country=DB::table('countries')->get();

        $history=DB::table('traveller_masterTable')
        ->where('traveller_masterTable.user_id','=',session('user_id'))
        ->orderBy('traveller_masterTable.id', 'desc')
        ->get();

        $request=DB::table('registrations_masterTable')
        ->join('request_masterTable', 'registrations_masterTable.id', '=', 'request_masterTable.r_id')
        ->where(['request_masterTable.traveller_id'=>session('user_id'),'request_masterTable.status'=>0,'request_masterTable.price'=>0])
        ->select('registrations_masterTable.id','registrations_masterTable.fname','registrations_masterTable.lname','registrations_masterTable.avatar','registrations_masterTable.country','registrations_masterTable.state','registrations_masterTable.city','request_masterTable.id','request_masterTable.r_id','request_masterTable.traveller_id','request_masterTable.item_name','request_masterTable.discription','request_masterTable.category')
        ->get();
        


        return view('AsTraveller')->with(['country'=>$country,'Country'=>$country,'request'=>$request,'history'=>$history]);
    }
    public function bidprice(Request $request){
        
    return view('bid')->with(['data'=>$request]);
  
    }
    public function cancel(Request $request){
      
        DB::table('request_masterTable')
        ->where('id', $request->id)
        ->update(['status' => 2]);
        return redirect('/astraveller')->with('error','You have cancelled Request');
    }
    public function store(Request $request){
       $this->validate($request,[
            'price'=>'required|numeric',
        ]);
        DB::table('request_masterTable')
        ->where('id', $request->id)
        ->update(['price' => $request->price]);
        return redirect('/astraveller')->with('success','Your price has been sent to requester');
       
    }
}
