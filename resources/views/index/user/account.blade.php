@extends('index.user.layout')

@section('content')


<script src="/index/js/city.js/cityJson.js"></script>
<script src="/index/js/city.js/citySet.js"></script>
<script src="/index/js/city.js/Popt.js"></script>
<script src="/index/js/jquery.min.js" language="javascript" type="text/javascript" ></script>

<script>

</script>



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
                    	<img src="/avatar/{{ $data->avatar }}"/>
                        <!-- <a href="#">编辑头像</a> -->
                    </span>
                    <em>用户名：</em>
                    <td style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px;" type="text" class="shuru" required />{{ $user->name }}</td>
                </div>

        
                <!--第二部分-->
            
              
                <div class="thetwobf">
                	<em>昵称：</em><td style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru" required >{{ $data->nickname }}</td>
                </div>
               
                <div class="thetwobf">
                	<em>电话：</em><td style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru" required >{{ $data->phone }}</td>
                </div>
                <div class="thetwobf">
                	<em>邮箱：</em><td style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:160px" type="text" class="shuru" disabled >{{ $user->email }}</td>
                </div>
                 <div class="thetwobf">
                    <em>性别：</em>
                    <input type="radio" name="sex" style=" float:left; display:block; width:13px; height:13px; margin-top:9px"@if($data->sex == 1)checked @endif/><span>男</span>
                    <input type="radio" name="sex" style=" float:left; display:block; width:13px; height:13px; margin-top:9px"@if($data->sex == 2)checked @endif/><span>女</span>
                    <input type="radio" name="sex" style=" float:left; display:block; width:13px; height:13px; margin-top:9px"@if($data->sex == 3)checked @endif/><span>保密</span>
                </div>
                
                <div class="thetwobf">
                    <em>居住地址：</em><td type="text" id="city" value="点击选择地区"/ style=" height:28px; font-size:12px; border:1px solid #bbb; float:left"></td>
                   
                   
                </div>
               
             
            </div>	

            <!--修改基本信息结束-->
        </div>
        <!--right结束-->
@endsection