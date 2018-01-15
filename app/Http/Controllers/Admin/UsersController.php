<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       //用户列表页
       $name = $request->input('name', '');
        $data = \DB::table('user_admins')->where('name','like','%'.$name.'%')->paginate(10);
      foreach ($data as $k=>$v)
      {
        $data  [$k]->password = substr($data [$k]->password,0,7).'...';
      } 
        return view ('admin/userindex',['data'=>$data,'where'=>['name'=>$name]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.useradd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收参数
        //$all = $request->all();
       // dd($all);
        //检测表单验证规则
           $this->validate($request, [
        'name' =>'required|min:6|max:18',
        'password' => 'required|min:6|max:18',
        're-password'=>'required|same:password',
        'phone'=>'required|size:11',
        'email'=>'required|email',
        'avatar' => 'image',
    ],[
      // 'name.required' => '用户名不能为空',
      'name.min' => '用户名不能小于6位',
      'name.max'=>'用户名不能大于18位',
      'name.required' => '用户名不能为空',
      'password.required' => '密码不能为空',
      'password.min'=>'密码不能小于6位',
      'password.max'=>'密码不能大于18位',
      're-password.required' => '确认密码不能为空',
      're-password.same'=>'确认密码是否一致',
      'phone.required'=>'手机号不能为空',
      'phone.size' => '手机号必须是11位',
      'email.email' =>' 邮箱不合法',
      'email.required' =>' 邮箱不能为空',
      'avatar.image' =>'请上传一张正确的图片'
     ]);
   //处理
    $data = $request->except('_token','re-password');
    //对密码加密
   $data['password'] = encrypt($data['password']);
   //dd($data);
    //对密码进行解密
   $res=decrypt($data['password']);

   //处理上传
    if($request->hasFile('avatar'))
    {
        $file = $request->file('avatar');
        if($file->isValid())
        {
            //处理
            $ext = $file->getClientOriginalExtension();
            $filename=time().mt_rand(10000,99999).'.'.$ext;
            $res= $file->move('./uploads',$filename);
            if($res)
            {
                $data['avatar'] = $filename;
            }else
            {
                $data['avatar'] = 'default.jpg';
            }
        }else
        {
            $data['avatar']='default.jpg';
        }
    }else
    {
        $data['avatar'] = 'default.jpg';
    }
       
     //时间                                                                                                                                                       
      $time = date('Y-m-d H:i:s',time());
      $data['created_at']=$time;
     $data['updated_at'] = $time;

   $res = \DB::table('user_admins')->insert($data);
       

//     判断是否添加成功
        if($res){
            //如果添加成功，跳转到列表页
            return redirect('/admin/users')->with('msg','添加成功');
        }else{
            //如果添加失败，返回到添加页
            return back()->with('msg','添加失败');
         }
    }   
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
        $data = \DB::table('user_admins')->where('id',$id)->first();
         return view ('admin.useredit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //更新
        $this->validate($request, [
        'name' =>'required|min:6|max:18',
        'phone'=>'required|size:11',
        'email'=>'required|email',
        'avatar' => 'image',
    ],[
      // 'name.required' => '用户名不能为空',
      'name.min' => '用户名不能小于6位',
      'name.max'=>'用户名不能大于18位',
      'name.required' => '用户名不能为空',
      'phone.required'=>'手机号不能为空',
      'phone.size' => '手机号必须是11位',
      'email.email' =>' 邮箱不合法',
      'email.required' =>' 邮箱不能为空',
      'avatar.image' =>'请上传一张正确的图片'
     ]);
        
        $data = $request->except('_token','_method');
         
         //处理上传
    if($request->hasFile('avatar'))
    {
        $file = $request->file('avatar');
        if($file->isValid())
        {
            //处理
            $ext = $file->getClientOriginalExtension();
            $filename=time().mt_rand(10000,99999).'.'.$ext;
            $res= $file->move('./uploads',$filename);
            if($res)
            {
                  //删除原图片
                $oldPic = \DB::table('user_admins')->where('id',$data['id'])->first()->avatar;
                if($oldPic != 'default.jpg')
                {
                    //dd($oldPic);
                   //  unlink('./uploads/'.$oldPic);
                }
               
                $data['avatar'] = $filename;
              

            }
        }
      }
      $id = $data['id'];
      unset($data['id']);
       $res = \DB::table('user_admins')->where('id',$id)->update($data);
       
       if($res){
            
            return redirect('/admin/users')->with('msg','更新成功');
        }else{
            
            return back()->with('msg','更新失败');
         }
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = \DB::table('user_admins')->delete($id);

       //如果删除成功
        if($res){
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
}
