<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\orders;
use App\Model\ordersinfo;
use App\Model\User;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 
       $o_code = $request->input('o_code', '');
        $req = orders::where('o_code','like','%'.$o_code.'%')->paginate(5);
        return view ('admin.orders.index',['req'=>$req,'where'=>['o_code'=>$o_code]]);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //在  5+
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
     
      $res= orders::find($id)->o_code;
      $data = ordersinfo::with('orgoods','oraddress','user','order')->where('o_code',$res)->first();
      

   // dd($data);
        return view('Admin.orders.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       //dd(111);
     $data =orders::where('id',$id)->first();
       //$order = ordersinfo::where('id',$id)->first();
         return view ('admin.orders.edit',compact('data'));
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
        
       // dd(111);
          $data = $request->except('_token','_method');
          //dd($data);
         $id = $data['id'];
         unset($data['id']);
        $res =orders::where('id',$id)->update($data);
       
       if($res){
            
            return redirect('/admin/orders')->with('msg','更新成功');
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

        $res = orders::where('id',$id)->delete();

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

    //已发货
    public function up($id,$ostate=1)
    {
        orders::where('id',$id)->update(['ostate'=>$ostate]);
        return redirect('/admin/orders');

    }
 //代发货
    public function down($id)
    {
       orders::where('id',$id)->update(['ostate'=>0]);
        return redirect('/admin/orders');

    }
    
}
