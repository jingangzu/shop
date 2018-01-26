<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Goods;
use App\Model\Goodspic;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword','');
        $cid = $request->input('cid','');
        $where = $request->only('keyword','cid');
        if($cid){
            $data = Goods::where('cid',$cid)->where('goods_name','like','%'.$keyword.'%')->paginate(2);
        }else{
            $data = Goods::where('goods_name','like','%'.$keyword.'%')->paginate(2);
        }

        
        // dd(24);
        
        //商品列表页
        // dd($data);
        return view('admin.goods.product',compact('data','where'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //商品添加页
        return view('admin.goods.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行商品添加
        $data = $request->except('_token','submit');

        $this->validate($request,[
                'goods_name'=>'required',
                'cid'=>'required',
                'goods_price'=>'required|numeric',
                'goods_description'=>'required|min:10|max:80',
                'goods_stock'=>'required|numeric',
              

            ],[
                'goods_name.required'=>'商品名称不能为空',
                'cid.required'=>'商品类别不能为空',
                'goods_price.required'=>'商品价格不能为空',
                'goods_price.numeric'=>'商品价格为数字',
                'goods_description.required'=>'商品描述不能为空',
                'goods_description.min'=>'商品描述不能小于10个字符',
                'goods_description.max'=>'商品描述不能大于80个字符',
                'goods_stock.required'=>'库存不能为空',
                'goods_stock.numeric'=>'库存为数字',
        
            ]);

        $res = Goods::create($data);
        if($res){
            return redirect('/admin/goods');

        }else{
            return back();
        }


}
    
    //添加商品图片
    public function picture($id)
    {
        return view('admin.goods.picture',compact('id'));
    }


    public function addpic(Request $request)
    {
        $name=$request->input('id');
          if($request->hasFile($name)){
        

//            获取上传文件
            $file = $request->file($name);


            //判断上传文件的有效性
            if($file->isValid()){
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名

//              生成新的唯一上传文件名
                $newName = md5(date('YmdHis').mt_rand(1000,9999).uniqid()).'.'.$entension;


               // 1. 将文件上传到本地服务器

               // 将文件移动到指定的位置
                $path = $file->move(public_path().'/uploads',$newName);

                  // 2. 将文件上传到七牛云
//
//                $disk = Storage::disk('qiniu');
//                $disk->put($newName,$file->getRealPath());

                //Storage::disk('qiniu')->writeStream('uploads/'.$newName, fopen($file->getRealPath(), 'r'));

//                3. 上传到阿里的OSS上
//                参数一：上传到OSS上后的新文件名
//                参数二：上传文件在tmp目录下的路径
                // $result = OSS::upload($newName, $file->getRealPath());

                $data['gid']=$request->input('gid');
                $data['picname']=$newName;


                $res=Goodspic::create($data);
                if($res){
                    return $newName;
                }else{
                    return 000;
                }

//              

//                返回上传的文件在服务器上的保存路径，给浏览器显示上传图片
                
               
            

            }
        
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
        //查询信息
        $data=Goods::find($id);

        //编辑表单
            return view('admin.goods.editproduct',compact('data'));

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
        //
         //执行商品添加
        $data = $request->except('_token','submit','_method');

        $this->validate($request,[
                'goods_name'=>'required',
                'cid'=>'required',
                'goods_price'=>'required|numeric|max:10',
                'goods_description'=>'required|min:10|max:80',
                'goods_stock'=>'required|numeric',
              

            ],[
                'goods_name.required'=>'商品名称不能为空',
                'cid.required'=>'商品类别不能为空',
                'goods_price.required'=>'商品价格不能为空',
                'goods_price.numeric'=>'商品价格为数字',
                'goods_price.max'=>'商品价格不能高于10位',
                'goods_description.required'=>'商品描述不能为空',
                'goods_description.min'=>'商品描述不能小于10个字符',
                'goods_description.max'=>'商品描述不能大于80个字符',
                'goods_stock.required'=>'库存不能为空',
                'goods_stock.numeric'=>'库存为数字',
        
            ]);

        $res = Goods::where('id',$id)->update($data);

      
        if($res){
            return redirect('/admin/goods');

        }else{
            return back()->with('status','修改失败');
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
        Goods::where('id',$id)->delete();




    }

    //上架
    public function up($id,$status=1)
    {
        Goods::where('id',$id)->update(['goods_status'=>$status]);
        return redirect('/admin/goods');

    }

    public function down($id)
    {
       Goods::where('id',$id)->update(['goods_status'=>0]);
        return redirect('/admin/goods');

    }

}
