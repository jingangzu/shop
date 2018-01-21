@extends('layouts.admin')
@section('title','商品分类修改页')
@section('content')
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
           @if(session('msg'))
            <h3>{{ session('msg') }}</h3>
            @endif
    <form action="{{ url('/admin/cate/update/'.$cate->cate_id) }}" method="post">
    
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">

    <input type="hidden" name="cate_id" value="{{ $cate->cate_id }}">
      <tr>
       <td width="80" align="right">分类名称</td>
       <td>
        <input type="text" name="cate_name" value="{{ $cate->cate_name }}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">标题</td>
       <td>
        <input type="text" name="cate_title" value="{{ $cate->cate_title }}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">关键字</td>
       <td>
        <input type="text" name="cate_keywords" value="{{ $cate->cate_keywords }}" size="40" class="inpMain" />
       </td>
      </tr>
      
      
      
     </table>
     <input  class="btn" type="submit" value="修改" />
    </form>
       </div>
 </div>
 @endsection