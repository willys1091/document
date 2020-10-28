<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\config;
use Session;

class SystemController extends Controller{
    use \App\Traits\general;

    public function __construct(){
		$this->middleware('auth');
		$this->timezone();
    }

    public function settings(){
    	$data['title']="Settings | Butuhuang";
		$data['contentehader']= "bc";
		$bc[]= array('title'=> 'Settings','url'=>'','active'=>'1');
        $data['bc'] = $bc;
        $config = config::all();
        foreach ($config as $c){
            $conf[$c['name']] = $c['value'];
        }
        $data['config'] = $conf;
		return View('system.settings',$data);
    }

    public function general(Request $request){
        config::where('name', '=', 'title')->update(['value' => $request->title]);
        config::where('name', '=', 'tagline')->update(['value' => $request->tagline]);
        config::where('name', '=', 'admin_email')->update(['value' => $request->admin_email]);
        config::where('name', '=', 'address')->update(['value' => $request->address]);
        config::where('name', '=', 'phone')->update(['value' => $request->phone]);
        config::where('name', '=', 'timezone')->update(['value' => $request->timezone]);
        return redirect('settings');
    }

    public function email(Request $request){
        config::where('name', '=', 'email_from')->update(['value' => $request->email_from]);
        config::where('name', '=', 'name_from')->update(['value' => $request->name_from]);
        return redirect('settings');
    }

    public function trans(Request $request){
        config::where('name', '=', 'admin')->update(['value' => $request->admin]);
        config::where('name', '=', 'bunga')->update(['value' => $request->bunga]);
        config::where('name', '=', 'bunga_percent')->update(['value' => $request->interest_percent]);
        config::where('name', '=', 'admin_percent')->update(['value' => $request->admin_percent]);
        config::where('name', '=', 'minimal_transaction')->update(['value' => $request->minimal_transaction]);
        return redirect('settings');
    }
    public function log($modul){
        $data['title']=ucwords($modul.' Log');
    	$data['log'] = (($modul=='system')?DB::table('systemlog')->select('systemlog.id','systemlog.ipaddress','systemlog.description','systemlog.timestamp','admin.name','admin.email')->join('admin', 'systemlog.admin_id', '=', 'admin.id'):DB::table('emaillog')->select('emaillog.id','emaillog.to','emaillog.subject','emaillog.timestamp','admin.name','admin.email')->join('admin', 'emaillog.user_id', '=', 'admin.id'))->get();
    	$data['contentehader']= "bc";
		$bc[]= array('title'=> ucwords($modul).' Log ','url'=>'','active'=>'1');
		$data['bc'] = $bc;
		return View('system.log',$data,compact('modul'));
    }
}
