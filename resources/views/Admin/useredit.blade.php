@extends('admin.common')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere"><b>></b><strong>修改用户</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>编辑用户</h3>
    
    <form action="{{ url('/admin/users/'.$data->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{method_field('put')}}
     <input type="hidden" name="id" value="{{ $data->id }}">
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
       <td width="80" align="right">用户名</td>
       <td>
        <input type="text" name="name" placeholder="请输入用户名"  value="{{ $data->name }}" size="40" class="inpMain" />
       </td>
      </tr>
      
        <tr>
       <td align="right">邮箱</td>
       <td>
        <input type="text" name="email"  placeholder="请输入邮箱"  value="{{ $data->email }}" size="40" class="inpMain" />
       </td>
      </tr>
       <tr>
       <tr>
       <td align="right">手机号</td>
       <td>
       <input type="text" name="phone" placeholder="请输入手机号"  value="{{ $data->phone }}" size="40" class="inpMain" />
       </td>
      </tr>
       <tr>
   <td align="right">原始头像</td>
       <td>
            <img width="80" src="/uploads/{{ $data->avatar }}">         
      </td>
      </tr>
       <tr>
    <td align="right">新头像</td>
       <td>
        <input type="file" name="avatar" placeholder="" size="40" class="inpMain" />       </td>
      </tr>
     <td align="right">权限</td>
       <td>
        <input type="text" name="auth" value="" placeholder="输入权限" size="40" class="inpMain" />
       </td>
      </tr>
       
     </table>
  <input type="submit" value="更新"  size="40" class="inpMain">
 
 </form>
   </div>
 <div class="clear"></div>
@stop