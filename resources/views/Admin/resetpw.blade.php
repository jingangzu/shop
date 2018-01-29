@extends('admin.common')

@section('content')
      
<div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere"><b>></b><strong>修改密码</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>修改密码</h3>
    
    <form action="/admin/doresetpw/{{ session('user')->id }}" method="post">
    {{ csrf_field() }}
     <input type="hidden" name="id" value="">
      
      {{--激活成功的提示--}}
            @if (!empty(session('msg')))
              <div class="alert alert-danger">
                <ul>
                  <li style="color:red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('msg') }}</li>
                </ul>
              </div>
            @endif
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
       <td width="80" align="right">原密码</td>
       <td>
        <input type="password" name="password" placeholder="原密码"  value="" size="40" class="inpMain" />
       </td>
      </tr>

      <tr>
       <td width="80" align="right">新密码</td>
       <td>
        <input type="password" name="newpassword" placeholder="新密码"  value="" size="40" class="inpMain" />
       </td>
      </tr>
      
        <tr>
       <td align="right">确认密码</td>
       <td>
        <input type="password" name="repassword"  placeholder="确认密码"  value="" size="40" class="inpMain" />
       </td>
      </tr>
       
     </table>
    <input type="submit" value="更新"  size="40" class="inpMain">

 </form>
   </div>
 <div class="clear"></div>

@stop

