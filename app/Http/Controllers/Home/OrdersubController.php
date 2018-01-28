<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\orders;
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
      return view('home/order/end');
   }

     public function index($id,$gid,$price,$num)
   
    {   
        //获取用户id
     //$uid = session('uid');
       $uid = 24;
     
        //dd($uid);
        //获取商品id
        $gid = $gid;

        //获取总价格
        $price = $price;

        //获取商家id
        $gid = $gid;

        //获取商品数量
        $num = 12;
        
        //获取选择的单价
        //$goods_price = $goods_price;

        //订单生成时间
        $ord_time = time();

        //生成订单号
        $o_code = $uid.rand(100000,999999);

        //获取该用户的所有地址信息
        $addr = address::where('uid',$uid)->get();
    //dd($addr);
        //获取商品的详细信息
        $resgoods = goods::where('id',$gid)->get();
       //dd($resgoods);
        //进入页面

        return view('home/order/info',compact('uid','o_code','addr','goods','price','num','goods_price','gid','resgoods'));

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //获取传功来的数据
        $res = $request->except('_token');
        $addrs = $res['addr'];             //地址下标
        $goods_num = $res['num'];     //数量
        $gid = $res['gid'];                 //商品id
        $gname = Goods::where('goods_name',$gname)->first();
        $goods_price = $res['goods_price'];         //总价
        $uid = session('uid');           //用户id
        $addres = address::where('uid',$uid)->get();           //用户的所有地址
        $o_addr = $addres[$addrs]->id;          //所选地址id
        $ord_time = time();                    //订单生成时间

        //生成订单号
        $o_code = $uid.rand(10000,99999); 
        DB::beginTransaction();         //开启事务

        //在orders表中添加订单
        $regres = orders::insert(['uid'=>$uid,'o_code'=>$o_code,'num'=>$num,'price'=>$total_price,'ostate'=>0]);
        
        //在ordersinfo表中添加订单
        $regress = ordersinfo::insert(['sid'=>$sid,'gname'=>$gname,'ostate'=>0,'o_extend'=>0,'o_code'=>$o_code,'o_addr'=>$o_addr,'ord_time'=>$ord_time]);

        //判断是否都添加成功
        if($regres && $regress){
            DB::commit();           //成功执行
            echo $o_code; 
            //进入页面
            //return view('homes/user/ordersub',compact('res'));
            
        } else { 
            DB::rollback();         //失败回滚
            echo 0;
            //return back();
        }

    }


}
