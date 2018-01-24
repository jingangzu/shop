@extends('admin.common')
@section('title','商城后台商品分类页面')
@section('content')
<div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>商品分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{ url('/admin/cate/add')}}" class="actionBtn add">添加分类</a>商品分类</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
        <th width="120" align="left">排序</th>
        <th align="left">ID</th>
        <th align="center">分类名称</th>
        <th align="left" width="100">图片</th>
       <th  align="left" >标题</th>
       <th align="left"width="150" >关键字</th>
       
      
        <th align="left">操作</th>
     </tr>

    @foreach($cates as $k=>$v)
      <tr>
        <td align="left">
          <input type="text" onchange="changeOrder(this,{{ $v->cate_id }})" value="{{ $v->cate_order}}">
        </td>
        <td>{{ $v->cate_id }}</td>
        <td>{{ $v->catenames }}</td>
        <td align="center"><img width="80" src="/uploads/{{ $v->cate_pic }}"></td>
        <td align="center">{{ $v->cate_title }}</td>
        <td align="center">{{ $v->cate_keywords }}</td>
        
        
        <td align="center"><a href="{{ url('/admin/cate/edit/'.$v->cate_id) }}">编辑</a> 

        @if(empty($v->flag))
         <a href="javascript:;" onclick="delCate({{ $v->cate_id}})"> |删除</a>
        
      @endif
        </td>
     </tr>
     @endforeach
  
    </table>


    </div>
 </div>
 <div class="clear"></div>
 <script>
        function delCate(id){
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //向服务器发送ajax请求，删除当前id对应的用户数据
//                $.post('请求的路由','携带的参数','处理成功后的返回结果')
                $.post('{{ url('admin/cate/del/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
//                    data就是服务器返回的json数据
                   //console.log(data);
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


         //排序
        function changeOrder(obj,id){
//            获取当前文本框的值
              var v = $(obj).val();
//            $.post('路由','参数','执行后的返回结果')
            $.post('{{ url('admin/cate/changeOrder').'/' }}'+id,{'_token':"{{ csrf_token() }}",'cate_id':id,'cate_order':v},function(data){
               // console.log(data);
                if(data.status == 0){
//                    如果修改成功，给用户一个修改成功的提示，然后刷新页面
                    layer.msg(data.msg);

                    setTimeout(function(){
                        window.location.href = location.href;
                    },1000);
                }else{
                    layer.msg(data.msg);
                }
            })
        }
        
    </script>

 @endsection