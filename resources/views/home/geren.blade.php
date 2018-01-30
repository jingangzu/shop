<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>提交支付</title>
<link rel="stylesheet" type="text/css" href="css/shangpingoumai.css">
<script src="js/city.js/jquery-1.11.3.min.js"></script>
</head>

<body>
<!--支付订单-->
<div class="tijiaozhifu">
	<!--标题-->
	<div class="zhifutt">
    	
    </div>
    <form action="{{ url('home/ordersub/geren') }}" method="get">
    <!--导航列表-->
    <div class="titijj">
     <span style=" width:290px">编号</span>
      <span style=" width:290px">订单号</span>
      <span style=" width:290px">商品图片</span> 
    <span style="width:290px">金额</span>
    <span style="width:290px">数量</span>
    <span style="width:290px">物流状态</span>
    </div>
    <!--各个订单列表-->
    <div class="titijj">
     @foreach($req as $k => $v)
      <span style=" width:290px; color:#999">  {{$v->id}}</span>
      <span style=" width:290px; color:#999">  {{$v->o_code}}</span>
        <span style="width:290px; color:#999">{{$v->goods->picture}}</span>
        <span style="width:290px; color:#999">{{$v->price}}</span>
        <span style="width:290px; color:#999">{{$v->num}}</span>
        <span style="width:290px; color:#999">           
        @if($v->ostate==0)
              待发货
        @elseif($v->ostate==1)
              已发货
        @endif</span>
    </div>
    <div class="titijj">
    	<span style=" width:290px; color:#999">8000000000009101</span>
        <span style="width:290px; color:#999">在线支付</span>
        <span style="width:290px; color:#999">￥384.00 ( 预存款已支付：￥35.00 )</span>
        <span style="width:290px; color:#999">快递</span>
    </div>
    <div class="titijj">
    	<span style=" width:290px; color:#999">8000000000009101</span>
        <span style="width:290px; color:#999">在线支付</span>
        <span style="width:290px; color:#999"></span>
        <span style="width:290px; color:#999">快递</span>
    </div>
    @endforeach
</div>
<!--确认提交并支付-->
</form>
<script>
$(function(){
	$(".xzbsni ul li").click(function(){
		$(this).addClass("plok").siblings().removeClass("plok")
		})
	})
</script>
</body>
</html>
    
