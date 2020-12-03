<?php

namespace App\Http\Controllers;
use DB;
use Mail;
use App\Mail\Acceptrequest;
use App\registration;
use App\Mail\querymail;
use App\Mail\canclemail;
use App\query;
use Illuminate\Http\Request;

class admindashboardController extends Controller
{
    function index()
    {
        return view('admin/SearchUsers');
    }
    function index1()
    {
        return view('admin/SearchByOrderid');
    }

    public function getdata(){
        $data=DB::table('registrations_masterTable')->where('status','=',0)->get();
        return json_encode($data);
      
    }

    public function finddata(Request $req){

        $id=$req->id;
        $data=DB::table('registrations_masterTable')->where('id','=',$id)->get();
        return view("admin/User")->with('data',$data);
    }
    
    public function Accept(Request $req){
        $id=$req->id;
        $email=$req->email;
        
        DB::table('registrations_masterTable')->where('id', $id)->update(array('status' => 1));

        $data = array(
            'fname'      =>  $req->fname,
            'lname'      =>  $req->lname,
           
        );
        Mail::to($email)->send(new Acceptrequest($data));

        return view("admin/dashboard");
    }

    public function cancelrequest(Request $req){
        $id=$req->id;
        DB::table('registrations_masterTable')->where('id', $id)->update(array('status' => 2));
        $data=array('fname'=>$req->fname,
                    'lname'=>$req->lname);
        Mail::to($req->email)->send(new canclemail($data));
        return view("admin/dashboard");
    }

    public function storequery(Request $request){
        $this->validate($request,
        [
            'message'=>'required',
            'subject'=>'required',
            'name'=>'required|alpha',
            'email'=>'required|email',
        ]);
        $store= new query;
        $store->name=$request->name;
        $store->email=$request->email;
        $store->subject=$request->subject;
        $store->message=$request->message;
        $store->status=0;
        $store->save();
        return back()->with('success','Your query have been submitted!!');
    }


    public function showquery(){
        $query=DB::table('queries')->where('status',0)->get();
        return view('admin.adminquery')->with('query',$query);
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
            $data = DB::table('registrations_masterTable')
                ->where('fname', 'like', '%'.$query.'%')
                ->orWhere('lname', 'like', '%'.$query.'%')
                ->orWhere('mobile', 'like', '%'.$query.'%')
                ->orWhere('zip', 'like', '%'.$query.'%')
                ->orWhere('country', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orderBy('id', 'desc')
                ->get();

            }
            else
            {
            $data = DB::table('registrations_masterTable')
                ->orderBy('id', 'desc')
                ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
            foreach($data as $row)
            {
                $output .= '
                <tr>
                <td>'.$row->fname.'</td>
                <td>'.$row->lname.'</td>
                <td>'.$row->mobile.'</td>
                <td>'.$row->country.'</td>
                <td>'.$row->city.'</td>
                <td>'.$row->state.'</td>
                <td>'.$row->email.'</td>
                <td><a href="user_deatails?id='.$row->id.'" class="btn btn-primary" style="font-size:20px;">View</a></td>
                </tr>
                ';
            }
            }
            else
            {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }

    function action1(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('deliverie_masterTable')
                ->Where('req_id', 'like', '%'.$query.'%')
                ->OrWhere('order_Id', 'like', '%'.$query.'%')
                ->orderBy('id', 'desc')
                ->get();

            }
            else
            {
            $data = DB::table('deliverie_masterTable')
                ->orderBy('id', 'desc')
                ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
            foreach($data as $row)
            {
                $output .= '
                <tr>
                <td>'.$row->order_Id.'</td>
                <td>'.$row->req_id.'</td>
                <td>'.$row->created_at.'</td>
                <td><a href="order_details?req_id='.$row->req_id.'" class="btn btn-primary" style="font-size:20px;">View</a></td>
                </tr>
                ';
            }
            }
            else
            {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }

    public function viewuser(Request $req){
            $id=$req->id;
            $data=DB::table('registrations_masterTable')->where('id','=',$id)->get();

            $data2=DB::table('deliverie_masterTable')
            ->join('request_masterTable', 'deliverie_masterTable.req_id', '=', 'request_masterTable.id')->where('request_masterTable.status','=',1)
            ->join('registrations_masterTable','registrations_masterTable.id','=','request_masterTable.r_id')->where('request_masterTable.r_id','=',$id)
            ->select('deliverie_masterTable.download','deliverie_masterTable.order_Id','deliverie_masterTable.delivery_status','request_masterTable.from','request_masterTable.to','request_masterTable.id','request_masterTable.category','request_masterTable.price','request_masterTable.arrival')
            ->get();
            return view('admin/UserDeatails')->with(['data'=>$data,'data2'=>$data2]);
    }

    public function vieworder(Request $req){
        $req_id=$req->req_id;

        $data=DB::table('request_masterTable')->where('id','=',$req_id)
        ->get();
        
        foreach($data as $data)
        {
            $r_id=$data->r_id;
            $traveller_id=$data->traveller_id;
        }
       
        $requester=DB::table('registrations_masterTable')->where('id','=',$r_id)->get();

        $traveller=DB::table('registrations_masterTable')->where('id','=',$traveller_id)->get();
        // print_r($data);
        // die();
        return view('admin/OrderDetails')->with(['data'=>$data,'req'=>$requester,'traveller'=>$traveller]);
}

    public function blockuser(Request $req){
        $id=$req->id;
        DB::table('registrations_masterTable')->where('id', $id)->update(array('status' => 2));
        return view('admin/UserDeatails');
    }
    
    public function sendquerymail(Request $r){
        return view('message')->with('data',$r);
    }

    public function sendemail(Request $r){
        $data=array('name'=>$r->name,
                    'email'=>$r->email,
                    'message'=>$r->message
                );
        Mail::to($r->email)->send(new querymail($data));

        return redirect('showquery')->with('success','Mail Sent Successfully');
    
    }

    public function blockunblockuser(Request $r){
        $t=registration::find($r->id);
        $t->status=$r->value;
        $t->save();

        return redirect('live_search');
    }
}
