@extends('home.header')

@section('title','首页')
@section('content')

<!--banner轮播引入lunbo.css和daohang.js-->

<div id="big_banner_wrap" style="display:block">

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
        
                        <a><img width="60" src="/uploads/{{$n['cate_pic']}}"></a>
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
   
        
    <div id="big_banner_pic_wrap">
        <ul id="big_banner_pic">
@foreach($show as $k)
        
            <li><img width="1226px" height="460px" src="/uploads/{{ $k }}"></li>
@endforeach
        </ul>
    </div>
    <div id="big_banner_change_wrap">
        <div id="big_banner_change_prev"> &lt;</div>
        <div id="big_banner_change_next">&gt;</div>
    </div>
</div>
<script src="/js/daohang.js"></script>
<!--乐乐周边啊-->
<div class="dy14">
    <div class="dy15">
        <ul>
            <li><a href="#">乐乐OA<br/>乐乐OA</a></li>
            <li><a href="#">乐乐APP<br/>乐乐APP</a></li>
            <li><a href="#">乐乐网贷<br/>乐乐网贷</a></li>
            <li><a href="#">话费充值<br/>话费充值</a></li>
            <li><a href="#">乐乐订餐<br/>乐乐订餐</a></li>
            <li><a href="#">乐乐外包<br/>乐乐外包</a></li>
        </ul>
    </div>
    <div class="dy16">
        <ul>
@foreach($rec as $k)
            <li><a href="#"><img src="/upload/{{ $k }}"/></a></li>
            @endforeach
        </ul>
    </div>
</div>
<!--一个推荐商品的轮播-->
<div class="kongzhianniu">
    <div class="lunbobanner">
        <ul class="lunboimg">
            <li>

                  @foreach($adv as $k=>$v)
                <a href="#">

                  
                    <b><img width="180px" height="200px" src="/uploa/{{ $v->img }}"/></b>
                    
                    <h5>{{ $v->name }}</h5>
                    <p>{{ $v->summary }}</p>
                    <span>{{ $v->price }}元</span>
                   
                </a>
                 @endforeach
            </li>
        </ul>
    </div>
    <div class="btnl"><</div>
    <div class="btnr">></div>
    <h4 class="guanfangremai">官方热卖</h4>
</div>
<!--其它商品-->
@foreach($cates as $o=>$v2)
@if($v2->cate_pid == 0)
<div class="dy17">
    <!--服装鞋包-->
    <div class="dy18" id="fzxba">
        <div class="dy20">

  <h3>{{ $v2->cate_name }}</h3>
        
     <div class="xxddh">
                    @foreach($cates as $m=>$n)  
    @if($n->cate_pid == $v2->cate_id) 
    <a href="#" class="cate a-1-list08"  mt-floor="1"  mt-ct="list08">{{$n->cate_name}}</a>
                         @endif   
    @endforeach
            </div> 

        </div>
        <div class="dy21">
            <div class="dy22">

                <div class="dy24"><a href="#"><img src="/img/576c00e9N4c11aa86.jpg"/></a></div>

                <div class="dy25">
                    <ul>
                        <li><a href="#">空调</a></li>
                  
                    </ul>
                </div>
            </div>
            <div class="bigrongqi">
                <div class="pinpai b-1-dy23">
            
                @foreach($goods as $p=>$q)
                    <ul>
                        <li>
                            <a href="#">
                                <b>

                                    <img src="/uploads/{{ $q->picture}}"/>

                                </b>
                                <h2>{{$q->goods_name}}</h2>
                                <p>{{$q->goods_description}}</p>
                                <span>{{$q->goods_price}}元</span>
                            </a>
                            <a href="#" style=" width:100%; height:20px; line-height:20px; font-size:12px; color:#666; text-align:left; text-indent:10px" class="dianpud">乐乐不乐店</a>
                        </li>
                  
                    </ul>
      @endforeach


                </div>

            </div>
        </div>
    </div>
    <!--生活服务-->

@endif
@endforeach
    <!--天天特价-->

    <!--快速导航菜单-->
    <div class="dy19">
        <a href="#fzxba">服装鞋包</a>
        <a href="#ghmza">个护美妆</a>
        <a href="#sjtxa">手机通讯</a>
        <a href="#jydqa">家用电器</a>
        <a href="#dnsma">电脑数码</a>
        <a href="#ydjsa">运动健身</a>
        <a href="#jjsha">居家生活</a>
        <a href="#mywja">母婴玩具</a>
        <a href="#spbja">食品保健</a>
        <a href="#tsyxa">图书音像</a>
        <a href="#zcypa">整车用品</a>

    </div>
</div>
<script type="text/javascript">
    $(function() {
        $(window).scroll(function() {
            var top = $(window).scrollTop()-$(this).scrollTop()+200

            $(".dy19").css({top: top });
        });
    });
</script>

@stop




















