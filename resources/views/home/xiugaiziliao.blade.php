<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>修改资料</title>
<link rel="stylesheet" type="text/css" href="/css/vipcenter.css">
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/city.js/cityJson.js"></script>
<script src="/js/city.js/citySet.js"></script>
<script src="/js/city.js/Popt.js"></script>
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
                <a href="#">实物交易订单</a>
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
        	<!--基本信息-->
            <div class="basedexinxi">
            	<a href="#">基本信息</a>
            </div>
            <!--基本信息结束-->
            <!--修改基本信息开始-->
            <div class="baseopxg">
            	<!--第一部分-->
                <div class="tirstbf">
                	<span>
                    	<img src="/img/6a0bf347jw8er5bdo5q8zj20u00rz7a9.jpg"/>
                        <a href="#">编辑头像</a>
                    </span>
                    <em>用户名：</em>
                    <input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; margin-top:65px" type="text" class="shuru" placeholder="czz1994612" required />
                </div>
                <!--第二部分-->
                <div class="thetwobf">
                	<em>真实姓名：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru" placeholder="王大宝" required />
                </div>
                <div class="thetwobf">
                	<em>昵称：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru" placeholder="部落猪" required />
                </div>
                <div class="thetwobf">
                	<em>性别：</em>
                    <input type="radio" name="sex" style=" float:left; display:block; width:13px; height:13px; margin-top:9px"><span>男</span>
                    <input type="radio" name="sex" style=" float:left; display:block; width:13px; height:13px; margin-top:9px"><span>女</span>
                    <input type="radio" name="sex" style=" float:left; display:block; width:13px; height:13px; margin-top:9px"><span>保密</span>
                </div>
                <div class="thetwobf">
                	<em>电话：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru" placeholder="15554465535" required />
                </div>
                <div class="thetwobf">
                	<em>邮箱：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:160px" type="text" class="shuru" placeholder="1285447957@qq.com" required />
                </div>
                <div class="thetwobf">
                	<em>出生日期：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:160px" type="text" class="shuru" placeholder="1994-6-8" required />
                </div>
                <div class="thetwobf">
                	<em>居住地址：</em><input type="text" id="city" value="点击选择地区"/ style=" height:28px; font-size:12px; border:1px solid #bbb; float:left">
                    <script type="text/javascript">
						$("#city").click(function (e) {
						SelCity(this,e);
						});
					</script>
                    <em style=" width:60px">街道：</em>
                    <input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:420px" type="text" class="shuru" placeholder="山东省济南市历下区黄台电子商务产业园3030室" required />
                </div>
                <div class="thetwobf">
                	<em>验证码：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:160px" type="text" class="shuru"/>
                    <img src="/img/ybjsadz.jpg"/ style=" float:left; width:100px; height:30px; display:block; margin-left:10px">
                    <em style=" width:50px">换一张</em>
                </div>
                <div class="thetwobf">
                	<a href="#" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px">保存</a>
                </div>
            </div>	
            <!--修改基本信息结束-->
        </div>
        <!--right结束-->
    </div>
    <!--详细列表结束-->
</div>
<!--个人中心结束-->

</body>
</html>        
                
                       
             
            
