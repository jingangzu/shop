@extends('index.user.layout')

@section('content')
<script src="/index/js/city.js/cityJson.js"></script>
<script src="/index/js/city.js/citySet.js"></script>
<script src="/index/js/city.js/Popt.js"></script>
<form action="{{ url('index/user/add') }}" method="get" enctype="multipart/form-data">
<div class="thetwobf">

						 <div class="thetwobf">
						 	<input type="hidden" name="uid" value="1">
                	<em>收货人姓名：</em><td name="username" style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru" required ></td>
                </div>
               
                <div class="thetwobf">
                	<em>电话：</em><td name="phone" style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru" required ></td>
                </div>
	                	<em>居住地址：</em><input name="address" type="text" id="city" value="点击选择地区"/ style=" height:28px; font-size:12px; border:1px solid #bbb; float:left">
	                    <script type="text/javascript">
							$("#city").click(function (e) {
							SelCity(this,e);
							});
						</script>
	                    <em style=" width:60px">街道：</em>
	                    <input name="xaddress" style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:420px" type="text" class="shuru" placeholder="山东省济南市历下区黄台电子商务产业园3030室" required />
	                   
	                    <input type="hidden" name="token" value="79db104d" />
	                    <input  class="submit" type="submit" name="submit" value="修改地址" >
	                </div>
	               
	                <div class="thetwobf">
	                	<a href="#" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px" type="submit">添加地址</a>
						
						
	                </div>
	                 </form>	
@endsection