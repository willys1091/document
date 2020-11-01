<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\document;
use App\Models\approval;

class ApprovalController extends Controller{
    use \App\Traits\general;

    public function index($param){
        $par = explode('/',base64_decode($param));
        $cek = approval::where([['id','=',$par[2]],['email','=',$par[3]],['status_id','=','2']])->count();
        if($cek=='1'){
            $app = approval::findorfail($par[2]);
            $app->status_id = $par[0];
            $app->audit_date = date("Y-m-d H:i:s");
            $app->save();

            $total = approval::where([['document_id','=',$par[1]],['type','=','To']])->count();
            $approve =  approval::where([['document_id','=',$par[1]],['type','=','To'],['status_id','=','3']])->count();
            $reject =  approval::where([['document_id','=',$par[1]],['type','=','To'],['status_id','=','4']])->count();
            $revision =  approval::where([['document_id','=',$par[1]],['type','=','To'],['status_id','=','5']])->count();

            if($total==$approve){
                $doc = document::findorfail($par[1]);
                $doc->status_id = '3';
                $doc->audit_date = date("Y-m-d H:i:s");
                $doc->save();

                $email = approval::where([['document_id','=',$par[1]]])->get();

                $subject = document::where([['id','=',$par[1]]])->value('title');
                $message = document::where([['id','=',$par[1]]])->value('message');
                $par['btn'] = '';
                foreach($email as $e){
                    $this->SendEmail2($e['email'],$subject,htmlspecialchars_decode($message),$par);
                }
            }else{
                $doc = document::findorfail($par[1]);

                if($reject>0){
                    $doc->status_id = '4';
                }elseif($revision>0){
                    $doc->status_id = '5';
                }
                $doc->audit_date = date("Y-m-d H:i:s");
                $doc->save();
                $app = approval::where([['document_id','=',$par[1]],['type','=','To'],['status_id','=','2']])->update(['status_id'=>'4','audit_date'=>date("Y-m-d H:i:s")]);
            }
            if($par[4]=='email'){
                return view('approval.success');
            }elseif($par[4]=='web'){
                session::flash('error','success');
                if($par[0]=='3'){
                    session::flash('message','Approval Change to Approved Succesfully');
                }elseif($par[0]=='4'){
                    session::flash('message','Approval Change to Rejected Succesfully');
                }elseif($par[0]=='5'){
                    session::flash('message','Approval Change to Revised Succesfully');
                }
                return redirect('document');
            }
       }else{
            if($par[4]=='email'){
                return view('approval.error');
            }elseif($par[4]=='web'){
                session::flash('error','error');
                session::flash('message','Approval Change unsuccesfully');
                return redirect('document');
            }

        }

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
