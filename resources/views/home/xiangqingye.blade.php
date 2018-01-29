@extends('home.header')

@section('title','详情页')

@section('style')
<link rel="stylesheet" type="text/css" href="/css/top.css"/>
<link rel="stylesheet" type="text/css" href="/css/zhanshi.css">
<link rel="stylesheet" type="text/css" href="/css/footer.css">
@stop

@section('content')
<script>
$(function(){
	$("#banner_menu_wrap").mouseleave(function(){
		$(this).hide()
		$("#big_banner_wrap").hide()
		});
	$(".djfl").mouseenter(function(){
		$("#big_banner_wrap").show()
		$("#banner_menu_wrap").show()
		});	
	})
	
</script>
<!--banner轮播引入lunbo.css和daohang.js-->
<div id="big_banner_wrap" style=" position:absolute; top:177px; left:50%; margin-left:-613px">
	 <ul id="banner_menu_wrap">
     @foreach($cates as $k=>$v)
     @if($v->cate_pid == 0)
        <li class="active"img>
       
           <a href="{{ url('/home/goods/cate/').'/'.$v->cate_id }}">{{ $v['cate_name'] }}</a>
      
            <a class="banner_menu_i">&gt;</a> 
            <div class="banner_menu_content" style="width: 600px; top: -20px;">
             
          @foreach($cates as $m=>$n)  
    @if($n->cate_pid == $v->cate_id)        
                <ul class="banner_menu_content_ul">
                 
                    <li>
        
                        <a><img width="60" src="/uploads/{{$v->cate_pic}}"></a>
  
    <a  href="{{ url('/home/goods/cate/').'/'.$v->cate_id }}">{{ $n['cate_name'] }}</a>


                        <span><a  href="{{ url('/home/goods/cate/').'/'.$v->cate_id }}">选购</a></span></li>
          
                </ul>
         @endif
    @endforeach                    
              
            </div>
            @endif
        </li>
          @endforeach
    </ul>  
	 
 </div>
 <script src="/js/daohang.js"></script>
<!--你当前位置 -->
<div class="nowweizhi">
	<span>你当前的位置</span>
    <b>></b>
    <a href="#">这里</a>
    <b>></b>
    <a href="#">这里</a>
</div>
<!--商品展示区域-->
<div class="theshopshow">
	<!--left-->
        <!-- 商品展示 -->
		<script src="/js/163css.js"></script>
        <script src="/js/lib.js"></script>
			<div id="preview">
				<div class=jqzoom id="spec-n1" onClick="window.open('/')"><IMG height="350" src="{{ asset('/uploads/').'/'.$data['picture'] }}" jqimg="{{ asset('/uploads/').'/'.$data['picture'] }}" width="350">
					</div>
					<div id="spec-n5">
						<div class=control id="spec-left">
							<img src="/img/left.gif" />
						</div>
						<div id="spec-list">
							<ul class="list-h">
                                              @foreach($picture as $v)                               
								<li><img src="{{ asset('/uploads/').'/'.$v['picname'] }}"> </li>
							   @endforeach
							</ul>
						</div>
						<div class=control id="spec-right">
							<img src="/img/right.gif" />
						</div>
					</div>
				</div>
				<SCRIPT type=text/javascript>
					$(function(){			
						   $(".jqzoom").jqueryzoom({
								xzoom:400,
								yzoom:400,
								offset:10,
								position:"right",
								preload:1,
								lens:1
							});
							$("#spec-list").jdMarquee({
								deriction:"left",
								width:350,
								height:56,
								step:2,
								speed:4,
								delay:10,
								control:true,
								_front:"#spec-right",
								_back:"#spec-left"
							});
							$("#spec-list img").bind("mouseover",function(){
								var src=$(this).attr("src");
								$("#spec-n1 img").eq(0).attr({
									src:src.replace("\/n5\/","\/n1\/"),
									jqimg:src.replace("\/n5\/","\/n0\/")
								});
								$(this).css({
									"border":"2px solid #ff6600",
									"padding":"1px"
								});
							}).bind("mouseout",function(){
								$(this).css({
									"border":"1px solid #ccc",
									"padding":"2px"
								});
							});				
						})
				</SCRIPT>
			<!-- 帝云商品展示 End -->                                    
	<!--right-->
    <div class="shoppnum">
    	<!--n1-->
        <div class="shanpmai">
        	<h1 class="spdname">{{ $data['goods_name'] }}</h1>
            <div class="hotspeak">
            	{{ $data['goods_description']  }}
            </div>
            <div class="shoujiap">
            	<span>商城价格</span>
                <i>{{ $data['goods_price'] }}</i>￥
            </div>
            <div class="chuxinxi">
            	<span>促销信息</span><i>满200.00减20.00，满400.00减40.00</i>
            </div>
            <div class="shoujigm">
            	<span>APP独享打折</span>
                <div class="sjapp">用手机购买
                	<b><img src="/img/帝云官网二维码.jpg"/></b>
                </div>
            </div>
            <div class="peisongzhi">
            	<span>配送至</span>
                <script src="/js/city.js/cityJson.js"></script>
                <script src="/js/city.js/citySet.js"></script>
                <script src="/js/city.js/Popt.js"></script>
                <div class="choosecity">
                	<input type="text" id="city" value="点击选择地区"/ style=" height:20px; font-size:12px; margin-top:5px; border:1px solid #cacace">
                    <script type="text/javascript">
						$("#city").click(function (e) {
						SelCity(this,e);
						});
					</script>
                </div>
                <span style=" font-weight:bold; color:#333">
                @if($data['goods_stock']>0)
                有货
                @else
                无货
                @endif
                </span>
                <a href="#">支持货到付款</a>
            </div>
            <div class="xuanzcolor">
            	<span>选择颜色</span>
                <div class="morecolor">
                	<ul>
                    	<li><a href="#"><img src="/img/56aec892N2f09760e.jpg!cc_60x76.jpg"/></a></li>
                        <li><a href="#"><img src="/img/56aec892N2f09760e.jpg!cc_60x76.jpg"/></a></li>
                        <li><a href="#"><img src="/img/56aec892N2f09760e.jpg!cc_60x76.jpg"/></a></li>
                        <li><a href="#"><img src="/img/56aec892N2f09760e.jpg!cc_60x76.jpg"/></a></li>
                        <li><a href="#"><img src="/img/56aec892N2f09760e.jpg!cc_60x76.jpg"/></a></li>
                        <li><a href="#"><img src="/img/56aec892N2f09760e.jpg!cc_60x76.jpg"/></a></li>
                        <li><a href="#"><img src="/img/56aec892N2f09760e.jpg!cc_60x76.jpg"/></a></li>
                    </ul>
                    <script>
						$(function(){
							$(".morecolor ul li").click(function(){
								$(this).css({border:"1px solid #f00"}).siblings().css({border:"none"})
								})
							$(".morecm ul li").click(function(){
								$(this).css({border:"1px solid #f00"}).siblings().css({border:"1px solid #cacace"})
								})	
							})
                    </script>
                </div>
                <div class="choosecm">
                	<span>选择尺码</span>
                    <div class="morecm">
                    	<ul>
                        	<li><a href="#">170/M</a></li>
                            <li><a href="#">175/M</a></li>
                            <li><a href="#">180/M</a></li>
                            <li><a href="#">185/M</a></li>
                            <li><a href="#">190/M</a></li>
                        </ul>
                    </div>
                </div>
                <!--购买数量-->
                <div class="goumaijiajian">
                    <span>购买数量</span>
                    <input id="min" name="" type="button" value="减" / style=" width:30px; height:30px; font-size:12px; line-height:30px; color:#333; float:left; cursor:pointer">  
    <input id="text_box" name="jianshu" type="text" value="1" style="width:60px;height:30px; font-size:12px; text-align:center; float:left"/>  
    <input id="add" name="" type="button" value="加" / style=" width:30px; height:30px; font-size:12px; line-height:30px; color:#333; float:left; cursor:pointer">
				</div>
				<script>
					$(document).ready(function(){
					//获得文本框对象
					   var t = $("#text_box");
					//初始化数量为1,并失效减
					$('#min').attr('disabled',true);
						//数量增加操作
						$("#add").click(function(){    
							t.val(parseInt(t.val())+1)
							if (parseInt(t.val())!=1){
								$('#min').attr('disabled',false);
							}
						  
						}) 
						//数量减少操作
						$("#min").click(function(){
							t.val(parseInt(t.val())-1);
							if (parseInt(t.val())==1){
								$('#min').attr('disabled',true);
							}
						    
						})
					   
					});
					</script>
                 <!--加入购物车与收藏商品-->
                 <div class="joinspadsp">
                 	<a href="#" style=" margin-left:67px">立即购买</a>
                 	<a id="addcart" href="javascript:;" onclick="cart()" style=" margin-left:6px">加入购物车</a>
                  <script type="text/javascript">
                              function cart(){
                                    var count = $('#text_box').val();
                                    var gid = {{ $data['id'] }};
                                    $.ajax({
                                        type:"POST",
                                        url:"{{url('/home/addcart')}}",
                                        dataType: 'json',
                                        data:{gid:gid,count:count,_token:"{{csrf_token()}}"},
                                        success:function(msg){
                                           alert(msg);
                                        },
                                    });
                                }
                          // $('#addcart').on('click',function(){
                          //   $(this).attr('href',"{{ url('/home/addcart').'?gid='.$data['id'].'&count='}}"+$('#text_box').val());
                          // })

                  </script>
                    <a href="#" style=" margin-left:6px">收藏该商品</a>
                 </div>
                 <!--商品编号-->
                 <div class="shopbh">
                 	<span>商品编号</span>
                    <em>123456789</em>
                 </div>    
            </div>
        </div>
    	<!--n2-->
        <div class="daitianc">
        	<span class="lkadlk">瞧了又瞧</span>
            <div class="lklksp">
            	<ul>
                	<li>
                    	<a href="#">
                        	<b>
                            	<img src="/img/diannaozhuji.png"/>
                            </b>
                            <h5>游戏主机</h5>
                            <p>强劲性能，所向披靡</p>
                            <span>9999元</span>
                        </a>
                        <a href="#" style=" width:163px; height:20px;font-size:11px; color:#666; line-height:20px; text-align:center" class="theqjd">官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/img/diannaozhuji.png"/>
                            </b>
                            <h5>游戏主机</h5>
                            <p>强劲性能，所向披靡</p>
                            <span>9999元</span>
                        </a>
                        <a href="#" style=" width:163px; height:20px;font-size:11px; color:#666; line-height:20px; text-align:center" class="theqjd">官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/img/diannaozhuji.png"/>
                            </b>
                            <h5>游戏主机</h5>
                            <p>强劲性能，所向披靡</p>
                            <span>9999元</span>
                        </a>
                        <a href="#" style=" width:163px; height:20px;font-size:11px; color:#666; line-height:20px; text-align:center" class="theqjd">官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/img/diannaozhuji.png"/>
                            </b>
                            <h5>游戏主机</h5>
                            <p>强劲性能，所向披靡</p>
                            <span>9999元</span>
                        </a>
                        <a href="#" style=" width:163px; height:20px;font-size:11px; color:#666; line-height:20px; text-align:center" class="theqjd">官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/img/diannaozhuji.png"/>
                            </b>
                            <h5>游戏主机</h5>
                            <p>强劲性能，所向披靡</p>
                            <span>9999元</span>
                        </a>
                        <a href="#" style=" width:163px; height:20px;font-size:11px; color:#666; line-height:20px; text-align:center" class="theqjd">官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/img/diannaozhuji.png"/>
                            </b>
                            <h5>游戏主机</h5>
                            <p>强劲性能，所向披靡</p>
                            <span>9999元</span>
                        </a>
                        <a href="#" style=" width:163px; height:20px;font-size:11px; color:#666; line-height:20px; text-align:center" class="theqjd">官方旗舰店</a>
                    </li>
                </ul>
            </div>
            <!--上去下来的按钮-->
            <div class="ananniu shangfan" style=" background: url(/img/__sprite.png) no-repeat 0 0; margin-left:70px"></div>
            <div class="ananniu xiafan" style=" background:url(/img/__sprite.png) no-repeat -28px 0; margin-left:50px"></div>
        </div>
        <script>
		$(function(){
			var i=0
			var size=$(".lklksp ul li").size()
			$(".shangfan").click(function(){
				i++
				if(i==size-1){
					i=0;
					}
				$(".lklksp ul").animate({top:-i*218})
				})
			$(".xiafan").click(function(){
				i--
				if(i==-1){
					i=size-2
					}
				$(".lklksp ul").animate({top:-i*218})
				})
			})
        </script>
    </div>
</div>
<!--店长推荐-->
<div class="bosstuijian">
	<div class="bosstj">
    	<span>店长推荐</span>
    </div>
    <div class="bosstjsp">
    	<ul>
        	<li>
            	<a href="#">
                	<b><img src="/img/chose1.png"/></b>
                    <h5>夏季短袖</h5>
                    <p>穿上它，让您冰凉一夏</p>
                    <span>299元</span>
            	</a>
                <a href="#" style=" display:block; width:100%; height:20px; font-size:12px; color:#666; line-height:20px; text-align:center" class="dyzydo">帝云自营店</a>
            </li>
            <li>
            	<a href="#">
                	<b><img src="/img/chose1.png"/></b>
                    <h5>夏季短袖</h5>
                    <p>穿上它，让您冰凉一夏</p>
                    <span>299元</span>
            	</a>
                <a href="#" style=" display:block; width:100%; height:20px; font-size:12px; color:#666; line-height:20px; text-align:center" class="dyzydo">帝云自营店</a>
            </li>
            <li>
            	<a href="#">
                	<b><img src="/img/chose1.png"/></b>
                    <h5>夏季短袖</h5>
                    <p>穿上它，让您冰凉一夏</p>
                    <span>299元</span>
            	</a>
                <a href="#" style=" display:block; width:100%; height:20px; font-size:12px; color:#666; line-height:20px; text-align:center" class="dyzydo">帝云自营店</a>
            </li>
            <li>
            	<a href="#">
                	<b><img src="/img/chose1.png"/></b>
                    <h5>夏季短袖</h5>
                    <p>穿上它，让您冰凉一夏</p>
                    <span>299元</span>
            	</a>
                <a href="#" style=" display:block; width:100%; height:20px; font-size:12px; color:#666; line-height:20px; text-align:center" class="dyzydo">帝云自营店</a>
            </li>
            <li>
            	<a href="#">
                	<b><img src="/img/chose1.png"/></b>
                    <h5>夏季短袖</h5>
                    <p>穿上它，让您冰凉一夏</p>
                    <span>299元</span>
            	</a>
                <a href="#" style=" display:block; width:100%; height:20px; font-size:12px; color:#666; line-height:20px; text-align:center" class="dyzydo">帝云自营店</a>
            </li>
            <li>
            	<a href="#">
                	<b><img src="/img/chose1.png"/></b>
                    <h5>夏季短袖</h5>
                    <p>穿上它，让您冰凉一夏</p>
                    <span>299元</span>
            	</a>
                <a href="#" style=" display:block; width:100%; height:20px; font-size:12px; color:#666; line-height:20px; text-align:center" class="dyzydo">帝云自营店</a>
            </li>
        </ul>
    </div>
</div>
<!--商品介绍东西有点多-->
<div class="spjsmore">
	<!--左-->
    <div class="theleftkz">
    	<div class="dpnames">
        	<a href="#">帝云官方旗舰店</a>
        </div>
        <div class="intolkads">
        	<a href="#">进店看看</a>
            <a href="#">收藏店铺</a>
        </div>
        <div class="nknzaizhao">
        	你可能再找
        </div>
        <div class="zaizdnr">
        	<ul>
            	<li><a href="#">window10</a></li>
                <li><a href="#">4g</a></li>
                <li><a href="#">gtx967</a></li>
                <li><a href="#">1T</a></li>
                <li><a href="#">机械键盘</a></li>
                <li><a href="#">背光键盘</a></li>
                <li><a href="#">游戏主机</a></li>
                <li><a href="#">显卡</a></li>
                <li><a href="#">高清大屏显示器</a></li>
                <li><a href="#">GTA5</a></li>
                <li><a href="#">专业音响</a></li>
            </ul>
        </div>
        <div class="xianguanfls">
        	相关分类
        </div>
        <div class="aboutflsnr">
        	<ul>
            	<li><a href="#">笔记本</a></li>
                <li><a href="#">超极本</a></li>
                <li><a href="#">游戏本</a></li>
                <li><a href="#">平板电脑</a></li>
                <li><a href="#">平板电脑配件</a></li>
                <li><a href="#">台式机</a></li>
                <li><a href="#">服务器</a></li>
                <li><a href="#">工作站</a></li>
                <li><a href="#">笔记本配件</a></li>
                <li><a href="#">一体机</a></li>
                <li><a href="#">网吧机</a></li>
                <li><a href="#">主板</a></li>
            </ul>
        </div>
        <div class="xianguanfls">
        	其他相关分类
        </div>
        <div class="aboutflsnr">
        	<ul>
            	<li><a href="#">笔记本</a></li>
                <li><a href="#">超极本</a></li>
                <li><a href="#">游戏本</a></li>
                <li><a href="#">平板电脑</a></li>
                <li><a href="#">平板电脑配件</a></li>
                <li><a href="#">台式机</a></li>
                <li><a href="#">服务器</a></li>
                <li><a href="#">工作站</a></li>
                <li><a href="#">笔记本配件</a></li>
                <li><a href="#">一体机</a></li>
                <li><a href="#">网吧机</a></li>
                <li><a href="#">主板</a></li>
            </ul>
        </div>
        <div class="drxgs">
        	达人选购
        </div>
        <div class="drxgsp">
        	<ul>
            	<li>
                	<a href="#">
                    	<b>
                        	<img src="/img/chose1.png"/>
                        </b>
                        <h5>夏季短袖</h5>
                        <p>299元</p>
                    </a>
                    <a href="#" style=" display:block; width:100%; height:20px; text-align:center; color:#666; font-size:12px; line-height:12px">官方自营店</a>
                </li>
                <li>
                	<a href="#">
                    	<b>
                        	<img src="/img/chose1.png"/>
                        </b>
                        <h5>夏季短袖</h5>
                        <p>299元</p>
                    </a>
                    <a href="#" style=" display:block; width:100%; height:20px; text-align:center; color:#666; font-size:12px; line-height:12px">官方自营店</a>
                </li>
                <li>
                	<a href="#">
                    	<b>
                        	<img src="/img/chose1.png"/>
                        </b>
                        <h5>夏季短袖</h5>
                        <p>299元</p>
                    </a>
                    <a href="#" style=" display:block; width:100%; height:20px; text-align:center; color:#666; font-size:12px; line-height:12px">官方自营店</a>
                </li>
                <li>
                	<a href="#">
                    	<b>
                        	<img src="/img/chose1.png"/>
                        </b>
                        <h5>夏季短袖</h5>
                        <p>299元</p>
                    </a>
                    <a href="#" style=" display:block; width:100%; height:20px; text-align:center; color:#666; font-size:12px; line-height:12px">官方自营店</a>
                </li>
                <li>
                	<a href="#">
                    	<b>
                        	<img src="/img/chose1.png"/>
                        </b>
                        <h5>夏季短袖</h5>
                        <p>299元</p>
                    </a>
                    <a href="#" style=" display:block; width:100%; height:20px; text-align:center; color:#666; font-size:12px; line-height:12px">官方自营店</a>
                </li>
                <li>
                	<a href="#">
                    	<b>
                        	<img src="/img/chose1.png"/>
                        </b>
                        <h5>夏季短袖</h5>
                        <p>299元</p>
                    </a>
                    <a href="#" style=" display:block; width:100%; height:20px; text-align:center; color:#666; font-size:12px; line-height:12px">官方自营店</a>
                </li>
            </ul>
        </div>
    </div>
    <!--右-->
    <div class="therightnrs">
    	<div class="threespa">
            <ul>
                <li class="oncolors" mt-floors="1" mt-cts="1" id="spencals1">商品介绍</li>
                <li mt-floors="2" mt-cts="1" id="spencals1">商品评价<s>(1297)</s></li>
                <li mt-floors="3" mt-cts="1" id="spencals3">售后保障</li>
                
            </ul>
        </div>


        <script>
		$(function(){
			/*控制商品详情、商品评价、售后保障的出现或消失*/
			$(".threespa ul li").mouseenter(function(){
				$(this).addClass("oncolors").siblings().removeClass("oncolors")
				})
			/*控制商品评价里面导航块的添加颜色或减去颜色*/	
			$(".quanbupinglun a").click(function(){
						$(this).addClass("nocolors").siblings().removeClass("nocolors")
						})	
			})

          
    	</script>
            
        

        <!--大容器里面放若干内容-->
        <div class="drqlmfrgnr">
       	<!--商品自诩-->
        	<div class="bigcakes c-1-1">
            	<img src="/img/57457e3bN79fa0a40.jpg"/>
                <img src="/img/57457e3bN6a8921ca.jpg"/>
                <img src="/img/57457e3dNdf3f408f.jpg"/>
                <img src="/img/57457e3eN2208b681.jpg"/>
                <img src="/img/rBEhVFG6bEkIAAAAAAA5Uh-hG5AAAANUALXii0AADlq961.jpg"/>
                <img src="/img/566b7a7aN406c5e49.jpg"/>
                <img src="/img/56af03e5N1eecb9d5.jpg"/>
                <img src="/img/56808a80N3df0450b.jpg"/>
            </div>

        <!--售后保障-->
            
        <!--商品评价-->
            <div class="bigcakes c-1-1">
            	<!--对该商品的综合评分-->
               
                <!--评分结束-->
            	<div class="quanbupinglun">
                	<a href="#" class="nocolors" mt-floord="1" mt-ctd="1">全部评论<em>(1010)</em></a>
                    <a href="#" mt-floord="2" mt-ctd="1">好评<em>(600)</em></a>
                    <a href="#" mt-floord="3" mt-ctd="1">中评<em>(300)</em></a>
                    <a href="#" mt-floord="4" mt-ctd="1">差评<em>(10)</em></a>
                </div>
                <!--这个容器里面放了全部评论、好评、中评、差评、-->
                <div class="qbpltyf123">
                <!--全部评论-->
                	<div class="smallcake d-1-1" style="display:block">

                    <!--一条评论开始-->
                    	<div class="thepcpls">
                        <!--左-->
                        	<div class="zuileftop">
                            	<!--改变星级只需要改" no-repeat X 0"里面的X即可，一次是17像素-->
                            	<div class="thstar" style=" background:url(/img/commentsListIcons1.png) no-repeat -68px 0"></div>
                                <div class="shdltpl">收货1天后评论</div>
                                <div class="shdplsj">2016-6-6&nbsp;16:28</div>
                            </div>
                        <!--中-->
                        	<div class="zuicenterop">
                            	尺码标准，面料舒适，买给爸爸的，穿上很合身，非常感谢卖家诚信善良用心经营店铺，全5分支持!值得推荐购买！
                            </div>
                        <!--右-->
                        	<div class="zuirightop">
                            	<div class="touxadmz">
                                	<b>
                                    	<img src="/img/touxiang.png"/>
                                    </b>
                                    <em>小******明</em>
                                </div>
                                <div class="zgrsndra">山东</div>
                            </div>
                            <!--购买的商品信息-->
                            <div class="gmdspxinxisz">
                                <a href="#">商品的名字什么商品</a>
                                <em>9999元</em>
                            </div>
                        </div>
              
                    </div>
              
                </div>
            </div>    
        </div>
        
        <script>
		/*控制商品详情、商品评价、售后保障的出现或消失*/
			$(function(){
					$(".threespa ul li").mouseenter(function(){
					var frs=$(this).attr("mt-floors");
					var cats=$(this).attr("mt-cts");
					$(".c-"+frs+"-"+cats+"").show().siblings().hide();
					})
					/*这个有点特殊*/
					$("#spencals1").mouseenter(function(){
						$(".c-1-1").show();
						$(".c-2-1").show();
						$(".c-3-1").show();
						})
					/*$("#spencals2").mouseenter(function(){
						$(".c-2-1").show();
						$(".c-3-1").show();
						})*/
					$("#spencals3").mouseenter(function(){
						$(".c-3-1").show();
						$(".c-2-1").show();
						})		
						
		/*控制全部评论、好评、中评、差评的块的出现或消失*/
					$(".quanbupinglun a").click(function(){
					var frd=$(this).attr("mt-floord");
					var catd=$(this).attr("mt-ctd");
					$(".d-"+frd+"-"+catd+"").show().siblings().hide();
					})
				})

                // 获取对象
           
        </script>
        <!--这里一切测试正常，现在我去掉容器里面各个div的颜色-->
    </div>
    
</div>
@stop
                    
			
    
					
				
				

                    	
                        
                            
                
						
        