<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //商品控制器
    
    //商品首页查询
    public function index()
    {   
        // $data = \DB::table('')
    	return view('admin.goods.index');
        // $name = $request->input('name','');
        // $num = $request->input('num',10);
        // $data = \DB::table('goods_attribute_name')->where('name','like','%'.$name.'%')->paginate($num);

        // return view('admin.user.index',['title'=>$title,'data'=>$data,'where'=>['name'=>$name,'num'=>$num]]);

    }


    // //添加商品
    public function add()
    {
        return view('admin.goods.add');
    }

    //显示商品
    // public function insert(Request $request)
    // {



    // }
    // //修改商品
    // public function edit()
    // {

    // }

    // public function update()
    // {

    // }

    // //删除商品
    // public function delete()
    // {

    // }

}
