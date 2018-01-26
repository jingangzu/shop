@extends('admin.common')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere"><b>></b><strong></strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>权限</h3>
    
     <form action="{{ url('admin/user/doauth') }}" method="post">
           {{csrf_field()}}
    <table width="100%" border="0"  cellpadding="8" cellspacing="0" class="table">
        <tbody>
                  <tr>
                        <th>用户名：</th>
                        <td>
                            {{ $user->name }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                        </td>
                    </tr>
                    <tr>
                        <th>角色列表</th>
                        <td>
                            @foreach($roles as $v)
                                {{--如果当前遍历的角色在当前用户拥有的角色列表中，复选框应该加选中状态--}}
                                @if(in_array($v->id,$own))
                                    <label for=""><input type="checkbox" name="role_id[]" checked value="{{ $v->id }}">{{ $v->role_name }}</label>
                                @else
                                    <label for=""><input type="checkbox" name="role_id[]" value="{{ $v->id }}">{{ $v->role_name }}</label>
                                @endif

                                    @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit"  class="inpMain" value="提交">
                            <input type="button" class="inpMain" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
  

 
 </form>
   </div>
 <div class="clear"></div>
@stop