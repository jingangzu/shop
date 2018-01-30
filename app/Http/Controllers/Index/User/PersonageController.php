<?php

namespace App\Http\Controllers\Index\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Detail;
// use App\Mode\Address;

class PersonageController extends Controller
{
    //  个人信息首页
    public function index()   
    {
        
    	return view('index.user.layout');
    }

    public function account()
    {

    	

     $user = User::find(1);
    	// var_dump($data);
        // die;
   
        $data = User::find(1)->detail;
        // dd($data); 


    	return view('index.user.account',['data' =>$data,'user'=>$user]);
    }

    public function redact(Request $request)
    {  
        // $add = User::find(1)->detail;
        $data = User::find(1)->detail;
        $user = User::find(1);
        return view('index.user.redact',['data' => $data,'user' => $user]);
    }

    public function doredact(Request $request)
    {
        $inputa = $request->except('_token','submit','nickname','phone','sex','avatars');
        // dd($inputa);
        $inputb = $request->except('_token','submit','name','email');
          // dd($inputb);
        // $inputc = $request->except('_token','submit','nickname','phone','sex','avatars','name','email')
        // dd($inputb);
        $data = User::find(1)->detail;
        $user = User::find(1);
       // dd($request);
        if($request->hasFile('avatars'))
        {
             $file = $request->file('avatars');
                if($file->isValid()){
            //处理//获取图片扩展名
                $ext =  $file->getClientOriginalExtension();
                // dd($ext);
               
                $filename = time().mt_rand(1000,99999).'.'.$ext;
                // dd($filename);
                $res = $file->move('./avatar',$filename);
                // dd($res);
                if($res)
                {
                    $inputb['avatars'] = $filename;
                }else{
                    $inputb['avatars'] = 'default.jpg';
                }
            }else{
                $inputb['avatars'] = 'default.jpg';
            }
        }else{
            unset($inputb['avatars']);
        }
        // dd($inputb);
// dd(345);

        //时间
       //  $time = date('Y-m-d H:i:s',time());
       //  $input['created_at'] = $time;
       //  $input['updated_at'] = $time;

        $uid = $user['id'];
        // dd($uid);

        $did = $data['id'];
 
        unset($user['id']);
        unset($data['id']);
        // dd($uid);
        $res1 = \DB::table('user_home')->where('id',$uid)->update($inputa);
        $res2 = \DB::table('user_home_detail')->where('id',$did)->update($inputb);
        // dd($res2);
        if($res1 && $res2)
        {
            return view('index.user.account')->with(['info'=>'更新成功']);
        }else{
            return back()->with(['info'=>'更新失败']);
        }
       // return view('index.user.account',['data' => $data,'user' => $user]);
       
        return view('index.user.account',['data' => $data,'user' => $user]);
    }
}
