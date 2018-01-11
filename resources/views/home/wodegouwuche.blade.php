<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>我的购物车</title>
<link rel="stylesheet" type="text/css" href="/css/vipcenter.css">
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/public.js"></script>
</head>

<body>
<!--个人中心首页 -->
<div class="thetoubu">
	<!--头部-->
	<div class="thetoubu1">
    	<b>
        	<img src="/img/touxiang.png"/>
        </b>
        <em>czz1994612</em>
        <em>欢迎来到会员中心</em>
        <a href="#">地址管理</a>
        <a href="#">修改资料</a>
        <h5>账户安全</h5>
        <strong>低</strong>
        <span>
        	<p style=" width:27%"></p>
        </span>
        <a href="#">安全等级提升</a>
        <em style=" padding-right:2px">手机</em>
        <a href="#" style=" padding-left:2px; float:left; display:block; color:#f00" title="点击绑定">未绑定</a>
        
    </div>
    <!--详细列表-->
    <div class="xiangxilbnm">
    	<!--left-->
        <div class="liefyu">
        	<h2>交易管理</h2>
                <div class="conb">
                <a href="#">我的购物车</a>
                <a href="#">虚拟兑换订单</a>
                <a href="#">我的收藏</a>
                <a href="#">交易评价/晒单</a>
                <a href="#">账户余额</a>
                <a href="#">我的积分</a>
                <a href="#">我的代金卷</a>
                </div>
            <h2>客户服务</h2>
                <div class="conb">
                <a href="#">退款及退货</a>
                <a href="#">交易投诉</a>
                <a href="#">商品咨询</a>
                <a href="#">违规举报</a>
                <a href="#">平台客服</a>
                <a href="#">商家入驻</a>
                </div>
            <h2>资料管理</h2>
                <div class="conb">
                <a href="#">账户信息</a>
                <a href="#">账户安全</a>
                <a href="#">收货地址</a>
                <a href="#">我的消息</a>
                <a href="#">我的好友</a>
                <a href="#">我的足迹</a>
                <a href="#">第三方账号登录</a>
                <a href="#">分享绑定</a>
                </div>
        </div>
        <script type="text/javascript">
		$(function(){//第一步都得写这个
			$(".liefyu h2").click(function(){//获取title，并且让他执行下面的函数
			$(this)/*点哪个就是哪个*/.next(".conb")/*哪个标题下面的con*/.slideToggle()/*打开/折叠*/.siblings/*锁定同级元素*/(".con").slideUp()/*同级元素折叠起来*/
			})
		})
		</script>
        <!--right-->
        <div class="zuirifip">
        <!--lll-->
        	<div class="zuiriftp1">
            	<ul>
                	<li>
                        <span>账户余额</span>
                        <p>￥1000</p>
                    </li>
                    <li>
                    	<span>我的积分</span>
                        <p>1000</p>
                    </li>
                    <li>
                    	<span>我的优惠劵</span>
                        <p><s>2</s>张</p>
                    </li>
                    <li>
                    	<span>我的帝云币</span>
                        <p>0</p>
                    </li>
                </ul>
            </div>
        <!--lll-->
        	<div class="dfdaspjtk">
            	<span style=" display:block; float:left; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666">交易提醒</span>
            	<a href="#" style="color:#09f">待付款&nbsp;<s>1</s></a>
                <a href="#">待收货&nbsp;<s>1</s></a>
                <a href="#">待发货&nbsp;<s>1</s></a>
                <a href="#">待评价&nbsp;<s>1</s></a>
                <a href="#">交易历史&nbsp;<s>1</s></a>
            </div>
            <script>
			$(function(){
				$(".dfdaspjtk a").click(function(){
					$(this).css({color:"#09f"}).siblings().css({color:"#333"})
					})
				})
            </script>
        <!--所有列表-->
            <div class="sydlbdzz">
                <!--一个列表开始-->
                <div class="gzdlbdzzl">
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src="/img/img02.jpg"/></a>
                    </div>
                    <!--中-->
                    <div class="youstdongi">
                        <h5><a href="#" style=" color:#333;">中华老字号乌鸡白凤丸300粒</a>&nbsp;&nbsp;&nbsp;<a href="#" style="color:#333">我要咨询</a></h5>
                        <span>下单时间：2016-6-6&nbsp;14:08</span>
                        <span style=" color:#f00">订单状态：待付款</span>
                        <span>订单金额：<s style="color:#f00; font-weight:bold; font-size:14px">￥600</s>
                        <s style="color:#666; margin-left:10px">(1)件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">在线支付</s>
                        <a href="#" style="margin-left:10px">小明的店铺</a>
                        <a href="#" style="margin-left:10px">取消订单</a>
                        <a href="#" style="color:#F00; cursor:pointer; float:right">删除</a></span>
                    </div>
                    <!--右-->
                    <div class="quzhifubasb">
                        <a href="#">支付订单</a>
                    </div>
                    <!--右下-->
                    <div class="chakanxiangqingfg">
                    	<a href="#">查看详情</a>
                    </div>
                </div>
                <!--一个列表结束-->
                <!--一个列表开始-->
                <div class="gzdlbdzzl">
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src="/img/img02.jpg"/></a>
                    </div>
                    <!--中-->
                    <div class="youstdongi">
                        <h5><a href="#" style=" color:#333;">中华老字号乌鸡白凤丸300粒</a>&nbsp;&nbsp;&nbsp;<a href="#" style="color:#333">我要咨询</a></h5>
                        <span>下单时间：2016-6-6&nbsp;14:08</span>
                        <span style=" color:#f00">订单状态：待发货</span>
                        <span>订单金额：<s style="color:#f00; font-weight:bold; font-size:14px">￥600</s>
                        <s style="color:#666; margin-left:10px">(1)件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">支付宝</s>
                        <a href="#" style="margin-left:10px">小明的店铺</a>
                        <a href="#" style=" margin-left:10px">交易投诉</a>
                        
                        <a href="#" style="color:#F00; cursor:pointer; float:right">删除</a></span>
                    </div>
                    <!--右-->
                    <div class="quzhifubasb">
                        <a href="#">订单退款</a>
                    </div>
                    <!--右下-->
                    <div class="chakanxiangqingfg">
                    	<a href="#">查看详情</a>
                    </div>
                </div>
                <!--一个列表结束-->
                <!--一个列表开始-->
                <div class="gzdlbdzzl">
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src="/img/img02.jpg"/></a>
                    </div>
                    <!--中-->
                    <div class="youstdongi">
                        <h5><a href="#" style=" color:#333;">中华老字号乌鸡白凤丸300粒</a>&nbsp;&nbsp;&nbsp;<a href="#" style="color:#333">我要咨询</a></h5>
                        <span>下单时间：2016-6-6&nbsp;14:08</span>
                        <span style=" color:#09f">订单状态：待收货</span>
                        <span>订单金额：<s style="color:#f00; font-weight:bold; font-size:14px">￥600</s>
                        <s style="color:#666; margin-left:10px">(1)件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">支付宝</s>
                        <a href="#" style="margin-left:10px">小明的店铺</a>
                        <a href="#" style=" margin-left:10px">交易投诉</a>
                        <a href="#" style="color:#F00; cursor:pointer; float:right">删除</a></span>
                    </div>
                    <!--右-->
                    <div class="quzhifubasb">
                        <a href="#">确认收货</a>
                    </div>
                    <!--右下-->
                    <div class="chakanxiangqingfg">
                    	<a href="#">查看详情</a>
                    </div>
                </div>
                <!--一个列表结束-->
                <!--一个列表开始-->
                <div class="gzdlbdzzl">
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src="/img/img02.jpg"/></a>
                    </div>
                    <!--中-->
                    <div class="youstdongi">
                        <h5><a href="#" style=" color:#333;">中华老字号乌鸡白凤丸300粒</a>&nbsp;&nbsp;&nbsp;<a href="#" style="color:#333">我要咨询</a></h5>
                        <span>下单时间：2016-6-6&nbsp;14:08</span>
                        <span style=" color:#09f">订单状态：待评价</span>
                        <span>订单金额：<s style="color:#f00; font-weight:bold; font-size:14px">￥600</s>
                        <s style="color:#666; margin-left:10px">(1)件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">支付宝</s>
                        <a href="#" style="margin-left:10px">小明的店铺</a>
                        <a href="#" style=" margin-left:10px">交易投诉</a>
                        <a href="#" style=" margin-left:10px">退款退货</a>
                        <a href="#" style="color:#F00; cursor:pointer; float:right">删除</a></span>
                    </div>
                    <!--右-->
                    <div class="quzhifubasb">
                        <a href="#">我要评价</a>
                    </div>
                    <!--右下-->
                    <div class="chakanxiangqingfg">
                    	<a href="#">查看详情</a>
                    </div>
                </div>
                <!--一个列表结束-->
                <!--一个列表开始-->
                <div class="gzdlbdzzl">
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src="/img/img02.jpg"/></a>
                    </div>
                    <!--中-->
                    <div class="youstdongi">
                        <h5><a href="#" style=" color:#333;">中华老字号乌鸡白凤丸300粒</a>&nbsp;&nbsp;&nbsp;<a href="#" style="color:#333">我要咨询</a></h5>
                        <span>下单时间：2016-6-6&nbsp;14:08</span>
                        <span style=" color:#999">订单状态：已取消</span>
                        <span>订单金额：<s style="color:#f00; font-weight:bold; font-size:14px">￥600</s>
                        <s style="color:#666; margin-left:10px">(1)件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">在线付款</s>
                        <a href="#" style="margin-left:10px">小明的店铺</a>
                        <a href="#" style=" margin-left:10px">交易投诉</a>
                        <a href="#" style=" margin-left:10px">退款退货</a>
                        <a href="#" style="color:#F00; cursor:pointer; float:right">删除</a></span>
                    </div>
                    <!--右-->
                    <div class="quzhifubasb">
                        <a href="#">查看详情</a>
                    </div>
                </div>
                <!--一个列表结束-->
            </div> 
        <!--所有列表结束-->
        
        
        
            
        </div>
        <!--right结束-->
    </div>
    <!--详细列表结束-->
</div>
<!--个人中心结束-->
</body>
</html>
