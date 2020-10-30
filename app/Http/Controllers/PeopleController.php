<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\users;
use Session;

class PeopleController extends Controller{
    use \App\Traits\general;

    public function __construct(){
		$this->middleware('auth');
		$this->timezone();
    }

    public function index(){
        $modul = request()->segment(2);
        $data['title']=ucwords($modul)." | DMS";
        $data['view'] =$modul=='admin'?admin::all():users::all();
        $data['contentehader']= "mdl";
		$data['btn'] = array('title'=>'Add '.$modul,'url'=>'people/'.$modul.'/create','icon'=>'fas fa-plus');
		return view('people.people',$data,compact('modul'));
    }

    public function create($modul){
        $data['action']='add';
		$data['modul'] = $modul;
        return View('people.people_action',$data);
    }

    public function store($modul,Request $request){
        if($modul=='admin'){
            $people = new admin;
            $people->roleid = $request->roleid;
            $people->type = $request->type;
            $people->title = $request->title;
            $people->avatar = $request->avatar;
        }elseif($modul=='user'){
            $people = new users;
            $people->ktp = $request->ktp;
            $people->phone = $request->phone;
            $people->source = "web";
        }
        $people->active ="1";
        $people->email = $request->email;
        $people->name = $request->name;
        $people->password = md5($request->password);
        $people->create_user = Session::get('id');
		$people->create_date = date("Y-m-d H:i:s");
		$people->save();
		$id = $people->id;
		$this->log_system($modul,'Added',$id);
		session::flash('error','success');
		session::flash('message',ucwords($modul).' Create Successfull');
		return redirect('people/'.$modul);
    }

    public function show($modul,$id,$param){
		$data = $modul=='user'?users::findorfail($id):admin::findorfail($id);
		$data->active = $param;
		$data->save();
		$this->log_system($modul,'Change '.(($param=='0')?'Inactive':'Active'),$id);
		return redirect('people/'.$modul);
	}

    public function edit($modul,$id){
        $data['action']='edit';
        $data['modul'] = $modul;
		$data['people'] =  $modul=='user'?users::findorfail($id):admin::findorfail($id);
		return View('people.people_action',$data);
    }

    public function update($modul,$id,Request $request){
        if($modul=='admin'){
            $people = admin::findorfail($id);
            $people->roleid = $request->roleid;
            $people->type = $request->type;
            $people->title = $request->title;
            $people->avatar = $request->avatar;
        }elseif($modul=='user'){
            $people = users::findorfail($id);
            $people->ktp = $request->ktp;
            $people->phone = $request->phone;
            $people->source = "web";
        }
        $people->active ="1";
        $people->email = $request->email;
        $people->name = $request->name;
        $people->password = md5($request->password);
        $people->create_user = Session::get('id');
		$people->create_date = date("Y-m-d H:i:s");
		$people->save();
		!empty($request->password)?$people->password = md5($request->password):'';
		$people->update_user = Session::get('id');
		$people->update_date = date("Y-m-d H:i:s");
		$people->save();
		$this->log_system($modul,'Change Data',$id);
		session::flash('error','success');
		session::flash('message',ucwords($modul).' Update Successfull');
		return redirect('people/'.$modul);
    }

    public function destroy($id){
        //
    }
}
