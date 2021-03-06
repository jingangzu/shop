<?php

namespace App\Http\Controllers\Admin;

use App\Model\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{
    //前台页面图片控制器
    public function index()
    {
    	$data = \DB::table('advertisement')->OrderBy('sort','asc')->get();
    	return view('admin.advertisement.index', ['data' => $data]);
    }

    // public function add()
    // {
    // 	return view('admin.advertisement.index');
    // }

    public function insert(Request $request)
    {
    	 $this->validate($request,[//validate(表单验证)
                'img'=>'required|image',],
                ['img.image'=>'请上传一张合法的图片',
            	'img.required'=>'请上传一张图片',]);
    	// $all = $request->all();
    	// dd($all);
    	$data = $request->except('_token','token');
    	 if($request->hasFile('img'))
        {
        	 $file = $request->file('img');
            	if($file->isValid()){
        	//处理//获取图片扩展名
                $ext =  $file->getClientOriginalExtension();

                // dd($ext);}
                $filename = time().mt_rand(1000,99999).'.'.$ext;
                $res = $file->move('./uploa',$filename);
                if($res)
                {
                	$data['img'] = $filename;
                }else{
                	$data['img'] = 'default.jpg';
                }
            }else{
            	$data['img'] = 'default.jpg';
            }
        }else{
        	$data['img'] = 'default.jpg';
        }
        //处理状态
        $data['status'] = 0;

        //时间
        $time = date('Y-m-d H:i:s',time());
        $data['created_at'] = $time;
        $data['updated_at'] = $time;

        $res1 = \DB::table('advertisement')->insert($data);

        if($res1)
        {
            return redirect('/admin/advertisement/index')->with(['info'=>'添加成功']);
        }else{
            return back()->with(['info'=>'添加失败']);
        }
        // dd($data);
   	}   	
   	
   	//edit
   	    public function edit($id)
    {
        // dd($id);
        // $title = '用户编辑';

        $data = \DB::table('advertisement')->where('id',$id)->first(); 
// dd($data);
        return view('admin.advertisement.edit',['data'=>$data]);

    }





   	//update
   	public function update(Request $request)
   	{

    	//  $this->validate($request,[//validate(表单验证)
     //            'img'=>'required|image',],
     //            ['img.image'=>'请上传一张合法的图片',
     //        	'img.required'=>'请上传一张图片',]);
    	// // $all = $request->all();
    	// // dd($all);
    	$data = $request->except('_token','token');
    	 if($request->hasFile('img'))
        {
        	 $file = $request->file('img');
            	if($file->isValid()){
        	//处理//获取图片扩展名
                $ext =  $file->getClientOriginalExtension();

                // dd($ext);}
                $filename = time().mt_rand(1000,99999).'.'.$ext;
                $res = $file->move('./upload',$filename);
                if($res)
                {
                	$data['img'] = $filename;
                }else{
                	$data['img'] = 'default.jpg';
                }
            }else{
            	$data['img'] = 'default.jpg';
            }
        }else{
        	unset($data['img']);
        }
        //处理状态
        $data['status'] = 0;

        //时间
        $time = date('Y-m-d H:i:s',time());
        $data['created_at'] = $time;
        $data['updated_at'] = $time;

       $id = $data['id'];

        unset($data['id']);

        $res1 = \DB::table('advertisement')->where('id',$id)->update($data);

        if($res1)
        {
            return redirect('/admin/advertisement/index')->with(['info'=>'更新成功']);
        }else{
            return back()->with(['info'=>'更新失败']);
        }
   	}




   	//delete
   	public function delete($id)
   	{
   		$res = \DB::table('advertisement')->delete($id);
   		
        if($res)
        {
            return redirect('/admin/advertisement/index')->with(['info'=>'添加成功']);
        }else{
            return back()->with(['info'=>'添加失败']);
        }
   	}
   	  
   //修改分类排序
    public function changeOrder(Request $request)
    {
//       排序的业务逻辑

        $input = $request->except('_token');

        // 找到要修改排序的那条记录
        $cate = Advertisement::find($input['id']);

//        修改这条记录的排序值为传过来的排序值
        $res = $cate->update(['sort'=>$input['cate_order']]);

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
}
