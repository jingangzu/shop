<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>填写核对购物信息</title>
<link rel="stylesheet" type="text/css" href="/css/shangpingoumai.css">
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/city.js/cityJson.js"></script>
<script src="/js/city.js/citySet.js"></script>
<script src="/js/city.js/Popt.js"></script>
</head>
<body>
<!--全部开始-->
<div class="tianxiehedui">
    <!--标题-->
    <div class="rzhdndgw">温馨提示：请认真核对您的购物信息</div>
    <!--收货人信息-->
    <div class="shouhurxl clastyo">
        <div class="shouhurxl1">
            <em>收货人信息</em>
            <a href="#" class="chgeb">修改</a>
        </div>
        <div class="shouhurxl2">
        @foreach($addr as $k=>$v)
              
            <span>{{$v->username}}</span>
            <span>{{$v->address}}</span>
            <span><em>电话：</em><em>{{$v->phone}}</em></span>
           
       @endforeach
        </div>
    </div>
    <!--点击修改会出现这个选择框-->
    <div class="changepc">
        <!--以前的旧地址-->

        <div class="tongyongdizhi">

            <input type="radio" name="adressa" style=" float:left; display:block; width:13px; height:13px; margin-top:9px">
        @foreach($addr as $k1=>$v1)
            <span>{{$v1->username}}</span>
            <span>{{$v1->address}}</span>
            <span><em>电话：</em><em>{{$v1->phone}}</em></span>
        @endforeach
            
        </div>
        <!--添加新地址-->
        
            <div class="dandudizhi">
                <input type="radio" name="adressa" class="adressa" style=" float:left; display:block; width:13px; height:13px; margin-top:9px">
                <span>添加</span>
            </div>   
        <!--添加新地址-->
                <div class="opcaty1">
                    <div class="opcaty2">
                        <em>收货人姓名：</em>
                        <input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru"/>
                        
                    </div>
                    <div class="opcaty2">
                        <em>所在的地区：</em>
                        <input type="text" id="city" value="点击选择地区"/ style=" height:28px; font-size:12px; border:1px solid #bbb; float:left">
                        <script type="text/javascript">
                            $("#city").click(function (e) {
                            SelCity(this,e);
                            });
                        </script>
                    </div>
                    <div class="opcaty2">
                        <em>详细的地址：</em>
                        <input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:488px" type="text" class="shuru" placeholder="请填写真实地址，不需要重复填写所在地区" required />
                        
                    </div>
                    <div class="opcaty2">
                        <em>联系的电话：</em>
                        <input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru"/>
                        
                    </div>
                <button id="btn">保存收货人信息<button>
             </form>
            </div>
        <!--新地址结束-->
        <!--添加新地址结束-->
    </div>

    <script>
    $(function(){
        $(".chgeb").click(function(){
            $(".changepc").css({display:"block"});
            $(".clastyo").css({display:"none"})
            })
        $(".bcshrxopl").click(function(){
            $(".changepc").css({display:"none"});
            $(".clastyo").css({display:"block"});
            $(".opcaty1").css({display:"none"})
            })
        $(".adressa").click(function(){
            $(".opcaty1").css({display:"block"})
            })      
        })
      $('#btn').on('click',function(){
        var formData = new FormData();
                                formData.append('_token', '{{csrf_token()}}');
                                                            // console.log(formD
                                 $.ajax({
                                    type: "POST",
                                    url: "/home/ordersub",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {
                                       alert('成功添加');
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        layer.alert("上传失败，请检查网络后重试");
                                    }
                                });
                                });
      
    </script>
    <!--这个选择框结束-->
    <!--收货人信息结束-->
    <!--支付方式-->
    <div class="shouhurxl">
        <h3>支付方式</h3>
        <div class="zhifufangsj1">
            <span>在线支付</span>
        </div>
    </div>
    <!--支付方式结束-->
    <!--商品清单-->
    <div class="shouhurxl">
        <!--一条商品信息开始-->
        <div class="xxpop1" style="background:rgba(255,153,0,0.1); padding-bottom:6px">
           
            <div class="xxpop2" style=" width:630px">
                                <span>商品名称</span>
                                <a href="#"><p style=" line-height:20px"><img src="/img/img02.jpg"/>&nbsp;{{$resgoods[0]->goods_name}}</p></a>
            </div>
            <div class="xxpop2">
                                <span>单价</span>
                                <p>{{$resgoods[0]->goods_price}}</p>
            </div>
            <div class="xxpop2">
                                <span>数量</span>
                                <p>{{$num}}</p>
            </div>
            <div class="xxpop2">
                                <span>小计</span>
                                <p>{{($resgoods[0]->goods_price)*($num)}}</p>
            </div>
        </div>
        <!--买家留言-->
        <div class="maijiayouhuayue">
            <em style=" width:90px; text-align:right">买家留言：</em>
            <textarea style=" line-height:20px; font-size:14px; color:#111; border:1px solid #bbb; width:1000px; box-shadow:none" placeholder="选填：对本次交易的说明（建议填写已经和商家达成一致的说明）"></textarea>
        </div>
        <!--商品合计-->
      <div class="shouhurxlm">
            <ul>
                <li>
                    <em><s>0</s>元</em>
                  <em>运费：</em>
              </li>
                <li>
                    <em><s>95</s>元</em>
                  <em>商品金额：</em>
              </li>
                <li>
                    <em><s>95</s>元</em>
                  <em>本店合计：</em>
              </li>
            </ul>
            <!--订单总金额-->
        <div class="ddzjes">
                <em>订单总金额：</em>
                <em style=" padding-left:0"><s>95</s>元</em>
            </div>
            <!--使用预存款-->
        <div class="syycklo">
                <em>用预存款：</em>
                    <input type="checkbox" class="dianyidian" value="1" name="pd_pay" style=" margin-top:8px; float:left; margin-left:6px"><span>使用预存款（可用金额：<i>40</i>元）</span>
            </div>
            <!--请输入支付密码-->
            <div class="zgykskbj">
                <em>支付密码：</em>
                <input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; margin-top:10px" type="text" class="shuru"/>
                <a href="#">使用</a>
            </div>
            <script>
                $(function(){
                    $(".dianyidian").click(function(){
                        $(".zgykskbj").slideToggle()
                        })
                    })
            </script>
            <!--支付密码结束-->
      </div>
        <!--一条商品信息结束-->
    </div>
    <!--商品清单结束-->
    <button>提交订单</button>
</div>
</body>
</html>    
                     
           
            
                
                    
            
                
        
            
        

