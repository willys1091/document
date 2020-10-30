<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\document;
use App\Models\division;
use App\Models\doctype;
use App\Models\status;
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
        return view('document.index',$data);
    }

    public function create(){
        $data['title']='Document Create | DMS';
        $data['action']='add';
        $data['contentehader']= "bc";
        $bc[]= array('title'=>'Document','url'=>'document','active'=>'0');
        $bc[]= array('title'=>'Create','url'=>'','active'=>'1');
        $data['bc'] = $bc;
		$data['doctype'] =doctype::where('active','1')->get();
		$data['division'] =division::where('active','1')->get();
        return View('document.action',$data);
    }

    public function store(Request $request){
        $doc = new document;
        $doc->doc_no = '0';
        $doc->sequence = '0';
        $doc->doctype_id = $request->doctype;
        $doc->status_id = '1';
        $doc->division_id =  $request->division;
        $doc->title = $request->subject;
        $doc->message = htmlspecialchars($request->message);
        $doc->audit_at = Session::get('id');
        $doc->audit_date = date("Y-m-d H:i:s");
        $doc->save();
    }

    public function draft(Request $request){
        echo $request->doctype;
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
