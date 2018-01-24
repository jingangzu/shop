<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Friend_link;
class FriendlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $name = $request->input('name','');
        $where = $request->only('name');
       
            $data = Friend_link::where('name','like','%'.$name.'%')->paginate(2);

        return view('admin.friendlink.index',compact('data','where'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加友情链接
        return view('admin.friendlink.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $data = $request->except('_token','submit');
         // dd($data);
        $this->validate($request,[
                'name'=>'required',
                'url'=>'required',
                'url'=>array('regex:/(http|ftp|https):\/\/.*?/'),
                'image'=>'required|image'
            ],[
               'name.required'=>'请填写链接名称',
               'url.required'=>'网址不能为空',
               'url.regex'=>'请填写网址全名',
               'image.image'=>'请上传一张图片',
            ]);
         if($request->hasFile('image')){
        $file = $request->file('image');

            //判断上传文件的有效性
            if($file->isValid()){
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名

//              生成新的唯一上传文件名
                $newName = md5(date('YmdHis').mt_rand(1000,9999).uniqid()).'.'.$entension;
               // 1. 将文件上传到本地服务器
               // 将文件移动到指定的位置
                $path = $file->move(public_path().'/linkpic',$newName);
                $data['image']=$newName;

            }else{
                  $data['image']='default.jpg';
            }
    
        }else{
                  $data['image']='default.jpg';
            }

         $res = Friend_link::create($data);
        if($res){
            return redirect('/admin/friendlink');

        }else{
            return back();
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
        //查找数据
        $data = Friend_link::find(1);

        return view('admin.friendlink.edit',compact('data'));

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
        $data = $request->except('_token','submit','_method');
         if($request->hasFile('image')){
        $file = $request->file('image');

            //判断上传文件的有效性
            if($file->isValid()){
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名

//              生成新的唯一上传文件名
                $newName = md5(date('YmdHis').mt_rand(1000,9999).uniqid()).'.'.$entension;
               // 1. 将文件上传到本地服务器
               // 将文件移动到指定的位置
                $path = $file->move(public_path().'/linkpic',$newName);
                $data['image']=$newName;
              
                }

           
    
        }

         $res = Friend_link::where('id',$id)->update($data);
        if($res){
            return redirect('/admin/friendlink')->with('msg','修改成功');

        }else{
            return back()->with('msg','修改失败');
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
        Friend_link::where('id',$id)->delete();
    }

     //显示
    public function up($id,$status=1)
    {
        Friend_link::where('id',$id)->update(['status'=>$status]);
        return redirect('/admin/friendlink');

    }

    public function down($id)
    {
       Friend_link::where('id',$id)->update(['status'=>0]);
        return redirect('/admin/friendlink');

    }
}
