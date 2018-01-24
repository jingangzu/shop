@extends('admin.common')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere"><b>></b><strong>添加角色</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>角色管理</h3>
    
    <form action="{{ url('/admin/role/'.$role->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{method_field('put')}}
     <input type="hidden" name="id" value="{{ $role->id }}">
     @if (count($errors) > 0 ) 
            <div class="alert alert-info">
                  <ul>
                       @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li> 
                      @endforeach
                  </ul>
            </div>
      @endif
      @if( session('info'))
            {{ session('info') }}

      @endif    
  
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="table">
      <tr>
       <td width="80" align="right">角色名称</td>
       <td>
        <input type="text" value="{{$role->role_name}}" name="role_name" placeholder="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">角色描述</td>
       <td>
        <input  type="text"  value="{{$role->role_description}}"  name="role_description"  placeholder="" size="40" class="inpMain" />
       </td>
      </tr>
    
       
     </table>
  <input type="submit" value="提交"  size="40" class="inpMain">
 
 </form>
   </div>
 <div class="clear"></div>
@stop