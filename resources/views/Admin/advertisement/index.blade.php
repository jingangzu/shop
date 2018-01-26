 @extends('admin.common')

@section('content')
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>首页广告图</strong> </div>   <div class="mainBox imgModule">
 
    <h3>首页广告图</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
    <tr>
       <th>添加广告图</th>
       <th>广告图列表</th>
     </tr>
     <tr>
      <td width="350" valign="top">
       <form action="{{ url('/admin/advertisement/insert') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
         <tr>
          <td><b>广告图名称</b>
<input type="text" name="name" value="" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td><b>幻灯图片</b>
             @if (count($errors) > 0)
                              <div class="alert  alert-danger">
                                <ul>
                                  @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                              </div>
                              @endif
           <input type="file" name="img" class="inpFlie" />        
             </td>
         </tr>
         
         <tr>
          <td><b>价格</b>
<input type="text" name="price" value="50" size="20" class="inpMain" />
          </td>
        </tr>
        <tr>
          <td><b>简介</b>
<input type="text" name="summary" value="50" size="20" class="inpMain" />
          </td>
        </tr><tr>
          <td><b>排序</b>
<input type="text" name="sort" value="50" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td>
                      <input type="hidden" name="token" value="79db104d" />
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
         <td width="50">广告图名称</td>
         <td width="50">价格</td>
         <td width="50">简介</td>
         
         <td width="5" align="center">排序</td>
     
         <td width="50" align="center">操作</td>
        </tr>
        @foreach($data as $item)
                <tr>
         <td><img src="/uploa/{{ $item->img }}" width="100" /></a></td>
         <td>{{ $item->name }}</td>
         <td>{{ $item->price }}</td>
         <td>{{ $item->summary }}</td>
         <td><input type="text" onchange="changeOrder(this,{{ $item->id }})" value="{{ $item->sort }}"></td>
       
         <td align="center"><a href="{{url('admin/advertisement/edit')}}/{{$item->id}}">编辑</a> | <a href="{{url('admin/advertisement/delete')}}/{{$item->id}}">删除</a></td>
       
        @endforeach
               </table>
      </td>
     </tr>
    </table>
   </div>
 </div>
 <div class="clear"></div>
  //排序
  <script type="text/javascript">
        function changeOrder(obj,id){
//            获取当前文本框的值
              var v = $(obj).val();
//            $.post('路由','参数','执行后的返回结果')
            $.post('{{ url('/admin/advertisement/changeorder') }}',{'_token':"{{ csrf_token() }}",'id':id,'cate_order':v},function(data){
//                console.log(data);
                if(data.status == 0){
//                    如果修改成功，给用户一个修改成功的提示，然后刷新页面
                    layer.msg(data.msg);
                      // console.log(241);

                    setTimeout(function(){
                        window.location.href = location.href;
                    },3000);
                }else{
                    layer.msg(data.msg);
                }
            })
        }
    </script>
 @stop