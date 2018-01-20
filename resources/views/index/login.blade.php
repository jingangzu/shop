<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>会员登录</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('/index/css/login.css') }}">
		<script src="{{ asset('/index/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/index/layer/layer.js') }}"></script>
		<script>
			  $(function(){
 
                var ok1=false;
                var ok2=false;
                var ok3=false;
                var ok4=false;
                // 验证用户名
                $('input[name="name"]').focus(function(){
                    $(this).next().text('账号5-18位').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 5 && $(this).val().length <=18 && $(this).val()!=''){
                        $(this).next("li").text('输入成功').removeClass('state1').addClass('state4');
                        ok1=true;
                    }else{
                        $(this).next("li").html('<font color="#FF0000"> 账号5-18位</font>').removeClass('state1').addClass('state3');
                    }
                     
                });
 
                //验证密码
                $('input[name="password"]').focus(function(){
                    $(this).next().text('密码5-18位').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 5 && $(this).val().length <=18 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok2=true;
                    }else{
                        $(this).next().html('<font color="#FF0000"> 账号5-18位</font>').removeClass('state1').addClass('state3');
                    }
                     
                });
                //提交按钮,所有验证通过方可提交
                $('.submit').click(function(){
                    if(ok1 && ok2){

                        $('form').submit();
                       
                    }else{
                        return false;
                    }
                });
                 
            });
				 

	</script>
	</head>
	<body>
		<!-- login -->
		<div class="top center">
			<div class="logo center">
				<a href="./index.html" target="_blank"><img src="/index/image/mistore_logo.png" alt=""></a>
			</div>
		</div>
		<form  method="post" action="{{ url('index/dologin') }}" class= "form center">

		<div class="login">
			<div class="login_center">
		


				<div class="login_top">
				{{ csrf_field() }}
					<div class="left fl">会员登录</div>
					<div class="right fr">您还不是我们的会员？<a href="{{ url('/index/user/register') }}" target="_self">立即注册</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>

				<div class="login_main center">
					
					{{--激活成功的提示--}}
						@if (!empty(session('msg')))
							<div class="alert alert-danger">
								<ul>
									<li style="color:red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('msg') }}</li>
								</ul>
							</div>
						@endif
	
					<div  class="username">账&nbsp;&nbsp;&nbsp;&nbsp;号:&nbsp;&nbsp;&nbsp;<input class="shurukuang" type="text" name="name" placeholder="用户名/手机号/邮箱" autocomplete="off"/><li style="list-style:none;float:right;"></li>
						
					</div>
					
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;&nbsp;<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/>
						<li style="list-style:none;float:right;"></li>
					</div>

					<div class="username">
						<div class="left fl">验证码:&nbsp;&nbsp;&nbsp;<input class="yanzhengma" type="text" name="code" placeholder="请输入验证码"/></div>
						<div class="right fl"><img src="{{ url('index/yzm') }}" id="127ddf0de5a04167a9e427d883690ff6" onClick="this.src=this.src+'?'"></div>
						@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@if(is_object($errors))
									@foreach ($errors->all() as $error)
										<li style="color:red;font-family:Microsoft YaHei">{{ $error }}</li>
										@endforeach
									@else
											<li style="color:red;font-family:Microsoft YaHei">{{ $errors }}</li>
									@endif
								</ul>
							</div>
						@endif



						<div class="clear"></div>
					</div>

				

				</div>
				<div class="login_submit">
					&nbsp;<input class="submit" type="submit" name="submit" value="立即登录" >
					<a href="{{ url('/index/user/resetpw') }}" target="_self">忘记密码？</a>
				</div>
				
			</div>
		</div>
		</form>
		<footer>
			<div class="copyright">简体 | 繁体 | English | 常见问题</div>
			<div class="copyright">小米公司版权所有-京ICP备10046444-<img src="/index/image/ghs.png" alt="">京公网安备11010802020134号-京ICP证110507号</div>

		</footer>


	</body>
		
</html>