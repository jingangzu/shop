<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\orders;
use App\Model\Cart;
use App\Model\ordersinfo;
use App\Model\Address;
use App\Model\Goods;
use App\Model\User;
use DB;
class OrdersubController extends Controller
{
    // 
   public function end()
   {

        //获取用户id
     $uid = session('inuser')->id;
     //购物车数据
     $shopcart=Cart::with('goods')->where('uid',$uid)->get();

        //获取该用户的所有地址信息
        $addr = address::where('uid',$uid)->get();
    //dd($addr);
        $price=0;
        foreach($shopcart as $k=>$v){
         $price+=($v->goods->goods_price)*($v->count);
        }
      return view('home/order/finish',compact('addr','shopcart','price'));
   }

     public function index($gid,$num)
   
    {   
        //获取用户id
     $uid = session('inuser')->id;
     //购物车数据
     $shopcart=Cart::with('goods')->where('uid',$uid)->get();

        //获取该用户的所有地址信息
        $addr = address::where('uid',$uid)->get();
    //dd($addr);
        $price=0;
        foreach($shopcart as $k=>$v){
         $price+=($v->goods->goods_price)*($v->count);
        }
        return view('home/order/info',compact('addr','shopcart','price'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //获取用户id
     $uid = session('inuser')->id;
     //购物车数据
     $shopcart=Cart::with('goods')->where('uid',$uid)->first();
     $data['uid']=$uid;
     $data['gid']=$shopcart->goods->id;
    $num = $dara['num'] = $shopcart->count;
    $data['price'] = $shopcart->goods->goods_price*$num;
               //所选地址id
    $aid=$request->input('aid');
    $data['aid']=$aid;
    $data['uname']=address::where('id',$aid)->first()->username;
        //生成订单号
        $data['ostate']=0;
        $o_code = $uid.rand(10000,99999); 
         $data['o_code']=$o_code;
        DB::beginTransaction();         //开启事务

        //在orders表中添加订单
        $regres = orders::insert($data);
        $Info['username']=$uid;
        $Info['gname']=$shopcart->goods->goods_name;
        $Info['o_addr']=$aid;
        $Info['o_tell']=address::where('id',$aid)->first()->phone;
        $Info['o_code']=$o_code;
        //在ordersinfo表中添加订单
        $regress = ordersinfo::insert($Info);

        //判断是否都添加成功
        if($regres && $regress){
            DB::commit();           //成功执行
            //进入页面
             return view('home/order/finish');
            
        } else { 
            DB::rollback();         //失败回滚
            return back();
        }

    }


}
