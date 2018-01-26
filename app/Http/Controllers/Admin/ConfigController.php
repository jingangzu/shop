<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Model\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ConfigController extends Controller
{
      //修改分类排序
    public function changeOrder(Request $request,$id)
    {
//       排序的业务逻辑

        $input = $request->except('_token');

        // 找到要修改排序的那条记录
        $conf = Config::find($input['conf_id']);
        


//        修改这条记录的排序值为传过来的排序值
        $res = $conf->update(['conf_order'=>$input['conf_order']]);

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



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        //所有的网站配置数据
        
        
        $data = Config::orderBy('conf_order','asc')->get();

        foreach ($data as $k=>$v){
            switch ($v->field_type){
                // 1 如果当前记录的类型是input文本框     400-123-123  ====》   <input type="text" class="lg" name="conf_content[]" value="400-123-123">
                case 'input':
                    $v['conf_contents'] = '<input type="text" class="lg" name="conf_content[]" value="'.$v['conf_content'].'">';
                    break;

//2 如果当前记录的类型是textarea  当前记录的conf_content ====> <textarea type="text" class="lg" name="conf_content[]">conf_content</textarea>

                case 'textarea':
                    $v['conf_contents'] = '<textarea type="text" class="lg" name="conf_content[]">'. html_entity_decode($v['conf_content']) .'</textarea>';
                    break;

//       3 如果当前记录的类型是单选按钮 radio

//           1|开启,0|关闭====>
//            arr = [
//                0=>'1|开启'
//                1=>'0|关闭'
//            ]

//            $a = [
//                0=>1,
//                1=>'开启'
//            ]
//     1|开启 ====> <input type="radio" name="conf_content[]" value=" 1" checked="">开启
//      <input type="radio" name="conf_content[]" value="0">            关闭　
//
                case 'radio':
//                    $v['conf_contents'] =  '<input type="radio" name="conf_content[]" value=" 1" checked="">开启 <input type="radio" name="conf_content[]" value="0">            关闭　';


                  $arr =   explode(',', $v['field_value']);
//                    接收拼接后的字符串
                  $str = '';

                  foreach ($arr as $n){
                      $a =   explode('|',$n);
                      //1|开启、0|关闭 中哪一个 跟$v这条记录的conf_content的内容一致，一致的加checked
                      if($a[0] == $v->conf_content){
                          $str.= '<input type="radio" name="conf_content[]" value="'.$a[0].'" checked>'.$a[1];
                      }else{
                          $str.= '<input type="radio" name="conf_content[]" value="'.$a[0].'" >'.$a[1];
                      }

                  }

                    $v['conf_contents'] = $str;


                    break;

            }
        }




        // 返回网站配置列表页
        return view('admin.config.list',compact('data'));
    }

    //批量修改表单内容
    public function changeContent(Request $request)
    {
        $input = $request->all();



//        DB::transaction(function ()use($input) {
//            foreach ($input['conf_id'] as $k=>$v){
//                //找到要修改的网站配置表中的记录
//                $conf = Config::find($v);
//                $conf->update(['conf_content'=>$input['conf_content'][$k]]);
//            }
//        });


        DB::beginTransaction();

        try{
            foreach ($input['conf_id'] as $k=>$v){
                //找到要修改的网站配置表中的记录
                $conf = Config::find($v);
                $conf->update(['conf_content'=>$input['conf_content'][$k]]);
            }
        }catch (Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }


        DB::commit();

        return redirect('admin/config');



//        dd($input);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回添加页面
        return view('admin.config.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //接收传过来的参数
        $input = $request->except('_token');


        $res = Config::create($input);

        if($res){
        
            return redirect('admin/config');
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
        //
       $conf = Config::find($id);

        return view('admin.config.edit',compact('conf'));
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
        $input = $request->only('conf_name');
//        dd($input);

//        使用模型修改表记录的两种方法,方法一
        $conf = Config::find($id);
//        $user->user_name = $input['user_name'];
//        $res = $user->save();


//        方法二
        $res = $conf->update($input);

        if($res){


            return redirect('admin/config');
        }else{
            //如果添加失败，返回到修改页
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
        $res = Config::find($id)->delete();
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
