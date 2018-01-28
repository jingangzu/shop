@extends('admin.common')

@section('content')
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>订单详情</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    
   <h3>订单详情</h3>
<form action="" method='post'>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic" >
        <tr>
            <th>ID</th>
            <th>订单号</th>
            <th>订单用户</th>
            <th>联系电话</th>
            <th>订单商品</th>
            <th>收货地址</th>
            <th>订单生成时间</th>
            <th>支付时间</th>
            <th>发货时间</th>
            <th>完成时间</th>
            <th>支付单号</th>
            <th>订单状态</th>
            <!-- <th>操作</th> -->
        </tr>
       
         @foreach($data->orgoods as $k=>$v)
           
        <tr>
            
            <td>{{$data->id}}</td>
            <td>{{$data->o_code}}</td>
            <td>{{$data->order->uname}}</td>
            <td>{{$data->user->phone}}</td>
            <td>{{ $v->goods_name}}</td>
            <td>{{$data->oraddress->address}}</td>
            <td>{{$data->ord_time = date('Y-m-d H:i:s')}}</td>
            <td>{{$data->pay_time = date('Y-m-d H:i:s')}}</td>
            <td>{{$data->mat_time = date('Y-m-d H:i:s')}}</td>
            <td>{{$data->complete = date('Y-m-d H:i:s')}}</td>
            <td>{{$data->pay_id}}</td>
            <td>{{$data->ostate}}</td>
          <td align="center">
        <!-- <a href="{{ url('/admin/orders/'.$data->id.'/edit')}}">修改</a> -->
          </td>
        </tr>
        @endforeach
    </table>
   
    </form>
</form>
<br><br>
<a href="/admin/orders" class="inpMain"><button>返回</button></a>
    
<br><br><br>
<br><br><br><br><br><br><br><br><br>
 @stop

