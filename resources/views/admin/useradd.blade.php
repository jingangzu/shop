@extends('admin.common')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere"><b>></b><strong>添加用户</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>添加用户</h3>
    
    <form action="{{ url('/admin/users') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
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
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="80" align="right">用户名</td>
       <td>
        <input type="text" name="name" placeholder="请输入用户名"  value="{{old('name') }}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">密码</td>
       <td>
        <input  type="password"  name="password"  placeholder="请输入密码"  value="{{old('password') }}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">确认密码</td>
       <td>
        <input type="password" name="re-password" placeholder="请输入确认密码"  value="{{old('re-password') }}" size="40" class="inpMain" />
       </td>
      </tr>
        <tr>
       <td align="right">邮箱</td>
       <td>
        <input type="text" name="email"  placeholder="请输入邮箱"  value="{{old('email') }}" size="40" class="inpMain" />
       </td>
      </tr>
       <tr>
       <tr>
       <td align="right">手机号</td>
       <td>
       <input type="text" name="phone" placeholder="请输入手机号"  value="{{old('phone') }}" size="40" class="inpMain" />
       </td>
      </tr>
       <tr>
   <td align="right">头像</td>
       <td>
        <input type="file" name="avatar" placeholder="" size="40" class="inpMain" />       </td>
      </tr>
     <td align="right">权限</td>
       <td>
        <input type="radio" name="auth" value="1" >超级管理员
        <input type="radio" name="auth" value="2"  >普通管理员
        <input type="radio" name="auth" value="3"  >后台用户
       </td>
      </tr>
       
     </table>
  <input type="submit" value="提交"  size="40" class="inpMain">
 
 </form>
   </div>
 <div class="clear"></div>
@stop