@extends('admin.common')
@section('title','商品添加页')
@section('content')
<div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="{{ url('/admin/cate/list') }}" class="actionBtn">商品分类</a>添加分类</h3>
    <form action="{{ url('admin/cate') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      
      
     
       <td align="right">父级分类</td>
       <td>
                      <select name="cate_pid">
                          <option value="0">==顶级分类==</option>

                          @foreach($cateone as $k=>$v)
                          <option value="{{ $v->cate_id }}">{{ $v->cate_name }}</option>
                 
                          @endforeach          
                      </select>
       </td>
      </tr>
      <tr>
       <td width="80" align="right">分类名称</td>
       <td>
        <input type="text" name="cate_name" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
   <td align="right">分类图片</td>
       <td>
        <input type="file" name="cate_pic" placeholder="" size="40" class="inpMain" />       </td>
      </tr>
      <tr>
       <td align="right">标题</td>
       <td>
        <input type="text" name="cate_title" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">关键字</td>
       <td>
        <textarea name="cate_keywords" cols="60" rows="4" class="textArea"></textarea>
       </td>
      </tr>
      <tr>
       <td align="right">排序</td>
       <td>
        <input type="text" name="cate_order" value="50" size="5" class="inpMain" />
       </td>
      </tr> 
      
      
     </table>
     <input  class="btn" type="submit" value="提交" />
    </form>
       </div>
 </div>
 @endsection