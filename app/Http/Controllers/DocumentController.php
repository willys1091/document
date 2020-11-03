<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\document;
use App\Models\approval;
use App\Models\division;
use App\Models\doctype;
use App\Models\status;
use App\Models\users;
use App\Models\file;
use Session;

class DocumentController extends Controller{
    use \App\Traits\general;

    public function __construct(){
		$this->middleware('auth');
		$this->timezone();
    }

    public function index(){
        $data['title']='Document | DMS';
        $data['contentehader']= "btn";
		$data['btn'] = array('title'=>'Add Document','url'=>'document/create','icon'=>'fas fa-plus');
        $data['view'] = document::all();
        $data['approval']= approval::where([['email','=',Session::get('email')],['type','=','To']])->get();
        return view('document.index',$data);
    }

    public function create(){
        $data['title']='Document Create | DMS';
        // $data['action']='add';
        $data['contentehader']= "bc";
        $bc[]= array('title'=>'Document','url'=>'document','active'=>'0');
        $bc[]= array('title'=>'Create','url'=>'','active'=>'1');
        $data['bc'] = $bc;
		$data['doctype'] =doctype::where('active','1')->get();
		$data['division'] =division::where('active','1')->get();
        return View('document.create',$data);
    }

    public function store(Request $request){
        try{
            $dt = doctype::where('id',$request->doctype)->value('prefix');
            $check = document::where('doc_no','like', '%' . $dt.'/'.date("Ymd") . '%')->count()+1;
            $runnum = $this->run_number($check);
            $doc = new document;
            $doc->doc_no = $dt.'/'.date("Ymd").'/'.$runnum;
            $doc->sequence = '0';
            $doc->doctype_id = $request->doctype;
            $doc->status_id = '2';
            $doc->division_id =  $request->division;
            $doc->title = $request->subject;
            $doc->message = htmlspecialchars($request->message);
            $doc->audit_at = Session::get('id');
            $doc->audit_date = date("Y-m-d H:i:s");
            $doc->save();

        if ($request->hasFile('userfile')){
            $x=1;
            foreach($request->file('userfile') as $file){
                $ext = $file->getClientOriginalExtension();
                $ori = $file->getClientOriginalName();
                if($file->isValid()){
                    $filename = date("Ymd").''.$doc->id.''.$x.".$ext";
                    $file->move('./public/img/upload',$filename);
                    $file = new file;
                    $file->doc_id = $doc->id;
                    $file->name = $ori;
                    $file->file = $filename;
                    $file->audit_at = Session::get('id');
                    $file->audit_date = date("Y-m-d H:i:s");
                    $file->save();
                    $x++;
                }else{
                    return FALSE;
                    exit();
                }
            }
        }
            for($x=0;$x<count($request->to);$x++){
                $app = new approval;
                $app->document_id = $doc->id;
                $app->type = 'To';
                $app->email = $request->to[$x];
                $app->status_id = '2';
                $app->audit_at = Session::get('id');
                $app->audit_date = date("Y-m-d H:i:s");
                $app->save();
                $param['doc_id'] = $doc->id;
                $param['app_id'] = $app->id;
                $param['btn'] = 'approval';
                $this->SendEmail2($request->to[$x],$request->subject,$request->message,$param);
            }

            for($y=0;$y<count($request->cc);$y++){
                $app = new approval;
                $app->document_id = $doc->id;
                $app->type = 'CC';
                $app->email = $request->cc[$y];
                $app->audit_at = Session::get('id');
                $app->audit_date = date("Y-m-d H:i:s");
                $app->save();
            }
            session::flash('error','success');
            session::flash('message','Document Added Succesfully');
        }catch(Exception $e){
            session::flash('error','error');
            session::flash('message',$e->getMessage());

        }
       return redirect('document');
    }

    public function detail($id){

    }

    public function draft(Request $request){
        echo count($request->to);
        echo $request->to[0];
    }

    public function show($id){
        $data['document'] = document::where('id',$id)->get();
        return view('document.show',$data);
    }

    public function edit($id){
        $data['title']='Document Edit | DMS';
        $data['contentehader']= "bc";
        $bc[]= array('title'=>'Document','url'=>'document','active'=>'0');
        $bc[]= array('title'=>'Edit','url'=>'','active'=>'1');
        $data['bc'] = $bc;
		$data['doctype'] =doctype::where('active','1')->get();
		$data['division'] =division::where('active','1')->get();
		$data['document'] =document::where('id',$id)->first();
		$data['approval'] =approval::where('document_id',$id)->get();
        return View('document.edit',$data);
    }

    public function update(Request $request, $id){
        try{
            $nextseq = document::where('doc_no',$request->docno)->max('sequence');
            $doc = new document;
            $doc->doc_no = $request->docno;
            $doc->sequence = $nextseq + 1;
            $doc->doctype_id = $request->doctype;
            $doc->status_id = '2';
            $doc->division_id =  $request->division;
            $doc->title = $request->subject;
            $doc->message = htmlspecialchars($request->message);
            $doc->audit_at = Session::get('id');
            $doc->audit_date = date("Y-m-d H:i:s");
            $doc->save();

        if ($request->hasFile('userfile')){
            $x=1;
            foreach($request->file('userfile') as $file){
                $ext = $file->getClientOriginalExtension();
                $ori = $file->getClientOriginalName();
                if($file->isValid()){
                    $filename = date("Ymd").''.$doc->id.''.$x.".$ext";
                    $file->move('./public/img/upload',$filename);
                    $file = new file;
                    $file->doc_id = $doc->id;
                    $file->name = $ori;
                    $file->file = $filename;
                    $file->audit_at = Session::get('id');
                    $file->audit_date = date("Y-m-d H:i:s");
                    $file->save();
                    $x++;
                }else{
                    return FALSE;
                    exit();
                }
            }
        }
            for($x=0;$x<count($request->to);$x++){
                $app = new approval;
                $app->document_id = $doc->id;
                $app->type = 'To';
                $app->email = $request->to[$x];
                $app->status_id = '2';
                $app->audit_at = Session::get('id');
                $app->audit_date = date("Y-m-d H:i:s");
                $app->save();
                $param['doc_id'] = $doc->id;
                $param['app_id'] = $app->id;
                $param['btn'] = 'approval';
                $this->SendEmail2($request->to[$x],$request->subject,$request->message,$param);
            }

            for($y=0;$y<count($request->cc);$y++){
                $app = new approval;
                $app->document_id = $doc->id;
                $app->type = 'CC';
                $app->email = $request->cc[$y];
                $app->audit_at = Session::get('id');
                $app->audit_date = date("Y-m-d H:i:s");
                $app->save();
            }
            session::flash('error','success');
            session::flash('message','Document Added Succesfully');
        }catch(Exception $e){
            session::flash('error','error');
            session::flash('message',$e->getMessage());

        }
       return redirect('document');
    }

    public function destroy($id){

    }
}
