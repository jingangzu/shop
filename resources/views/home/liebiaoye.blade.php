@extends('home.header')

@section('title','列表页')
@section('style')
<link rel="stylesheet" type="text/css" href="/css/top.css"/>
<link rel="stylesheet" type="text/css" href="/css/lunbo.css">
<link rel="stylesheet" type="text/css" href="/css/liebiao.css"/>
<link rel="stylesheet" type="text/css" href="/css/footer.css"/>
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/public.js"></script>
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
<!--属性栏筛选 -->
<div class="shaixuan">
	<!--品牌分类开始-->
    <div class="sxfenlei">
    	<div class="sxname">品牌</div>
        <div class="sxleibie">
        	<ul class="liebiaoyi_w">
            	<li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
            </ul>
            <span class="zdguanbi">更多/关闭</span>
            <ul class="liebiaoer_w">
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>
                <li><a href="#"><img src="/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>               
            </ul>
        </div>
    </div>
    <!--品牌分类结束-->
	<div class="sxfenlei">
    	<div class="sxname">属性</div>
        <div class="sxleibie">
        	<ul class="liebiaoyi">
            	<li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                
            </ul>
            <span class="zdguanbi">更多/关闭</span>
            <ul class="liebiaoer">
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>
                <li><a href="#">标题一</a></li>               
            </ul>
        </div>
    </div>
    
    <script>
		$(function(){//第一步都得写这个
	$(".zdguanbi").click(function(){//获取title，并且让他执行下面的函数
		$(this)/*点哪个就是哪个*/.next(".liebiaoer_w")/*哪个标题下面的con*/.slideToggle()
		
		})
	$(".zdguanbi").click(function(){//获取title，并且让他执行下面的函数
		$(this)/*点哪个就是哪个*/.next(".liebiaoer")/*哪个标题下面的con*/.slideToggle()
		
		})	
		
	
	})
    </script>
</div>
<!--分类搜索-->
<div class="zhxlxp">
	<span style=" background:#000; color:#fff; margin-left:0;">排序方式</span>
	<a href="#">综合</a>
    <a href="#" title="7天销量降序排列">销量</a>
    <a href="#" title="上架时间降序排列">新品</a>
    <a href="#" title="销售价格降序排列">价格</a>
</div>
<!--商品列表-->
<div class="shopliebiao">
	<ul>
@foreach($data as $k=>$v)
    	<li>
           <a href="{{ url('/home/goods/').'/'.$v->id }}" class="wocici">
               <b>
               <img src="{{ url('/uploads/').'/'.$v->picture }}"/>
               </b>
               <h2>{{ $v->goods_name }}</h2>
               <p>{{ $v->goods_description }}</p>
               <span>{{ $v->goods_price }}元</span>
           </a>
           <em class="wocaca">
           	<a href="#">帝云自营店</a>
            <a href="#" style=" border-right:hidden">联系卖家</a>
           </em>
        </li>
  @endforeach
    </ul>
</div>
<!--猜你喜欢-->
<div class="zhxlxp"><span style=" background:#111; color:#fff; margin-left:0; padding-left:10px">猜你喜欢</span></div>
<div class="tuijiansp">
    <div class="shopliebiao">
        <ul>
            <li>
           <a href="#" class="wocici">
               <b>
               <img src="/img/chose.png"/>
               </b>
               <h2>男士短袖</h2>
               <p>极致透气，让您冰凉一夏</p>
               <span>229元</span>
           </a>
           <em class="wocaca">
           	<a href="#">帝云自营店</a>
            <a href="#" style=" border-right:hidden">联系卖家</a>
           </em>
        </li>
            <li>
           <a href="#" class="wocici">
               <b>
               <img src="/img/chose.png"/>
               </b>
               <h2>男士短袖</h2>
               <p>极致透气，让您冰凉一夏</p>
               <span>229元</span>
           </a>
           <em class="wocaca">
           	<a href="#">帝云自营店</a>
            <a href="#" style=" border-right:hidden">联系卖家</a>
           </em>
        </li>
            <li>
           <a href="#" class="wocici">
               <b>
               <img src="/img/chose.png"/>
               </b>
               <h2>男士短袖</h2>
               <p>极致透气，让您冰凉一夏</p>
               <span>229元</span>
           </a>
           <em class="wocaca">
           	<a href="#">帝云自营店</a>
            <a href="#" style=" border-right:hidden">联系卖家</a>
           </em>
        </li>
            <li>
           <a href="#" class="wocici">
               <b>
               <img src="/img/chose.png"/>
               </b>
               <h2>男士短袖</h2>
               <p>极致透气，让您冰凉一夏</p>
               <span>229元</span>
           </a>
           <em class="wocaca">
           	<a href="#">帝云自营店</a>
            <a href="#" style=" border-right:hidden">联系卖家</a>
           </em>
        </li>
            <li>
           <a href="#" class="wocici">
               <b>
               <img src="/img/chose.png"/>
               </b>
               <h2>男士短袖</h2>
               <p>极致透气，让您冰凉一夏</p>
               <span>229元</span>
           </a>
           <em class="wocaca">
           	<a href="#">帝云自营店</a>
            <a href="#" style=" border-right:hidden">联系卖家</a>
           </em>
        </li>
            
        </ul>
    </div>
</div>    
@stop
    
               
            
        
             
                
            
                    
        
            	
            
                  
          
 

    
    		
        