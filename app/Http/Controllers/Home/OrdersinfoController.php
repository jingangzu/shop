<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\orders;
use App\Model\ordersinfo;

class OrdersinfoController extends Controller
{
    //
    public function orderinfo()
    {
    	
        	//获取用户id
    	 $uid = session('inuser')->id;
    	 //获取定单
    	$order = order::where('uid');
    }
}
