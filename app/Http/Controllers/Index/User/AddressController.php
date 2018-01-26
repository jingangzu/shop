<?php

namespace App\Http\Controllers\Index\User;

use App\Model\Address;
use App\Model\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    //显示个人中心的地址
    public function index()
    {
        //dd(111);
    	return view('index.user.index');
    }	
    
    public function add(Request $request)
    {
    	$inpot = $request->except('submit','token','harea','hproper','hcity');
    	// dd($inpot);
    	$data = \DB::table('address')->insert($inpot);
    	// $user = Address::find(1);
    	 if($data)
        {
            return redirect('/index/user/address')->with(['info'=>'添加成功']);
        }else{
            return back()->with(['info'=>'添加失败']);
        }

    }
}
