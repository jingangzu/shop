<?php

namespace App\Http\Controllers\Index\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
require_once app_path().'/Org/Code.class.php';
use App\Org\Code\Code;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Model\User;

class RegisterController extends Controller
{
    //注册
    public function register()
    {
    	return view('index.user.register');
    	// return 1111;
    }

    public function yzm()
    {
    	$code = new Code();
        return $code->make();
    }

    public function doregister(Request $request)
    {
    	// 获取用户注册提交过来的数据
    	$input  = $request->except('_token','re-password','submit');




    	// var_dump($input);
    	// die();

    	//验证
    	$rule = [
            'name'=> 'required|min:5|max:18',
            'password'=>'required|min:5|max:18',
    		're-password'=>'required|same:password',
    		'email'=>'required|email',
        ];


        $mess = [
            're-password.same'=>'两次密码不一致',
        ];

        // $input['password'] = encrypt($input['password']);
        // $input = $request->except('re-password');



        $validator = Validator::make($request->all(),$rule,$mess);

        // dd($validator);
         if ($validator->fails()) {
            return redirect('index/user/register')
                ->withErrors($validator)
                ->withInput();
        }
       // dd($input['code']);
         if(strtolower($input['code']) != strtolower(session('code'))){
            return back()->with('errors','验证码错误');
        }

        $input = $request->except('code','_token','re-password','submit');

        $input['password'] = encrypt($input['password']);

 		// dd($input);

 		 $time = date('Y-m-d H:i:s',time());
	     $input['created_at']=$time;
	     $input['updated_at'] = $time;

	    $user = User::where('name',$input['name'])->first();
	    $emails = User::where('email',$input['email'])->first();
	     
	    if ($emails) {
            return back()->with('errors','邮箱已被注册');
        } 

	    if ($user) {
            return back()->with('errors','用户已被注册');
        } 

        $res = \DB::table('user_home')->insert($input);
       

        

       if($res){
            //如果添加成功，跳转到列表页
            return redirect('/index/login')->with('msg','添加成功');
        }else{
            //如果添加失败，返回到添加页
            return back()->with('msg','添加失败');
         }
       
}
    
}
