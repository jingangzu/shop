@extends('admin.common')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere"><b>></b><strong>添加角色</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>角色权限</h3>
    
    <form action="{{ url('admin/role') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
  
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="table">
      <tr>
       <td width="80" align="right">角色名称</td>
       <td>
        <input type="text" name="role_name" placeholder="请输入角色名称" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">角色描述</td>
       <td>
        <input  type="text"  name="role_description"  placeholder="请输入角色权限"   size="40" class="inpMain" />
       </td>
      </tr>
    
       
     </table>
  <input type="submit" value="提交"  size="40" class="inpMain">
 
 </form>
   </div>
 <div class="clear"></div>
@stop