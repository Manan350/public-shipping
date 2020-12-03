<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Deliverie;

class hostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Indexs(Request $r){
        $j_id=$r->input('journey_id');
        $t_id= $r->input('traveller_id');
        $r_id=session()->get('user_id');

        $check=DB::table('request_masterTable')->select('journey_id')->where('request_masterTable.traveller_id','=',$t_id)->where('request_masterTable.r_id','=',$r_id)->get();
        $c=0;
 
        foreach($check as $v)
        {
            if($v->journey_id == $j_id){
                $c=1;
            break;
            }
        }
        if($c == 1){
            return redirect('traveller')->with('error','U have already requested to this traveller wait for response');
        }
        $data=DB::table('registrations_masterTable')->join('traveller_masterTable', 'registrations_masterTable.id', '=', 'traveller_masterTable.user_id')->select('registrations_masterTable.avatar','registrations_masterTable.fname','registrations_masterTable.lname','traveller_masterTable.id','traveller_masterTable.user_id','traveller_masterTable.From','traveller_masterTable.To','traveller_masterTable.arrival','traveller_masterTable.departure','traveller_masterTable.ticket')->where('traveller_masterTable.id','=',$j_id)->get();
        
        return view('host')->with('data',$data);

    }
    public function index(Request $request)
    {   
        return 'hii';//$request->input('traveller_id');

        $id=session()->get('user_id');
        $check=DB::table('request_masterTable')->where('request_masterTable.traveller_id','!=',1)->get();
        return  $check;

        if($check == Null){
            $data=DB::table('registrations_masterTable')->join('traveller_masterTable', 'registrations_masterTable.id', '=', 'traveller_masterTable.user_id')->where('traveller_masterTable.id','=',$id)->get();
        //$data = DB::table('traveller_masterTable')->where('id',$id)->get();
        return view('host')->with('data',$data);
        }
        return redirect('traveller');
        
    }
  /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function productDetail(Request $r){
    
        $d=DB::table('deliverie_masterTable')->where('order_Id','=',$r->order_id)->get();
        $req_id=0;
        foreach($d as $data){
            $req_id=$data->req_id;
        }
        if($req_id !=0)
        {
        $rd=DB::table('request_masterTable')->where('id','=',$req_id)->get();
        }
        $traveller_id=0;
        foreach($rd as $data){
            $traveller_id=$data->traveller_id;
        }
        if($traveller_id !=0)
        {
        $td=DB::table('registrations_masterTable')->where('id','=',$traveller_id)->get();
        }
        
        return view('productDetail')->with(['data'=>$d,'rd'=>$rd,'td'=>$td]);
    }
}
