<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shou;

class ShouController extends Controller
{
    //
    public function add($gid)
    {
    	if(!session('inuser')){
    		return json_encode('请先登录');
    	}
    	$data['user_id']=$uid=session('inuser')->id;
    	$data['goods_id']=$gid;
    	$rr = Shou::where('user_id',$uid)->where('goods_id',$gid)->get();
    	if($rr->first()){
    		return json_encode('收藏过了');
    	}

    	$res =Shou::create($data);
    	if($res)
    	{
    		return json_encode('收藏成功');
    	}else{
    		return json_encode('收藏失败');
    	}
    }

    public function list()
    {
    	$uid = session('inuser')->id;
    	$data = Shou::with('goods')->get();
    	return view('home.shoucang',compact('data'));
    }

    public function delete($id)
    {	
    	$uid = session('inuser')->id;
    	$res= Shou::where('user_id',$uid)->where('goods_id',$id)->delete();
    	if($res){
    		return redirect('index/shoulist')->with('shou','删除成功');
    	    }else{
    	    	return back()->with('shou','删除失败');
    	    }
    }
}
