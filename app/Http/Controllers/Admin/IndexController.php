<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\User_home;
class IndexController extends Controller
{
    //zhuye
    public function index()
    {

    	$allusers = \DB::table('user_admins')->count();

    	Session::put('allusers',$allusers);

    	$all = \DB::table('user_home')->count();

    	Session::put('all',$all);

    	$time = \DB::table('user_home')->get();





    	$today_start=mktime(0,0,0,date('m'),date('d'),date('Y'));

		// $today_end=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;

		// $a = 'select count(*) from user_home where created_at >= curdate()'

		// $time = Session::put('time',$time);

    	return view('admin.index');
    } 
    
}
