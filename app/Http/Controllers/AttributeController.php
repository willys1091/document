<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\division;
use App\Models\doctype;
use App\Models\status;
use Session;

class AttributeController extends Controller
{
    use \App\Traits\general;

    public function __construct(){
		$this->middleware('auth');
		$this->timezone();
    }
    public function index(){
        $modul = request()->segment(2);
        $data['title']=ucwords($modul)." | DMS";
        if($modul=='division'){
            $data['view']= division::all();
        }elseif($modul=='doctype'){
            $data['view']= doctype::all();
       }elseif($modul=='status'){
            $data['view']= status::all();
        }
        $data['contentehader']= "mdl";
		$data['btn'] = array('title'=>'Add '.$modul,'url'=>'attribute/'.$modul.'/create','icon'=>'fas fa-plus');
		return view('attribute.index',$data,compact('modul'));
    }

    public function create(){
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
