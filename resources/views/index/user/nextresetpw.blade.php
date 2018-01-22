<!DOCTYPE html>
<html data-scrapbook-source="https://account.xiaomi.com/pass/forgetPassword?callback=https%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttps%253A%252F%252Fwww.mi.com%252F%26sign%3DNzY3MDk1YzczNmUwMGM4ODAxOWE0NjRiNTU5ZGQyMzFhYjFmOGU0Nw%2C%2C&amp;sid=mi_eshop&amp;_bannerBiz=mistore&amp;_qrsize=180" data-scrapbook-create="20180116032133632">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title>小米帐号 -重置密码</title>

		<link type="text/css" rel="stylesheet" href="/index/css/reset.css">
		<link type="text/css" rel="stylesheet" href="/index/css/layout.css">
		<link type="text/css" rel="stylesheet" href="/index/css/registerpwd.css">
    <script src="{{ asset('/index/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/index/layer/layer.js') }}"></script>

	
<link rel="shortcut icon" href="favicon.ico">
</head>
<!-- 添加版本uLocale -->
<body class="zh_CN">
  
<div class="wrapper">
<div class="wrap">
  <div class="layout">  
  <div class="n-frame device-frame reg_frame">
    <div class="external_logo_area"><a class="milogo" href="javascript:void(0)"></a></div>
    <div class="title-item t_c">
      <h4 class="title_big30">重置密码</h4>
    </div>

    <form action="/index/user/donextresetpw"  method="post" id="forgetpwd_form">
      <!-- <input name="email" type="hidden"> -->

          

    <div class="regbox">
    <input type='hidden' name='email' value='{{$email}}'>
    {{ csrf_field() }}

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
      <h5 class="n_tit_msg">请输入新密码：</h5>      
      <div class="inputbg">
        <!-- 错误添加class为err_label -->

        <label class="labelbox labelbox-user" for="user" id="abc">
          <input name="password" id="user" autocomplete="off" placeholder="新密码" value="" type="password" >
         </label>
      </div>	


        <div class="inputbg">
        <!-- 错误添加class为err_label -->

        <label class="labelbox labelbox-user" for="user" id="abc">
          <input  id="user" autocomplete="off" placeholder="确认密码" value="" type="password" name="re-password">
         </label>
      </div>


       
      <div class="fixed_bot">
        <input class="btn332 btn_reg_1" id="submit_button" value="确认" type="submit">   
      </div>
    </div>

     
    </form>        
  </div>
  </div>
</div>
</div>
<div class="n-footer">
  <div class="nf-link-area clearfix">
  <ul class="lang-select-list">
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="zh_CN">简体</a>|</li>
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="zh_TW">繁体</a>|</li>
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="en">English</a></li>
  </ul>
  </div>
  <p class="nf-intro"><span>黄米公司版权所有-京ICP备10046444-<a class="beianlink beian-record-link" target="_blank"><span></span>京公网安备11010802020134号</a>-京ICP证110507号</span></p>
</div>
  <script>
    
            $(function(){
 
                // var ok1=false;
                // var ok2=false;
                // var ok3=false;
                // var ok4=false;
                // // 验证用户名
             
 
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

                $('input[name="re-password"]').focus(function(){
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

                // alert('修改成功')
                 
            });
</script>
</body>
</html>