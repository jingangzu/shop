@extends('admin.common')

@section('content')
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>订单管理</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    
    <div class="filter">
    <form action="{{ url('/admin/orders') }}" method="get">
     <input name="o_code" type="text" class="inpMain" value="{{ $where['o_code'] }}" size="20" />
     <input name="submit" class="btnGray"  type="submit" value="订单编号筛选" />
    </form>
    
    </div>
        <div id="list" class="pagination" >
    <form name="action" method="post" action="article.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="table">
     <tr>
    
      <th width="80" align="center">编号</th>
      <th width="180" align="left">订单编号</th>
      <th width="180" align="center">总价格</th>
      <th width="180" align="center">总数量</th>
      <th width="180" align="center">收货人</th>
      <th width="180" align="center">状态</th>
      <th width="180" align="center">操作</th>
     </tr>
     @foreach($req as $k => $v)
                    <tr class="">
                        <td class="">
                        {{$v->id}}
                        </td>
                        <td class=" ">
                        {{$v->o_code}}
                        </td>
                        <td class=" ">
                        {{$v->price}}
                        </td>
                         <td class=" ">
                        {{$v->num}}
                        </td>
                          <td class=" ">
                        {{$v->uname}}
                        </td>
                       <td >
        @if($v->ostate==0)
              待发货
        @elseif($v->ostate==1)
              已发货
        @endif</td>
                        
        <td class=" ">
             <a href="{{url('admin/orders/up').'/'.$v->id}}">
                  @if($v->ostate==0)
              <a href="{{url('admin/orders/up').'/'.$v->id}}">
                   待发货
                  @elseif($v->ostate==1)
             <a href="{{url('admin/orders/down').'/'.$v->id}}">
                  已发货
                  @endif

                  </a> 
                            <span class="btn-group">
                                <a href="/admin/orders/{{$v->id}}" class=""><i>详情</i></a>
                                
                            </span>
                              <a href="{{ url('admin/orders/'.$v->id.'/edit') }}" class=""><i>修改</i></a>
                                                          
                            <a href="javascript:;" onclick="delUser({{ $v->id }})" >
                                                             删除
                            </a>
                        </td>
                    </tr>
                @endforeach
         </table>
        <div class="clear"></div> 
        {!! $req->appends($where)->render() !!} 
    </form>
   
<script>
            function delUser(id){
                layer.confirm('您确定要删除吗？', {
                    btn: ['确定','取消']
                }, function(){


                    $.post('{{ url('admin/orders/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {


                        if(data.status == 0){
                            layer.msg(data.message, {icon: 6});
                            setTimeout(function(){
                                window.location.href = location.href;
                            },2000);


                        }else{
                            layer.msg(data.message, {icon: 5});


                            setTimeout(function(){
                                window.location.href = location.href;
                            },2000);
                        }


                    })


                }, function(){


                });
            }
</script>
    </div>
    <div class="clear"></div>
  
 </div>
 <div class="clear"></div>

 @stop

