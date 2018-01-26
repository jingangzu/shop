@extends('admin.common')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere"><b>></b><strong>添加用户</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>添加用户</h3>
            <!-- <a href="/admin/role/doauth">vrgergerf<a> -->
    
     <form action="{{ url('/admin/role/doauth') }}" method="post">
           {{csrf_field()}}
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="table">
        <tbody>
              <tr>
                        <th>角色名：</th>
                        <td>
                            {{ $role->role_name }}
                            <input type="hidden" name="role_id" value="{{ $role->id }}">
                        </td>
                    </tr>
                    <tr>
                        <th>权限列表：</th>
                        <td>
                            @foreach($pers as $v)
                        <!--         {{--如果当前遍历的角色在当前用户拥有的角色列表中，复选框应该加选中状态--}} -->
                                @if(in_array($v->id,$own))
                                    <label for=""><input type="checkbox" name="permission_id[]" checked value="{{ $v->id }}">{{ $v->permission_name }}</label>
                                @else
                                    <label for=""><input type="checkbox" name="permission_id[]" value="{{ $v->id }}">{{ $v->permission_name }}</label>
                                @endif

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
 
 </form>



   </div>
 <div class="clear"></div>
@stop