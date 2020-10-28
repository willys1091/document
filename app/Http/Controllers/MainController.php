<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\users;

class MainController extends Controller{
    use \App\Traits\general;
    public function __construct(){
		$this->timezone();
    }

    public function index(){
        $data['title']='Login | Document';
        return view('login.login',$data);
    }

    public function validasi(Request $request){
        $admin = users::where(['email' => $request->input('email'),'password' => md5($request->input('password'))]);
        $jumlah = $admin->count();
        if($jumlah=='1'){
            $data = $admin->get();
            $ses = array(
				'id' =>$data[0]['id'],
				'roleid' =>$data[0]['roleid'],
				'type'=>$data[0]['type'],
				'title' =>$data[0]['title'],
				'email' =>$data[0]['email'],
				'name' =>$data[0]['name'],
				'avatar' =>$data[0]['avatar'],
				'password' =>$data[0]['password'],
				'is_login' => true
			);
            Session::put($ses);
            $this->log_system('login','Admin Logged In',Session::get('id'));
            return redirect('dashboard');
        }else{
            session::flash('error','error');
			session::flash('message','Login Failed! Check Your Email and Password');
			return redirect('/');
        }
    }

    public function forgot(){
		return view('login.forgot');
    }

    public function dashboard(){
		if(Session::has('is_login')){
            $data['title']='Dashboard | Document';
	    	$data['contentehader']= "bc";
			$bc[]= array('title'=>'Dashboard','url'=>'','active'=>'1');
            $data['bc'] = $bc;
            // $data['calendar'] = process::where('interviewer',Session::get('id'))->get();
			//Session::put('org_name',a::where('id',Session::get('org_id'))->value('name'));
			return view('login.dashboard',$data);
		}else{
			session::flash('error','error');
			session::flash('message','Access Denied! Please Login First');
			return redirect('/');
        }
	}

    public function logout(){
		$this->log_system('login','Admin Logged Out',Session::get('id'));
		$ses = array('id','org_id','org_name','roleid','type','title','email','name','password','is_login');
		Session::forget($ses);
		return redirect('/');
	}
}
