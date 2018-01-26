@extends('index.user.layout')

@section('content')
<script src="/index/js/city.js/cityJson.js"></script>
<script src="/index/js/city.js/citySet.js"></script>
<script src="/index/js/city.js/Popt.js"></script>
  
<form action="{{ url('index/address/update') }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
<div class="thetwobf">
					
             <div class="thetwobf">
					<input type="hidden" name="uid" value="1">
                 <div class="thetwobf">
	                	<em>收货人姓名：</em><input class="shurukuang" type="text" name="username" value="{{ $data->username }}" />
	                </div>
             
               <div class="thetwobf">
	                	<em>手机号：</em><input class="shurukuang" type="text" name="phone" value="{{ $data->phone }}"/>
	                </div>
	                	<em>送货地址：</em><input name="address" type="text" id="city" value="{{ $data->address }}"/ style=" height:28px; font-size:12px; border:1px solid #bbb; float:left">
	                    <script type="text/javascript">
							$("#city").click(function (e) {
							SelCity(this,e);
							});
						</script>
	                    <em style=" width:60px">详细地址：</em>
	                    <input name="xaddress" value="{{ $data->xaddress }}" style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:420px" type="text" class="shuru" placeholder="山东省济南市历下区黄台电子商务产业园3030室" required />
	                    
	                    <input type="hidden" name="token" value="79db104d" />
	               <!--      <input  class="submit" type="submit" name="submit" value="修改地址" > -->
	                </div>
	               
	                <div class="thetwobf">
	                	<input style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px" type="submit" value="保存修改" />
	                	<!-- <a style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px" type="submit" value= >删除</a> -->
	                <!-- <div class="thetwobf"> -->
	                	
	                	<!-- <a href="{{ url('index/address/insert') }}" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px" type="submit">添加新地址</a>
						 -->
						
	                <!-- </div>
 -->	                 </form>	
@endsection