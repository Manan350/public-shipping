<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Deliverie;
use App\Requester;
use PDF;
use Mail;
use App\otp;
use Carbon;
use App\Mail\buyerordermail;
use App\Mail\travellerordermail;
use App\Mail\sendotp;

class AsRequesterController extends Controller
{
    public function index()
    {
        $id=session('user_id');

        $data=DB::table('registrations_masterTable')
        ->join('request_masterTable', 'registrations_masterTable.id', '=', 'request_masterTable.traveller_id')->where(['request_masterTable.r_id'=>session('user_id'),'request_masterTable.status'=>0,'request_masterTable.status'=>0])
        ->where('request_masterTable.price','!=',0)
        ->select('request_masterTable.id','registrations_masterTable.fname','registrations_masterTable.lname','registrations_masterTable.avatar','registrations_masterTable.country','request_masterTable.r_id','request_masterTable.arrival','request_masterTable.traveller_id','request_masterTable.item_name','request_masterTable.discription','request_masterTable.category','request_masterTable.price')
        ->get();

        $data2=DB::table('deliverie_masterTable')
        ->join('request_masterTable', 'deliverie_masterTable.req_id', '=', 'request_masterTable.id')
        ->join('registrations_masterTable','registrations_masterTable.id','=','request_masterTable.traveller_id')->where('request_masterTable.r_id','=',$id)
        ->select('registrations_masterTable.fname','registrations_masterTable.lname','deliverie_masterTable.download','deliverie_masterTable.order_Id','deliverie_masterTable.delivery_status','request_masterTable.from','request_masterTable.to','request_masterTable.id','request_masterTable.category','deliverie_masterTable.margin_price','request_masterTable.arrival')
        ->get();

        return view('AsRequester')->with(['data2'=>$data2,'data'=>$data]);
    }
    public function cancle(Request $r)
    {
        $tuple=Deliverie::where('order_Id',$r->order_id)->first();
        $id=$tuple->id;
        
        if( $tuple->changable == 0){
            $d=Deliverie::find($id)->delete();
            $t=Requester::find($tuple->req_id);
            $t->status=2;
            $t->save();
            return redirect('asrequester')->with(['success'=>'Successfully Cancled','tup'=>$tuple]);
        }
        
        return redirect('asrequester')->with(['error'=>'Failed to  Cancled','tup'=>$tuple]);
    }
    public function downloadPDF(Request $id) {       
        $mytime = Carbon\Carbon::now();
        $cust=DB::table('deliverie_masterTable');
        $traveller=Deliverie::where('order_Id',$id->order_id)
        ->join('request_masterTable', 'deliverie_masterTable.req_id', '=', 'request_masterTable.id')
        ->join('registrations_masterTable','registrations_masterTable.id','=','request_masterTable.traveller_id')
        ->select('registrations_masterTable.fname','registrations_masterTable.lname','deliverie_masterTable.order_Id','deliverie_masterTable.delivery_status','request_masterTable.from','request_masterTable.to','request_masterTable.id','request_masterTable.category','deliverie_masterTable.margin_price','request_masterTable.arrival')
        ->first();
        $user=Deliverie::where('order_Id',$id->order_id)
        ->join('request_masterTable', 'deliverie_masterTable.req_id', '=', 'request_masterTable.id')
        ->join('registrations_masterTable','registrations_masterTable.id','=','request_masterTable.r_id')
        ->select('registrations_masterTable.fname','registrations_masterTable.lname')
        ->first();
       
        $pdf = PDF::loadView('pdf',compact('traveller','user'));

        DB::table('deliverie_masterTable')
        ->where('order_Id',$id->order_id)  // find your user by their email
        ->update(array('download' => 1));
        
        return $pdf->download('Reciept.pdf');
    }
    public function store(Request $request)
    {
        $n=0;

        do{
 
            $n=substr(Str::random(),0,10);
        }while(DB::table('deliverie_masterTable')->where('order_Id',$n)->exists());
    
        $price=$request->price+(($request->price*5)/100);
        $t= new Deliverie; 
        $t->req_id=$request->req_id;
        $t->delivery_status=0;
        $t->traveller_arrival_date=$request->arrival;
        $t->panelty=0;
        $t->order_Id=$n;
        $t->margin_price=$price;
        $t->changable=0;
        $t->download=0;
        $t->save();

        $tt=Requester::find($request->req_id);
        $tt->status=1;
        $tt->save();    
        $data=DB::table('request_masterTable')->select('r_id','traveller_id')->where('id',$request->req_id)->first();

        $travellerdata=DB::table('registrations_masterTable')->where('id',$data->traveller_id)->first();

        $buyerdata=DB::table('registrations_masterTable')->where('id',$data->r_id)->first();
        
        $buyer= array(
            'fname'      =>  $buyerdata->fname,
            'lname'      =>  $buyerdata->lname,
            'travellerfname'      =>  $travellerdata->fname,
            'travellerlname'      =>  $travellerdata->lname,
           'orderid' =>$n,
           
     );
        Mail::to($buyerdata->email)->send(new buyerordermail($buyer));

         $traveller= array(
            'fname'      =>  $travellerdata->fname,
          'lname'      =>  $travellerdata->lname,
             'orderid' =>$n,
           
        );
     Mail::to($travellerdata->email)->send(new travellerordermail($traveller));
       
        return redirect('asrequester')->with('success','Successfully Accepted ');
    }
    public function cancel(Request $r){
        $d=Deliverie::where('req_id','=',$r->req_id);
        $d->delete();
        $tt=Requester::where('id','=',$r->req_id);
        $tt->delete();
        return redirect('asrequester')->with('success','Successfully Cancled ');
    }
    public function requeststore(Request $request) {  
           
        /*dd($request);
        die();*/
       /* $this->validate($request,
        [
            'category'=>'required',
            'item_name'=>'required',
            'discription'=>'required',
        ]);*/
        
        $data= new Requester;
        $data->r_id=session('user_id');
        $data->journey_id=$request->j_id;
        $data->traveller_id=$request->t_id;
        $data->category=$request->category;
        $data->item_name=$request->item_name;
        $data->discription=$request->discription;
        $data->status=0;
        $data->price=0;
        $data->arrival=$request->arrival;
        $data->from=$request->from;
        $data->to=$request->to;
        $data->save();

        
        return redirect('/traveller')->with('success','Request has been send to traveller');
        
    }

    public function generateOTP(Request $r){
        $t= DB::table('otps')->where('order_Id',$r->order_Id)->exists();
        $o=0;
        do{

            $o=substr(Str::random(),0,6);
        }while(DB::table('otps')->where('otp',$o)->exists());
        if($t == null){
            $tt=new otp();
            $tt->order_Id=$r->order_Id;
            $tt->otp=$o;
            $tt->save(); 
        }else{
            $t=otp::where('order_Id','=',$r->order_Id)->first();
            $t->otp=$o;
            $t->save();
        }

        $data=array('order_Id'=>$r->order_Id,
        'otp'=>$o);

        Mail::to($r->email)->send(new sendotp($data));
        //return redirect()->route('details');;
        return Redirect::back()->with('success','Otp successfully Generated');
      // return redirect('details')->with('success','otp generated successfuly');
    }

    public function matchOTP(Request $r){
        
        $tt=otp::where('order_Id','=',$r->order_Id)->first();
        $check=1;
        if($tt != null)
         { 
            
        if($tt->otp == $r->otp){
            $t=Deliverie::where('order_Id','=',$r->order_Id)->first();
            $t->delivery_status=1;
            $t->save();
            $check=0;
        }
        }else{
            return Redirect::back()->with('error','Please generete otp first'); 
        }
        if($check == 0 )
        {
            return Redirect::back()->with('success','successfully confirmed');
        }
        return Redirect::back()->with('error','Must Provide a valid Otp');
    }
    
}
