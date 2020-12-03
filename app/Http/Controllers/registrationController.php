<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\registration;
use DB;

use Mail;
use App\Mail\registrationmail;
class registrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $country=DB::table('countries')->get();
       $code=DB::table('countries')->select('sortname','phonecode')->get();
        return view('registration')->with(['data'=>$country,'code'=>$code]);
    }
    public function getstate($id){

        // Fetch Employees by Departmenti
      $state=DB::table('states')->where('country_id',$id)->get();
        return json_encode($state);
      }

      public function getcity($id){

        // Fetch Employees by Departmenti
      $city=DB::table('cities')->where('state_id',$id)->get();
        return json_encode($city);
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
        // return "hy himu";
        // die();

        // $this->validate($request,
        // [
        //     'fname'=>'required|max:50|alpha',
        //     'lname'=>'required|max:50|alpha',
        //     'email'=>'required|unique:registrations_masterTable|email',
        //     'password'=>'required|confirmed|alpha_dash|min:8',
        //     'dob'=>'required|date',
        //     'code'=>'required|numeric|digits:2',
        //     'mobile'=>'required|unique:registrations_masterTable|numeric|digits:10',
        //     'street'=>'required|max:255',
        //     'zip'=>'required|numeric|digits:6',
        //     'city'=>'required',
        //     'state'=>'required',
        //     'country'=>'required',
        //     'avatar'=>'required',
        //     'gov'=>'required',
        // ]);
            
            $image = base64_encode(file_get_contents($request->file('avatar')));
         
            $gov_id = base64_encode(file_get_contents($request->file('gov')));
            $register= new registration;
            $register->avatar=$image;
            $register->fname=$request->fname;
            $register->lname=$request->lname;
            $register->email=$request->email;
            $register->password= Hash::make($request->password);
            $register->code=$request->code;
            $register->mobile=$request->mobile;
            $register->dob=$request->dob;

            $country=DB::table('countries')->where('id',$request->country)->select('name')->get();
            foreach($country as $country){
                $Country=$country->name;
            }
            
            $state=DB::table('states')->where('id',$request->state)->select('name')->get();
            foreach($state as $state){
                $State=$state->name;
            }
            
            $city=DB::table('cities')->where('id',$request->city)->select('name')->get();
            foreach($city as $city){
                $City=$city->name;
            }

            $register->country=$Country;
            $register->state=$State;
            $register->city=$City;
            $register->zip=$request->zip;
            $register->local_area=$request->street;
            $register->status=0;
            $register->GOV_id=$gov_id;
            $register->save();

            $data = array(
                'fname'      =>  $request->fname,
                'lname'      =>  $request->lname,
               
            );
            Mail::to($request->email)->send(new registrationmail($data));
            

        return redirect('/')->with('success','registration Success! You will Recieve Mail for more information');
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
}
