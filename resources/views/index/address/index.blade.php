@extends('index.user.layout')

@section('content')
<script src="/index/js/city.js/cityJson.js"></script>
<script src="/index/js/city.js/citySet.js"></script>
<script src="/index/js/city.js/Popt.js"></script>
<!-- <form action="{{ url('index/address/insert') }}" method="get" enctype="multipart/form-data"> -->
<div class="thetwobf">
	@foreach($data as $v)
					<input type="hidden" name="uid" value="1">
                 <div class="thetwobf">
	                	<em>收货人姓名：</em><td class="shurukuang" type="text" name="username" value="" >{{ $v->username }}</td>
	                </div>
             
               <div class="thetwobf">
	                	<em>手机号：</em><td class="shurukuang" type="text" name="phone" value=""/>{{ $v->phone }}</td>
	                </div>
	                	<em>送货地址：</em><td name="address" type="text" id="city" value="点击选择地区"/ style=" height:28px; font-size:12px; border:1px solid #bbb; float:left">{{ $v->address }}</td>
	                    <script type="text/javascript">
							$("#city").click(function (e) {
							SelCity(this,e);
							});
						</script>
	                    <em style=" width:60px">详细地址：{{ $v->xaddress }}</em>
	                   <!--  <input name="xaddress" style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:420px" type="text" class="shuru" placeholder="山东省济南市历下区黄台电子商务产业园3030室" required /> -->
	                    
	                    <input type="hidden" name="token" value="79db104d" />
	               <!--      <input  class="submit" type="submit" name="submit" value="修改地址" > -->
	                </div>
	                @endforeach
	               
	                <div class="thetwobf">
	                	<a href="{{ url('index/address/insert') }}" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px" type="submit" value="添加地址" />新增地址</a>
	                	<!-- <a href="{{ url('index/address/index') }}" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px" type="submit">保存地址</a> -->
						
						
	                </div>
	                 </form>	
@endsection