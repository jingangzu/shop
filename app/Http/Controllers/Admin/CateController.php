<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
     //修改分类排序
    public function changeOrder(Request $request,$id)
    {
//       排序的业务逻辑

        $input = $request->except('_token');

        // 找到要修改排序的那条记录
        $cate = Cate::find($input['cate_id']);

//        修改这条记录的排序值为传过来的排序值
        $res = $cate->update(['cate_order'=>$input['cate_order']]);

        //判断是否修改成功
        if($res){
            $data = [
              'status'=>0,
                'msg'=>"排序修改成功"
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>"排序修改失败"
            ];
        }
        return $data;
    }

     //商品分类页
     public function index()
    {
    	// $cates = Cate::all();

    	//实例化分类对象
    	$cate = new Cate();
    	$cates = $cate->getCate();
    	return view('admin.cate.list',compact('cates'));
    } 

    

    //商品分类添加页
     public function add()
    {

    	//获取一级类
    	$cateone = Cate::where('cate_pid',0)->get();
    	return view('admin.cate.add',compact('cateone'));
    } 


    public function store(Request $request)
    {
    	//1.获取请求参数数据
    	$input = $request->except('_token');
    	// dd($input);

    	$res = Cate::create($input);
    	if($res){
    		return redirect('admin/cate/list')->with('msg','添加成功');
    	}else{
    		return back()->with('msg','添加失败');
    	}
    }

    //分类修改页面
    public function edit($id)
    {
    	$cate = Cate::find($id);
    	 // dd($cate);
    	return view('admin.cate.edit',compact('cate'));
    }

    public function update(Request $request, $id)
    {
        // $input = $request->all();
        $input= $request->except('_token','_method');
      // dd($input);

        $cate = Cate::find($id);
       $cate->cate_name = $input['cate_name'];
       $cate->cate_title = $input['cate_title'];
       $cate->cate_keywords = $input['cate_keywords'];
       $res = $cate->save();

        if($res){


            return redirect('admin/cate/list/');
        }else{
            // 如果添加失败，返回到修改页
             return back()->with('msg','修改失败');

        }
    }


    public function del($id)
    {
    	$cate = Cate::find($id)->delete();
    
        //如果删除成功
        if($cate){
            $data = [
                'status'=>0,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'删除失败'
            ];
        }

//        return response()->json($data);
//        json_encode($data);

        return $data;
   
    }

   



    //商品列表页
     public function product()
    {
    	return view('admin.product');
    } 
    //商品列表页
     public function addproduct()
    {
    	return view('admin.addproduct');
    }
}
