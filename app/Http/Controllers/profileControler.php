<?php

namespace App\Http\Controllers;
use App\registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Requester;
use App\Deliverie;
class profileControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r=0;
        $id=session('user_id');
        $data = DB::table('registrations_masterTable')->where('id',$id)->first();

      
        
        return view('profile')->with(['data'=>$data]);     
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
    }
    public function edits(Request $r){
        $data = registration::find($r->id);
        return view('editProfile')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $data=registration::find($id);
        
        if($request->hasFile('avatar'))
        {
            $data->avatar=base64_encode(file_get_contents($request->file('avatar')));
        }
        $data->local_area=$request->street;
        $data->save();
        return redirect('profile')->with('success','Successfully Updated');
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
