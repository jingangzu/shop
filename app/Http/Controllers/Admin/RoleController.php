<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{ 


    public function auth($id)
    {
//        根据id找到相关的用户U
        $role = Role::find($id);

//        获取所有的权限列表
        $pers = Permission::get();
        
        //获取当前角色已经拥有的权限列表
        $own_pers = $role->permission;
        
        //存放当前角色拥有的权限的id
        $own = [];
        foreach ($own_pers as $v){
            $own[] = $v->id;
        }
        return view('admin.role.auth',compact('role','pers','own'));
    }

    //处理用户授权操作

    public function doauth(Request $request)
    {
//        1. 获取传过来的参数（要授权的用户的ID，要授予的角色的ID）
        $input = $request->except('_token');
//         dd($input);

//        2. 提交到user_role这个关联表中
        //开启事务
        DB::beginTransaction();
        try{
            //删除当前角色的所有权限
            DB::table('role_permission')->where('role_id', $input['role_id'])->delete();
            if(!empty($input['permission_id'])){
                //关联表中记录（给角色授权）前，应该检查一下，当前角色是否已经拥有了此权限，如果没有再添加
                foreach ($input['permission_id'] as $v){

                    DB::table('role_permission')->insert(
                        ['role_id' => $input['role_id'], 'permission_id' => $v]
                    );
                }
            }
            DB::commit();

            return redirect('admin/role');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
      
//        3. 判断是否添加成功
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role = Role::get();

        return view('admin.role.list',compact('role'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.role.add');
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
         $input = $request->except('_token');
        $res = Role::create($input);


//         4. 判断是否添加成功
        if($res){
            //如果添加成功，跳转到列表页
            return redirect('admin/role')->with('msg','添加成功');
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
        $role =Role::where('id',$id)->first();
       // dd($role);
        return view ('admin.role.edit',['role'=>$role]);
    

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
      //  dd('1111');
     $role = $request->except('_token','_method');
    //dd($role);
    
      $id = $role['id'];
      unset($role['id']);
     $res =Role::where('id',$id)->update($role);
       
       if($res){
            
            return redirect('/admin/role')->with('msg','更新成功');
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

        $res = Role::find($id)->delete();
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
