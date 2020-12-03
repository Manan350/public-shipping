<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traveller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class travellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function hostByDate(Request $request){

        $this->validate($request,
        [
            'from'=>'required',
            'to'=>'required',
         
        ]);
            
        $from=$request->input('from');
        $to=$request->input('to');
        
        $date=$request->input('departure');
        $ip = \Request::ip();
        $data = \Location::get($ip);
        $from=$data->countryName;
        $data=DB::table('registrations_masterTable')->join('traveller_masterTable', 'registrations_masterTable.id', '=', 'traveller_masterTable.user_id')->select('registrations_masterTable.avatar','registrations_masterTable.fname','registrations_masterTable.lname','traveller_masterTable.id','traveller_masterTable.user_id','traveller_masterTable.From','traveller_masterTable.To')->where('traveller_masterTable.departure','=',$date)->where('traveller_masterTable.From','=',$from)->where('traveller_masterTable.To','=',$to)->paginate(8);
        return view('test')->with('data',$data);
    }*/
    
    public function index()
    {
        $curdate=  Carbon::now()->toDateString();
      //  $data=DB::table('registrations_masterTable')->join('traveller_masterTable', 'registrations_masterTable.id', '=', 'traveller_masterTable.user_id')->where('traveller_masterTable.arrival',$curdate)->get(); 
      $ip = \Request::ip();
      $data = \Location::get($ip);
      $from=$data->countryName;
        
    
      $exception=session()->get('user_id');
//->where('traveller_masterTable.From','=',$from)->where('traveller_masterTable.departure','> ',$curdate)->orWhere('traveller_masterTable.To','=',$from)
          $data=DB::table('registrations_masterTable')->join('traveller_masterTable', 'registrations_masterTable.id', '=', 'traveller_masterTable.user_id')->select('registrations_masterTable.avatar','registrations_masterTable.fname','registrations_masterTable.lname','traveller_masterTable.id','traveller_masterTable.user_id','traveller_masterTable.From','traveller_masterTable.To')->where('traveller_masterTable.user_id','!=',$exception)->where('traveller_masterTable.departure','>',$curdate)->paginate(2);
          $d=[];
          foreach($data as $dd){
              if($dd->user_id != $exception){
                  if($dd->From == $from || $dd->To  == $from)
                  {
                  array_push($d,$dd);
                  }
              }
          }

          if(count($d)>0)
          {
            $data=DB::table('registrations_masterTable')->join('traveller_masterTable', 'registrations_masterTable.id', '=', 'traveller_masterTable.user_id')->select('registrations_masterTable.avatar','registrations_masterTable.fname','registrations_masterTable.lname','traveller_masterTable.id','traveller_masterTable.user_id','traveller_masterTable.From','traveller_masterTable.To')->where('traveller_masterTable.user_id','!=',$exception)->where('traveller_masterTable.departure','>',$curdate)->paginate(2);
            $d=[];
          foreach($data as $dd){
              if($dd->user_id != $exception){
                if($dd->From == $from || $dd->To  == $from)
                {
                array_push($d,$dd);
                }
              }
          }   
          }
        //   echo "<pre>";
        //     print_r($data);
        //   echo "<pre>";
        //   die();
        $country=DB::table('countries')->get();
        $Country=DB::table('countries')->get();
        return view('traveller')->with(['data'=>$d,'country'=>$country,'Country'=>$Country]);
    }

    public function hostByCountry(Request $request)
    {  $curdate=  Carbon::now()->toDateString();
        $this->validate($request,
        [
            'from'=>'required',
            'to'=>'required',
         
        ]);
        $from=$request->input('from');;
        $to=$request->input('to'); 
        $exception=session()->get('user_id');
        $data=DB::table('registrations_masterTable')->join('traveller_masterTable', 'registrations_masterTable.id', '=', 'traveller_masterTable.user_id')->where('traveller_masterTable.user_id','!=',$exception)->where('traveller_masterTable.departure','>',$curdate)->select('registrations_masterTable.avatar','registrations_masterTable.fname','registrations_masterTable.lname','traveller_masterTable.id','traveller_masterTable.user_id','traveller_masterTable.From','traveller_masterTable.To')->where('traveller_masterTable.From','=',$from)->where('traveller_masterTable.To','=',$to)->get();
        $result = new Paginator($data,2,1,[]);
        $country=DB::table('countries')->get();
        $Country=DB::table('countries')->get();
        return view('traveller')->with(['data'=>$data,'country'=>$country,'Country'=>$Country]);
       
        
    }

    /**
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
        
        $request->validate([
            'from'=>'required',
            'to'=>'required',
            'arrival'=>'required',
            'departure'=>'required',
            'ticket'=>'required'
        ]);

        $image = base64_encode(file_get_contents($request->file('ticket')));
        $t=new Traveller;
        $t->user_id=session('user_id');
        $t->From=$request->from;
        $t->To=$request->to;
        $t->arrival=$request->arrival;
        $t->departure=$request->departure; 
        $t->ticket = $image;            
        $t->save();
         
        return back()->with('success','your details have been submitted and will be reviewed for showing');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::select('select * from traveller_masterTable');
        return view('traveller',['users'=>$users]);
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
}
