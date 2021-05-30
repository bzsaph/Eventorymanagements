<?php

namespace App\Http\Controllers;

use App\Depo;
use App\Orderciment;
use App\Sellesdata;
use App\User;
use Carbon\Carbon;
use \PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard(){
        $user = Auth::user()->user_type;
        if ($user =='Superadmin'){
            return view('admin.dashboard');
        }
        elseif($user =='admin'){
            return view('admin.dashboard');
        } elseif($user =='retailer'){
            return view('admin.dashboard');
        }else{
            return redirect('home');
        }
    }
    public function Orderciment(){
        if (Auth::user()->user_type=="admin"||Auth::user()->user_type=="Superadmin") {
            $stocker=Depo::all();
            return view('admin.Orderciment',compact('stocker'));
        }else {
            return redirect('/dashboard');
        }

            }
            public function Edituser(){
                $userinthesystem=User::all();
                $user = Auth::user()->user_type;
                if ($user =='Superadmin'){
                    return view('admin.Edituser',compact('userinthesystem'));
                }
                elseif($user =='admin'){
                    return view('admin.Edituser',compact('userinthesystem'));
                }else{
                    return redirect('/dashboard');
                }

            }
    public function Edituserbyid(Request $request,$id){
        $user = Auth::user()->user_type;
        $userid=Auth::user()->id;
        $stocker=Auth::user()->stocker;
        if ($userid !=$id) {

            if ($user =='Superadmin'){
                $users = User::where('id',$id )->get();
                $stockerf = Depo::where('id',$stocker )->get();

                $stocker = Depo::all();
                return view('admin.Edituserbyid',compact('users','stocker','stockerf'));
            }
            elseif($user =='admin'){
                $users = User::where('id',$id )->get();
                $stockerf = Depo::where('id',$stocker )->get();

                $stocker = Depo::all();
                return view('admin.Edituserbyid',compact('users','stocker','stockerf'));
            }else{
                Session::flash('message', "User Updated Successfull ");
                return redirect('/dashboard');
            }
        }else{
            Session::flash('message', "Please you can't edit you self");
            return redirect('/Edituser');
        }


    }
    public function ChangeStutas(Request $request){
        $id=$request->get('id');
        $privilage=$request->get('privilage');
        $stocker=$request->get('stocker');
        $updat=DB::table('users')->where('id', $id) ->update(['user_type' => $privilage,'stocker' => $stocker]);
        Session::flash('message', "User Updated Successfull ");
        return redirect('/Edituser');

    }
    public function Ordercimentsubmit(Request $request){
         $orderciment =new Orderciment();
                $nameofuser=Auth::user()->name;//this will help use just to be displayed on the schreen
                $orderciment->Depo_id=$stocker=$request->get('Depoid');
                        $stockerf = Depo::where('id',$stocker )->get();
                        foreach ($stockerf as $key => $value) {
                            $stockername=$value->name;
                        }
                $orderciment->sacker= $userid=Auth::user()->id;//uwabyohereje kuri depo bivuye kurangurwa
                $sacker=$request->get('sacker');//imifuka yohereje
                $orderciment->sacker= $sacker;
                $Untprice=$request->get('Untprice');//ikiguzi cy umufuka umwe
                $orderciment->pricepersack=$Untprice;
                $orderciment->accepted="0";//kubera bitarakirwa ni zero
                $total=$sacker*$Untprice;
                $date=date("Y/m/d");
                $orderciment->totalprice=$total;
                $orderciment->save();

                $data = ['title' => "Invoive",'date'=>$date,'nameofuser'=>$nameofuser,'Untprice'=>$Untprice,'sacker'=>"$sacker",'total'=>"$total",'stockername'=>$stockername];
                $pdf = PDF::loadView('myPDF', $data);
                Session::flash('message', 'succes full');
        return $pdf->stream("report$date.pdf");
      
    }
    public function Newstocker(){
        $depo=Depo::all();

        return view('admin.newstocker',compact('depo'));
    }

    public function newStockercrete(Request $request){
        $depo =new Depo();
        $depo->name=$request->deponame;
        $depo->created_by=Auth::user()->id;
        $depo->save();
        Session::flash('message', "Stocker created successfull ");
        return redirect()->back();

    }
    public function deletedepo($id){
        $depo = Depo::find($id);
        $updat=DB::table('depos')->where('id', $id) ->update(['deleted'=>"1",'deleted_by'=> Auth::user()->id]);
        Session::flash('message', "Stocker created successfull ");
        return redirect()->back();
    }
    public function Checknewstocker(){
        if (Auth::user()->user_type =="admin" ||Auth::user()->user_type =="admin") {
            $ordercemtent=Orderciment::all();
            return view('admin.stockerorderd',compact('userinthesystem'));
        }
        else {
            $ordercemtent=Orderciment::all();
            return view('admin.stockerorderd',compact('userinthesystem'));
        }

    }
    public function ACCEPTCIMENT(){
        $orderofcimnet=Orderciment::all();
      return view('admin.Acceptciment',compact('orderofcimnet'));
    }

    public function acceptcimentbyid($id){
        $orderlist=DB::table('orderciments')->where('id', $id) ->update(['accepted'=>"1",'accepted_by'=> Auth::user()->id]);

        $orderlist =Orderciment::findOrFail($id);
        $user = DB::table('sellesdatas')->where('depo_id',$orderlist->Depo_id)->orderBy('id', 'DESC')->first();

        if($user ==null){
            $acceptaorder=new Sellesdata();
            $acceptaorder->depo_id=$orderlist->Depo_id;
            $acceptaorder->Totalnumberofsuck=$orderlist->sacker;
            $acceptaorder->added_by=Auth::user()->id;
            $acceptaorder->save();
            Session::flash('message', "This is first stocker you are receiving");
            return redirect()->back();
        }else {
            $acceptaorder=new Sellesdata();
            $acceptaorder->depo_id=$orderlist->Depo_id;
            $acceptaorder->Totalnumberofsuck=$orderlist->sacker+$user->Totalnumberofsuck;
            $acceptaorder->added_by=Auth::user()->id;
            $acceptaorder->save();
            Session::flash('message', "new ciment accepted ");
            return redirect()->back();

        }

    }
    public function soldeout(){
        $remainingstocker = DB::table('sellesdatas')->where('depo_id',Auth::user()->stocker)->orderBy('id', 'DESC')->first();
    return view('admin.soldeout' ,compact('remainingstocker'));
    }
    public function sellcimenttocustomer(Request $request){
        // $carbon = new Carbon();
        // $yesterday = Carbon::yesterday();
        // $startDate = Carbon::now()->endOfMonth();
        // $lastSunday = $startDate()->endOfWeek();
        // dd($yesterday);
        $selluser = new Sellesdata();

        $buynumberofzucker=$request->get('numberofzucker');
        $remainingstocker = DB::table('sellesdatas')->where('depo_id',Auth::user()->stocker)->orderBy('id', 'DESC')->first();
        if ($remainingstocker->Totalnumberofsuck < $buynumberofzucker) {
            Session::flash('message', "Hello you  you don't have anough stocker ");
            return redirect()->back();
        }else{
            $selluser->Company=$request->get('name');
            $selluser->Whobuyphone=$request->get('Phone');
            $selluser->Numberofsuckbuy=$request->get('numberofzucker');
            $selluser->Totalnumberofsuck=$remainingstocker->Totalnumberofsuck-$buynumberofzucker;
            $selluser->depo_id=Auth::user()->stocker;
            $selluser->solled_by=Auth::user()->id;
            $selluser->save();
            Session::flash('message', "hello ciment have been sold successfull");
            return redirect()->back();
        }

    }
    public function Cimententsold(){
        $remainingstocker = DB::table('sellesdatas')->where('depo_id',Auth::user()->stocker)->orderBy('id', 'DESC')->get();
        $remainin =array();
        $usersdata=array();
        foreach ( $remainingstocker as $key => $value) {
            $remainin[] = DB::table('depos')->where('id',$value->depo_id)->orderBy('id', 'DESC')->get();
            $usersdata[] = DB::table('users')->where('id',$value->solled_by)->orderBy('id', 'DESC')->get();

        }
        $name=array();
        foreach ($remainin as $key => $valued) {
            foreach ($valued as $key => $value) {
               $name[]=$value->name;
            }

        }
        $username=array();
        $userphone=array();
        foreach ($usersdata as $key => $valuef) {
            foreach ($valuef as $key => $value) {
                $username[]= $value->name;
                 $userphone[]= $value->phone;
             }
        }

        return view('admin.solddata',compact('remainingstocker','name','username','userphone'));

    }
}
