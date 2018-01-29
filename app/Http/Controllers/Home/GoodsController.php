<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cate;
use App\Model\Goods;
use App\Model\Goodspic;

use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    //商品列表
    public function list($cid)
    {
    	$data = Cate::find($cid)->goods;
    	// dd($data);
    	return view('home.liebiaoye',compact('data'));
    }
    public function show($id)
    {
    	//商品数据

//        存放商品记录的hash变量
        $hashKey = 'HASH:GOODS:';
        //存放商品图片的hash变量
        $hk = 'HASH:PICTURE:';


//        定义一个空数组，存放返回给视图的变量
        $arr = [];

        //如果redis中不存在，需要先从数据库中取，然后给redis一份
        if(!(Redis::exists($hashKey.$id)&&Redis::exists($hk.$id))){
            //1.从goods表中获取需要的商品列表
            $goods = Goods::find($id);
            $goods = $goods->toArray();
            //从goods_picture中获取需要的图片
            $picture = Goods::find($id)->getpicture;
            $picture = $picture->toArray();
//            2.将获取的商品数据写入redis中
                Redis::hmset($hashKey.$id,$goods);
                // Redis::hmset($hk.$id,$picture);
//            3. 根据商品id从Redis中获取需要的商品
            $data = Redis::hgetall($hashKey.$id);
            $picture = Redis::hgetall($hk.$id);

        }else{
            //如果redis中存在需要的数据，直接获取

                $data = Redis::hgetall($hashKey.$id);
                $picture = Redis::hgetall($hk.$id);
        }
    	//详情视图
    	return view('home.xiangqingye',compact('data','picture'));

    }

    // 商品搜索页
    

}
