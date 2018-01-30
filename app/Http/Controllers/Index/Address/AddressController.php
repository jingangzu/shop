<?php

namespace App\Http\Controllers\Index\Address;

use App\Model\Address;
use App\Model\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    //
    //显示个人中心的地址
    public function index(Request $request)
    {
        //dd(111);
        $data = Address::get();
    	return view('index.address.index',['data' => $data]);
    }	
    
    public function insert(Request $request)
    {
        //dd(111);
    	return view('index.address.insert');
    }	
    
    public function add(Request $request)
    {
    	$inpot = $request->except('submit','_token','adressa','harea','hproper','hcity','back');
    	$data = \DB::table('address')->insert($inpot);
        $rr = $request->input('back');
        if($rr='info')
        {
            return back();
        }
        if($data)
        {
            return redirect('/index/address/index')->with(['info'=>'添加成功']);
        }else{
            return back()->with(['info'=>'添加失败']);
        }
        return view('index.address.insert');
    }

    public function edit($id)
    {
    	// dd($id);
    	$data = \DB::table('address')->where('id',$id)->first();
    	return view('index.address.edit',['data' => $data]);
    }

    public function update(Request $request)
    {
    	$data = $request->except('token','_token');
    	// dd($data);
    	$uid = $data['uid'];
    	unset($data['uid']);
    	$res1 = \DB::table('address')->where('uid',$uid)->update($data);
    	if($res1)
    	{
    		return redirect('/index/address/index')->with(['info'=>'修改成功']);

    	}else{
    		return back()->with(['info'=>'修改失败']);
    	}
    	return view('index.address.insert');
    }
    public function delete($id)
    {
    	$data = \DB::table('address')->delete($id);
    	if($data)
    	{
    		return redirect('/index/address/index')->with(['info'=>'删除成功']);
    	}else
    	{
    		return back()->with(['info'=>'删除失败']);
    	}
    }
}
