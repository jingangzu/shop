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

 		

 		 $time = date('Y-m-d H:i:s',time());
	     $input['created_at']=$time;
	     $input['updated_at'] = $time;


	     $input['status'] = 0;

	    $user = User::where('name',$input['name'])->first();
	    $emails = User::where('email',$input['email'])->first();
	     
	    if ($emails) {
            return back()->with('errors','邮箱已被激活');
        } 

	    if ($user) {
            return back()->with('errors','用户已被注册');
        } 

        $res = \DB::table('user_home')->insert($input);
       

       if($res){
           	// 发送邮件
       		 \Mail::send('mails.mails',['input' => $input],function($message)use($input){
       			$message->to($input['email'])->subject('请激活您的账号');

		     });
       		 //如果添加成功，跳转到列表页
            return redirect('/index/login')->with('msg','请到邮箱内激活账号');
        }else{
            //如果添加失败，返回到添加页
            return back()->with('msg','添加失败');
       }
       
	}
	public function active($email)
	{

		$input['status'] = 1;

		$res = \DB::table('user_home')->where('email',$email)->update($input);

		if($res)
		{
			return redirect('/index/login')->with(['info'=>'激活成功,请登录']);
		}else{
			return back()->with('msg','激活失败');
		}
	}

	public function resetpw()
    {
        return view('index.user.resetpw');

    }

    public function doresetpw(Request $request)
    {

    	$input  = $request->except('_token');



		$input['status'] = 2;

		\DB::table('user_home')->update($input);


    	// dd($input);
        // 发送邮件
        $res = \Mail::send('mails.remails',['input' => $input],function($message)use($input){
        $message->to($input['email'])->subject('请激活您的账号');

         });


		$emails = User::where('email',$input['email'])->first();


		if (!$emails){
            return back()->with('errors','该邮箱还没注册');
        } 

        if($res)
        {
            return redirect('/index/login')->with('msg','请激活登陆');
        }else{
            return back()->with('msg','激活失败');
        }
    }

  //   public function remails(Request $request,$email)
  //   {
    
  //   	$input['status'] = 2;

  //   	dd($input);

  //   	$res = \DB::table('user_home')->where('email',$email)->update($input);

  //   	if($res)
		// {
		// 	return redirect('/index/user/nextresetpw');
		// }else{
		// 	return back()->with('msg','激活失败');
		// }
  //   }

    public function nextresetpw(Request $request,$email)
    {

    	return view('/index/user/nextresetpw',compact('email'));
    }


    public function donextresetpw(Request $request)    
    {


    	$user = User::where('email',$request['email'])->first();

    	$status = $user->status;


        if ($status !== 2) {
            return back()->with('errors','账号不是通过邮箱来重置密码的');
        }

		$input  = $request->except('_token');


	
		$email=$request->input('email');

			$rule = [
    	    'password'=>'required|min:5|max:18',
			're-password'=>'required|same:password',
 		];

 	  	 $mess = [
 	  	 'password.required'=>'密码不能为空',
 	  	 're-password.required'=>'确认密码不能为空',
         're-password.same'=>'两次密码不一致',
         'password.between'=>'密码必须5-18位',
         're-password.between'=>'密码必须5-18位',
           
        ];


        $validator = Validator::make($input,$rule,$mess);

        if ($validator->fails()) {
            return redirect('/index/user/nextresetpw/'.$email)
                ->withErrors($validator)
                ->withInput();	
        }

      	$input  = $request->except('re-password');


    	$email = $request->email;

    	$user = User::where('email',$email)->first();

    	// dd($user);

        $password = Crypt::encrypt($request->password);


    	$res = $user->update(['password'=>$password]);

    	if($res)
		{
			return redirect('/index/login')->with('msg','密码重置成功');
		}else{
			return back()->with('msg','修改失败');
		}
    }

    
}
