@extends('admin.common')

@section('content')
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>用户管理</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{url('/admin/users/create')}}" class="actionBtn add">添加用户</a>用户管理</h3>
    <div class="filter">
    <form action="{{ url('/admin/users') }}" method="get">
     <input name="name" type="text" class="inpMain" value="{{ $where['name'] }}" size="20" />
     <input name="submit" class="btnGray" type="submit" value="用户名筛选" />
    </form>
    
    </div>
        <div id="list" class="pagination" >
    <form name="action" method="post" action="article.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
   
      <th width="40" align="center">编号</th>
      <th width="80" align="left">姓名</th>
      <th width="80" align="center">邮箱</th>
      <th width="80" align="center">密码</th>
      <th width="80" align="center">电话</th>
      <th width="100" align="center">头像</th>
      <th width="80" align="center">添加时间</th>
      <th width="80" align="center">修改时间</th>
      <th width="80" align="center">操作</th>
     </tr>
     @foreach($data as $item)
     <tr>
      <td align="center">{{$item->id}}</td>
      <td align="center">{{$item->name}}</td>
      <td align="center">{{$item->email}}</td>
      <td align="center">{{$item->password}}</td>
      <td align="center">{{$item->phone}}</td>
      <td align="center"><img width="60" src="/uploads/{{$item->avatar}}"></td>
      <td align="center">{{$item->created_at}}</td>
      <td align="center">{{$item->updated_at}}</td>
      <td align="center">
        <a href="{{ url('/admin/users/'.$item->id.'/edit')}}">编辑</a> 
      <a href="{{ url('admin/user/auth/'.$item->id) }}">授权</a>
      <a href="javascript:;" onclick="delUser({{ $item->id }})">删除</a>
          </td>
     </tr>
     @endforeach
         </table>
        <div class="clear"></div> {!! $data->appends($where)->render() !!} 
    </form>


    <script>
        function delUser(id){
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //向服务器发送ajax请求，删除当前id对应的用户数据
                $.post('{{ url('admin/users/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
    <div class="clear"></div>
  
 </div>
 <div class="clear"></div>

 @stop

