@extends('index.user.layout')

@section('content')
<script src="/index/js/city.js/cityJson.js"></script>
<script src="/index/js/city.js/citySet.js"></script>
<script src="/index/js/city.js/Popt.js"></script>
  @foreach($data as $v)
<form action="{{ url('index/address/edit') }}/{{ $v->id }}" method="get" enctype="multipart/form-data">
<div class="thetwobf">
					
             
	                <div class="thetwobf">
						 	<input type="hidden" name="uid" value="1">

                	<em>收货人姓名：</em><td name="username"   type="text" value="" >{{ $v->username }}</td>
                </div>
               
                <div class="thetwobf">
                	<em>电话：</em><td name="phone" value=""  type="text" class="shuru"  />{{ $v->phone }}</td>
                </div>
                <div>
	                	<em>居住地址：</em><td name="address" value="" type="text" id="city" >{{ $v->address }}</td>
	                	</div>
	                	<div>
	                	<em style=" width:60px">街道：</em>
	                    <td name="xaddress" value="" >{{ $v->xaddress }}</td></div>
	                     <input type="hidden" name="token" value="79db104d" />
	                     <input  class="submit" type="submit" name="submit" value="修改地址" >
	                     <a href="{{ url('index/address/delete') }}/{{$v->id}}">删除地址</a>
	                <div class="thetwobf">
	                	@endforeach
	                	<a href="{{ url('index/address/insert') }}" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px" type="submit">添加新地址</a>
						
						
	                </div>
	                 </form>	
@endsection