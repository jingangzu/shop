<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/lunbo.css">
    @section('style')

    @show
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script src="/js/public.js"></script>
</head>



<body>
<!--顶部菜单-->
<div class="dy1">
    <div class="dy2">
        <ul class="dy3">
            <li><a href="#">乐乐官网<br/>乐乐官网</a></li>
            <li><a href="#" id="diyunapp">商城APP<br/>商城APP</a></li>
        </ul>
        <a href="{{ url('/home/shopcar') }}" class="dy5">购物车</a>
        <ul class="dy4">
        @if(empty(session('inuser')))
            <li>
            <a href="/index/login">
            登录<br/>登录</a>
            </li>
            
            <li><a href="{{ url('/index/user/register') }}">注册<br/>注册</a></li>
            @else

            <li>
            <a href="#">{{ session('inuser')->name }}
            <br/>{{ session('inuser')->name }}
            </a>
            </li>


            <li>
                <a href="/index/user/personage">个人中心
                <br/>个人中心</a>
            </li>

            <li>
            <a href="index/user/loginout">退出<br>退出</a>
            </li>




    
            @endif
            
        </ul>
        <div class="dy6">
            <ul>
                <li>

                    <b><img src="/img/wxrzhuji.jpg"/></b>

                    <a href="#" class="dy7">外星人主机</a>
                    <a href="#" class="dy8">删除</a>
                </li>
                <li>

                    <b><img src="/img/gaoqingxianshiqi.jpg"/></b>

                    <a href="#" class="dy7">4k高清显示器</a>
                    <a href="#" class="dy8">删除</a>
                </li>
            </ul>
        </div>
        <div class="dy9">

            <img src="/img/phone.png"/>

        </div>
    </div>
</div>
<!--logo加时间加搜索框-->
<form action="/home/goods" method="post">

    <div class="dy10">
        <div class="dy11">

            <img src="/img/logo.png"/>
        </div>
        <div class="dy13">
            <embed src="/img/abcd.png" style=" height:45px; width:50px"></embed>

        </div>
        <div class="dy12">
            <input type="text" value="搜索商品/店铺" onFocus="if(value=='搜索商品/店铺') {value=''}" onBlur="if (value=='') {value='搜索商品/店铺'}" style="width:500px; height:36px; text-indent:12px; font-size:12px; color:#666; float:left">
            <input type="search" value="搜索" style=" cursor:pointer; width:70px; height:36px; float:right; text-align:center; background:#333;" class="shousuo">
        </div>
    </div>
</form>
<!--全部商品分类-->
<div class="qbspfl">
    <div class="djfl">
        全部商品分类
    </div>
    <div class="morelist">
        <a href="#A"> 手机 </a>
        <a href="#B"> 电脑 </a>
        <a href="#C"> 热门 </a>
        <a href="#D"> 活动 </a>
        <a href="#E"> 好好 </a>
        <a href="#F">友情链接</a>
    </div>
</div>
@section('content')

@show

<!-- //友情链接 -->
<!-- //锚点 -->
<a id="F"></a>
<div style="height:100px;">
    @foreach($link as $v)
    <div style="float:left;width:5px;height:100px"></div>
        <div style="float:left;width:200px;height:100px"><a href="{{ $v->url }}" target='_blank'><img src="/linkpic/{{$v->image}}" width="100%" height="100%"></a></div>
        <div style="float:left;width:5px;height:100px"></div>

    @endforeach
    
</div>





<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;text-decoration:none;}
body{font:12px/180% Arial, Helvetica, sans-serif ,"新宋体";}
p{margin:0px;padding:0px;line-height:20px;}
i{margin:0px;padding:0px;font-style:normal;}
ul{margin:0px;padding:0px;list-style:none;}
ul li{margin:0px;padding:0px;list-style:none;}
a{color:#333333;text-decoration:none;}
a:hover{color:#ff5a00;text-decoration:none;}
.clear{clear:both;font-size:0px;line-height:0;height:0;}

@font-face {
    font-family: 'icomoon';
    src:url('/index/chat/fonts/icomoon.eot?qradjf');
    src:url('/index/chat/fonts/icomoon.eot?qradjf#iefix') format('embedded-opentype'),
        url('/index/chat/fonts/icomoon.ttf?qradjf') format('truetype'),
        url('/index/chat/fonts/icomoon.woff?qradjf') format('woff'),
        url('/index/chat/fonts/icomoon.svg?qradjf#icomoon') format('svg');
    font-weight: normal;
    font-style: normal;
}
.demo-icon{
  font-family:"icomoon";
  font-style:normal;
  font-weight:normal;
  speak:none;
  display:inline-block;
  text-decoration:inherit;
  text-align:center;
  font-variant:normal;
  text-transform:none;
  font-size:24px;
  -webkit-font-smoothing:antialiased;
  -moz-osx-font-smoothing:grayscale;
  line-height:24px;
  color:#999; 
}

/*new right*/
.cndns-right{position:fixed;right:1px;top:50%;margin-top:-100px;z-index:100}
.cndns-right-meau{position:relative;}
.cndns-right-btn{width:48px;height:48px;border:1px solid #ddd;text-align:center;display:block;margin-bottom:6px;position:relative;background-color:#fff}
.cndns-right-btn span{color:#848484;font-size:26px;line-height:48px;}
.cndns-right-btn sup{display:block;min-width:24px;height:24px;text-align:center;line-height:24px;color:#fff;border-radius: 50%;background-color:#ff6800;position:absolute;left:-12px;top:-12px;}
.cndns-right-btn p{color:#ff6800;font-size:14px;line-height:18px;padding-top:5px;display:none;}
.cndns-right-meau:hover .cndns-right-btn span{display:none}
.cndns-right-meau:hover .cndns-right-btn p{display:block;}
.meau-car .cndns-right-btn {border-color:#ff6800;margin-bottom:20px;}
.meau-car.cndns-right-meau:hover .cndns-right-btn{background-color:#ff6800}
.meau-car.cndns-right-meau:hover .cndns-right-btn span{color:#fff;display:block;}
.meau-car .cndns-right-btn span{color:#ff6800;}
.meau-sev .cndns-right-btn{border-color:#ff6800;background:url(/index/chat/images/02index-banner-8.gif) no-repeat #ff6800 center;} 
.meau-sev .cndns-right-btn p{color:#fff}
.meau-sev .cndns-right-btn span{color:#fff}
.meau-top .cndns-right-btn span{font-size:12px;line-height:12px;padding-top:10px;display:block}
.meau-top .cndns-right-btn i{display:block;color:#999}
.meau-top.cndns-right-meau:hover .cndns-right-btn{background-color:#ff6800}
.meau-top.cndns-right-meau:hover .cndns-right-btn span{display:block;color:#fff} 
.meau-top.cndns-right-meau:hover .cndns-right-btn i{color:#fff;}
.cndns-right-box{position:absolute;top:-15px;right:48px;padding-right:25px;display:none;}
.cndns-right-box .box-border{border:1px solid #ccc;border-top:4px solid #ff6800;padding:20px;background-color:#fff;-webkit-box-shadow: 0 3px 8px rgba(0,0,0,.15);-moz-box-shadow: 0 3px 8px rgba(0,0,0,.15);box-shadow: 0 3px 8px rgba(0,0,0,.15);position:relative}
.cndns-right-box .box-border .arrow-right{display:block;width:13px;height:16px;background:url(/index/chat/images/arrow.png) no-repeat;position:absolute;right:-13px;top:26px;}
.cndns-right-box .box-border .sev-t span{font-size:42px;float:left;display:block;line-height:56px;margin-right:20px;color:#d3d3d3}
.cndns-right-box .box-border .sev-t p{float:left;color:#ff6800;font-size:24px;line-height:28px;}
.cndns-right-box .box-border .sev-t p i{display:block;font-size:14px;color:#aaa;}
.cndns-right-box .box-border .sev-b{padding-top:15px;margin-top:15px;border-top:1px solid #e4e4e4}
.cndns-right-box .box-border .sev-b h4{color:#666;font-size:14px;font-weight:normal;padding-bottom:15px;}
.cndns-right-box .box-border .sev-b li{float:left;width:33.33333%}
.cndns-right-box .box-border .sev-b li a{display:inline-block;color:#999;font-size:13px;padding-left:43px;background:url(/index/chat/images/q1.gif) no-repeat left 3px;line-height:36px;}
.cndns-right-box .box-border .sev-b li a:hover{color:#ff6800}
.meau-sev .cndns-right-box .box-border{width:430px;}
.meau-contact .cndns-right-box .box-border{width:230px;}
.cndns-right-meau:hover .cndns-right-box{display:block}
.meau-code .cndns-right-box{top:inherit;bottom:-35px;}
.meau-code .cndns-right-box .box-border{width:156px;text-align:center;border-top:1px solid #ccc;}
.meau-code .cndns-right-box .box-border i{display:block;color:#f66e06;font-size:16px;line-height:16px;}
.meau-code .cndns-right-box .box-border .arrow-right{top:inherit;bottom:50px;}
.meau-sev .cndns-right-btn .demo-icon{display:none;}
.meau-sev:hover .cndns-right-btn{background:#ff6800}
.meau-zs .cndns-right-btn{background-color:#ff6800;color:#fff;margin-top:80px;border-color:#ff6800}
.meau-zs .cndns-right-btn span{color:#fff}
.meau-zs .cndns-right-btn p{color:#fff}
</style>

<!--右侧-->
<div class="cndns-right">
    <div class="cndns-right-meau meau-car">
        <a href="#" class="cndns-right-btn">
            <span class="demo-icon">&#xe900;</span>
            <sup>0</sup>
        </a>
    </div>
    <div class="cndns-right-meau meau-sev">
        <a href="javascript:" class="cndns-right-btn">
            <span class="demo-icon">&#xe901;</span>
            <p>
                在线<br />
                客服
            </p>
        </a>
        <div class="cndns-right-box">
            <div class="box-border">
                <div class="sev-t">
                    <span class="demo-icon">&#xe901;</span>
                    <p><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=891907263&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:891907263:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a><i>服务时间：9:00-24:00</i></p>
                    <div class="clear"></div>


                    
                </div>
                <div class="sev-b">
                    <h4>选择下列产品马上在线沟通：</h4>
                    <ul id="zixunUl">
                        
                        <li><a href="javascript:void(0);">生活服务</a></li>
                        
                        <li><a href="javascript:void(0);">电子产品</a></li>
                        <li><a href="javascript:void(0);">母婴保健</a></li>

                        <div class="clear"></div>
                    </ul>
                </div>
                <span class="arrow-right"></span>
            </div>
        </div>
    </div>
    <div class="cndns-right-meau meau-contact">
        <a href="javascript:" class="cndns-right-btn">
            <span class="demo-icon">&#xe902;</span>
            <p>
                客服<br />
                热线
            </p>
        </a>
        <div class="cndns-right-box">
            <div class="box-border">
                <div class="sev-t">
                    <span class="demo-icon">&#xe902;</span>
                    <p>400-920-9933<br /><i>7*24小时客服服务热线</i></p>
                    <div class="clear"></div>
                </div>
                <span class="arrow-right"></span>
            </div>
        </div>
    </div>
    <div class="cndns-right-meau meau-code">
        <a href="javascript:" class="cndns-right-btn">
            <span class="demo-icon">&#xe903;</span>
            <p>
                关注<br />
                微信
            </p>
        </a>
        <div class="cndns-right-box">
            <div class="box-border">
                <div class="sev-t">
                    <img src="/index/chat/images/02index-2.jpg" />
                    <i>关注官方微信</i>
                </div>
                <span class="arrow-right"></span>
            </div>
        </div>
    </div>
    <div class="cndns-right-meau meau-top" id="top-back">
        <a href="javascript:" class="cndns-right-btn" onclick="topBack()">
            <span class="demo-icon">&#xe904;</span>
            <i>顶部</i>
        </a>
    </div>

</div>

<script type="text/javascript" src="/index/js/jquery.min.js"></script>
<script type="text/javascript">
//置顶图标显示
$('#top-back').hide()
$(window).scroll(function(){
     if($(this).scrollTop() > 350){
        $("#top-back").fadeIn();
     }
     else{
        $("#top-back").fadeOut();
     }
  })    
//置顶事件
function topBack(){
  $('body,html').animate({scrollTop:0},300);
}
</script>




<!--页脚-->
<!--footer-->
<div class="footer">
    <div class="box" style=" width:1226px; margin:0 auto">
        <ul class="lian">
            <li>

                <p><img src="/img/fot.png">新手指南</p>

                <a href="#">账户注册</a>
                <a href="#">购物流程</a>
                <a href="#">网站地图</a>
            </li>
            <li>

                <p><img src="/img/fot1.png">支付方式</p>

                <a href="#">货到付款</a>
                <a href="#">在线支付</a>
                <a href="#">礼品卡及账户余额</a>
                <a href="#">其他支付方式</a>
            </li>
            <li>

                <p><img src="/img/fot2.png">配送说明</p>

                <a href="#">配送运费</a>
                <a href="#">配送时间</a>
            </li>
            <li>

                <p><img src="/img/fot3.png">售后服务</p>

                <a href="#">退换货政策</a>
                <a href="#">退换货办理流程</a>
                <a href="#">退换货网上办理</a>
                <a href="#">退款说明</a>
            </li>
            <li>

                <p><img src="/img/fot4.png">关于我们</p>
                <a href="#">公司简介</a>
                <a href="#">合作专区</a>
                <a href="#">联系我们</a>
            </li>
            <li>
                <p><img src="/img/fot5.png">帮助中心</p>

                <a href="#">找回密码</a>
                <a href="#">邮件订阅</a>
                <a href="#">产品册订阅</a>
                <a href="#">隐私声明</a>

               
            </li>
        </ul>
        <ul class="adv">
            <li><img src="/img/adv.png">正品保障</li>
            <li><img src="/img/adv1.png">免运费</li>
            <li><img src="/img/adv2.png">送货上门</li>
            <li style="border-right:none;"><img src="/img/adv3.png">实物拍摄</li>
        </ul>
        <div>
        <p class="ad">地址山东省济南市历下区历山北路 &nbsp;&nbsp;&nbsp;邮箱：xgm@8and9.com.cn &nbsp;&nbsp;&nbsp;邮编:210008 &nbsp;&nbsp;&nbsp;电话:025-83218155         </p>

        <p class="ad">Copyright © 2010 - 2013, 版权所有 SHUIGUO.COM &nbsp;&nbsp;&nbsp;苏ICP备10088888号-1     &nbsp;&nbsp;&nbsp;&nbsp;  <a href="/youqinglianjie.html" class="ad">友情链接</a></p>
        <div>
        
    </div>
</div>

</body>
</html>

