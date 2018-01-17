<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('/index/css/login.css') }}">
		<script src="{{ asset('/index/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/index/js/bootstrap.min.js') }}"></script>
		
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
                        $(this).next("li").html('<font color="#FF0000">账号不合理</font>').removeClass('state1').addClass('state3');
                    }
                     
                });

                // 邮箱验证
                 $('input[name="email"]').focus(function(){
                 	  $(this).next().text('邮箱3-18位').removeClass('state1').addClass('state2');
                 }).blur(function(){
                      if(!$("input[name='email']").val().match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)) {
					      $(this).next().html('<font color="#FF0000">邮箱不合理</font>').removeClass('state1').addClass('state3');
					        return false;
					    } else {
					              $(this).next("li").text('输入成功').removeClass('state1').addClass('state4');
                                  ok1=true;
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
                        $(this).next().html('<font color="#FF0000">密码不合理</font>').removeClass('state1').addClass('state3');
                    }
                     
                });

                $('input[name="re-password"]').focus(function(){
                    $(this).next().text('密码5-18位').removeClass('state1').addClass('state2');
                }).blur(function(){

                    if($(this).val().length >= 5 && $(this).val().length <=18 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok2=true;
                    }else{

                        $(this).next().html('<font color="#FF0000">密码不合理</font>').removeClass('state1').addClass('state3');   
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
		<form  method="post" action="{{ url('index/user/doregister') }}">

		{{ csrf_field() }}
		<div class="regist">
			<div class="regist_top">
					<div class="left fl">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 会员注册</div>
					<div class="right fr"><a href="./index.html" target="_self">小米商城&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
			</div>
			<div class="regist_center">
				

				<div class="regist_main center">

					<div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="text" name="name" placeholder="请输入你的用户名" autocomplete="off"/>
					<li style="list-style:none;float:right;"></li>
					</div>

					<div class="username">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:&nbsp;&nbsp;<input class="shurukuang" type="text" name="email" placeholder="请输入你的用户名" autocomplete="off"/>
					<li style="list-style:none;float:right;"></li>
					</div>

					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="password"  placeholder="请输入你的密码" autocomplete="off"/>
					<li style="list-style:none;float:right;"></li>
					</div>
					
					<div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="re-password" placeholder="请确认你的密码"/><li style="list-style:none;float:right;"></li>

					</div>
					
					<div class="username">
						<div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" type="text" name="code" placeholder="请输入验证码"/>

							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@if(is_object($errors))
										@foreach ($errors->all() as $error)
											<li style="color:red;font-family:Microsoft YaHei">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $error }}</li>
											@endforeach
										@else
												<li style="color:red;font-family:Microsoft YaHei">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $errors }}</li>
										@endif
									</ul>
								</div>
							@endif		
						</div>


						<div class="right fl">
							<img src="{{ url('index/yzm') }}" id="127ddf0de5a04167a9e427d883690ff6" onClick="this.src=this.src+'?'">
						</div>
						<div class="clear"></div>
					</div>
				</div>


				<div class="regist_submit">
					<input class="submit" type="submit" name="submit" value="完成注册" >
				</div>
				
			</div>
		</div>
		</form>

		
	</body>
</html>