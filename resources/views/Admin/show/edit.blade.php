 @extends('admin.common')

@section('content')
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>首页轮播图</strong> </div>   <div class="mainBox imgModule">
 
    <h3>首页轮播图</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
    <tr>
       <th>修改轮播图</th>
       <th>轮播图列表</th>
     </tr>
     <tr>
      <td width="350" valign="top">
       <form action="{{ url('/admin/show/update') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
         <tr>
          <td><b>轮播图名称</b>
<input type="text" name="name" value="{{ $data->name }}" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td><b>轮播图片</b>
             @if (count($errors) > 0)
                              <div class="alert  alert-danger">
                                <ul>
                                  @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                              </div>
                              @endif
           <input type="file" name="img" class="inpFlie"  />          </td>
         </tr>
         
         <tr>
          <td><b>排序</b>
<input type="text" name="sort" value="{{ $data->sort }}" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td>
                      <input type="hidden" name="id" value="{{$data->id}}" />
           <input  class="btn" type="submit" value="提交" />
          
          </td>
         </tr>
        </table>
       </form>
      </td>
      <td valign="top">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
        <tr>
          <td width="100">图片</td>
         <td width="100">轮播图名称</td>
         
         <td width="50" align="center">排序</td>
         <td width="50" align="center">状态</td>
         <td width="80" align="center">操作</td>
        </tr>
       
                <tr>
         <td><img src="/uploads/{{ $data->img }}" width="100" /></a></td>
         <td>{{ $data->name }}</td>
         <td align="center">{{ $data->sort }}</td>
         <td align="center">@if($data->status == 1) 禁用 @else 启用 @endif </td>
         <td align="center"><a href="{{url('admin/show/edit')}}/{{$data->id}}">编辑</a> | <a href="{{url('admin/show/delete')}}/{{$data->id}}">删除</a></td>
          </td>
     </tr>
     <tr><td>
        <form action="{{ url('/admin/show/index') }}" method="get" enctype="multipart/form-data">
           <input  class="btn" type="submit" value="添加" />
        </form>
       </td></tr>
               </table>
       
     
     
    </table>
   </div>
 </div>
 <div class="clear"></div>
 @stop