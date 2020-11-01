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

            return view('approval.success');
       }else{
            return view('approval.error');
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
