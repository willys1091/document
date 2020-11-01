<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\document;
use App\Models\approval;
use App\Models\division;
use App\Models\doctype;
use App\Models\status;
use App\Models\users;
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
        // echo $request->file('userfile');
        // if ($request->hasFile('userfile')){
        //     echo count($request->userfile);
        //     // $this->upload($request->file('userfile'),$id,'\photo');
        //     // $per = resume_personality::findorfail($id);
        //     // $per->photo = Session::get('filename');
        //     // $per->save();
        // }
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

    public function upload(Request $request){

        // $files = $request->file('userfile');
        // if ($request->hasFile('userfile')){
        //     $nombre = $_FILES["ficheroExcel"]["name"];
        //     $bdInteli = $_POST['bdInteli'];
        //     if (move_uploaded_file($_FILES["ficheroExcel"]["tmp_name"], $nombre) ){
        //         $output = array('uploaded' => 'OK' );
        //     } else {
        //        $output = array('uploaded' => 'ERROR' );
        //     }
        //     echo json_encode($output);
        // }
    }

    public function draft(Request $request){
        echo count($request->to);
        echo $request->to[0];
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
