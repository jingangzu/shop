<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\orders;
use App\Model\ordersinfo;
use App\Model\User;
use App\Model\Address;


class OrderController extends Controller
{
	public function order(Request $request,$id)
    {
    	//获取个人的商品及价格
    	
    	$goods = 
        // 获取个人的地址
    
    
    
        //获取发货人的地址
    
    
    	//获取商品状态
    
    
    
    
    	return view('index.user.order');}


}
