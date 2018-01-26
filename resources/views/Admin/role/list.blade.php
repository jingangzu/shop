@extends('admin.common')

@section('content')
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong></strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
  <h3> 角色列表</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="table">
     <tr align="center">
      <th width="30" >ID</th>
      <th >角色名称</th>
      <th >角色描述</th>
      <th >操作</th>
     </tr>
         
          @foreach($role as $k=>$v)
                    <tr>
                        <td align="center">{{ $v->id }}</td>
                        <td>
                             {{ $v->role_name }}
                        </td>
                        <td >{{ $v->role_description }}</td>

                        <td>
                            <a href="{{ url('admin/role/'.$v->id.'/edit') }}">修改</a>
                            <a href="{{ url('admin/role/auth/'.$v->id) }}">授权</a> 
                            <a href="javascript:;" onclick="delUser({{ $v->id }})">删除</a>
                        </td>
                    </tr>
          @endforeach    
         </table>
             <script>
        function delUser(id){
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //向服务器发送ajax请求，删除当前id对应的用户数据
//                $.post('请求的路由','携带的参数','处理成功后的返回结果')
                $.post('{{ url('admin/role/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
//                    data就是服务器返回的json数据
//                    console.log(data);
//                    JSON.parse()
//                    JSON.stringify()
                    if(data.status == 0){
                        layer.msg(data.message, {icon: 6});
                        setTimeout(function(){
                            window.location.href = location.href;
                        },1000);


                    }else{
                        layer.msg(data.message, {icon: 5});

                        window.location.href = location.href;
                    }

                })

//
            }, function(){

            });
        }
    </script>

                       </div>
 </div>
   版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
  </ul>
 </div>
</div><!-- dcFooter 结束 -->
<div class="clear"></div> </div>
</body>
 <div class="clear"></div>
@stop