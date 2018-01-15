<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>退款及退货</title>
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
        	<!--账户余额滴干活-->
            <div class="locfre">
            	<a href="#" class="zuliyesi">退款申请</a>
                <a href="#">退货申请</a>
                <a href="#">虚拟兑码退款</a>
            </div>    
            <div class="pipixia" style=" background:#FFF">
            	<tbody><tr>
        		<td>&nbsp;</td>
        		<th><i style=" font-size:14px">申请时间</i></th>
        		<td class="w240">
                	<input type="text" style=" border:1px solid #bbb; height:26px">&nbsp;–&nbsp;
                	<input type="text" style=" border:1px solid #bbb; height:26px">
                </td>
        		<th>
                	<select style=" border:1px solid #bbb; height:28px">
            			<option>订单编号</option>
            			<option>退款编号</option>
            			<option>商品名称</option>
          			</select>
                </th>
        		<td class="w160"><input type="text" style=" border:1px solid #bbb; line-height:26px"></td>
        		<td class="w70 tc">
                <label>
            		<input type="submit" value="搜索" style=" border:1px solid #bbb; line-height:24px">
          		</label>
                </td>
      </tr>
    </tbody>
            </div>    
            
            <script>
			$(function(){
				$(".locfre a").click(function(){
					$(this).addClass("zuliyesi").siblings().removeClass("zuliyesi")
					})
					$(".feifeidg").mouseenter(function(){
						$(this).css({background:"#0059a7"})
						})
					$(".feifeidg").mouseleave(function(){
						$(this).css({background:"#006DCC"})
						})
					$(".tutudg").mouseenter(function(){
						$(this).css({background:"#3a9d3a"})
						})
					$(".tutudg").mouseleave(function(){
						$(this).css({background:"#5BB75B"})
						})
					$(".paopaodg").mouseenter(function(){
						$(this).css({background:"#dd7200"})
						})
					$(".paopaodg").mouseleave(function(){
						$(this).css({background:"#fe8300"})
						})			
				})
            </script>
            
            <!--列表导航滴干活-->
            <div class="zhuzhuxia" style=" margin-top:10px">
            	<span>商品</span>
                <span>退款金额</span>
                <span>审核状态</span>
                <span>平台确认</span>
                <span>操作</span>
            </div>
            <!--一条列表开始-->
            <div class="zhuzhuxia" style=" background:#FAFAFA">
            	<em style=" padding-left:10px">退款编号：<s>255103160707091337</s></em>
                <em>申请时间：<s>2016-6-6&nbsp;14:46</s></em>
                <a href="#"><em style=" color:#09f">店铺：<s>帝云自营店</s></em></a>
                <a href="#"><em style=" color:#09f">QQ：<s>1285447957</s></em></a>
            </div>
            <div class="zhuzhuxia">
            	<span>
                	<p style=" color:#999">订单商品全部退款</p>
                    <p style=" color:#999">订单编号：<a href="#" class="yansb" style="color:#111">8000000000016201</a></p>
                </span>
                <span style=" line-height:58px; color:#999">100</span>
                <span style=" line-height:58px; color:#999">同意</span>
                <span style=" line-height:58px; color:#999">已完成</span>
                <span><a href="#" style=" line-height:58px; color:#111" class="yseal">查看</a></span>
            </div>
            <!--一条列表结束-->
            <!--一条列表开始-->
            <div class="zhuzhuxia" style=" background:#FAFAFA">
            	<em style=" padding-left:10px">退款编号：<s>255103160707091337</s></em>
                <em>申请时间：<s>2016-6-6&nbsp;14:46</s></em>
                <a href="#"><em style=" color:#09f">店铺：<s>帝云自营店</s></em></a>
                <a href="#"><em style=" color:#09f">QQ：<s>1285447957</s></em></a>
            </div>
            <div class="zhuzhuxia">
            	<span>
                	<a href="#"><p>利郎100%羊毛%羊毛薄款羊毛衫V领线衣</p></a>
                    <p style=" color:#999">订单编号：<a href="#" class="yansb" style="color:#111">8000000000016201</a></p>
                </span>
                <span style=" line-height:58px; color:#999">100</span>
                <span style=" line-height:58px; color:#999">同意</span>
                <span style=" line-height:58px; color:#999">已完成</span>
                <span><a href="#" style=" line-height:58px; color:#111" class="yseal">查看</a></span>
            </div>
            <!--一条列表结束-->
            <script>
				$(function(){
					$(".yansb").mouseenter(function(){
						$(this).css({color:"#f00"})
						});
					$(".yansb").mouseleave(function(){
						$(this).css({color:"#111"})
						})
					$(".yseal").mouseenter(function(){
						$(this).css({color:"#f00"})
						});
					$(".yseal").mouseleave(function(){
						$(this).css({color:"#111"})
						})		
					})
            </script>
        </div>
        <!--right结束-->
    </div>
    <!--详细列表结束-->
</div>
<!--个人中心结束-->
</body>
</html>
