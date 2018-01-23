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



    <form action="/index/user/doresetpw" method="post" id="forgetpwd_form">
    <!-- <input name="qs" type="hidden"> -->

    {{ csrf_field() }}
    <!-- 记得在此添加标记语言uLocale -->
    <div class="regbox">
      <h5 class="n_tit_msg">请输入注册的邮箱地址、手机号码或帐号：</h5>      
      <div class="inputbg">
        <!-- 错误添加class为err_label -->
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
        <label class="labelbox labelbox-user" for="user" id="abc">
          <input name="email" id="user" autocomplete="off" placeholder="邮箱/手机号码/帐号" value="" type="email" name="email">
         </label>


<!-- 
         <input name="passToken" id="passToken" value="" type="hidden">
         <input name="passport_ph" id="passport_ph" value="" type="hidden"> -->
      </div>	
   <!--    <div class="err_tip error-tip-1">
        <div class="dis_box">
          <em class="icon_error"></em>
          <span id="error-content"></span>
        </div>
      </div>  -->
			
			<!-- <div class="err_tip error-tip-2">
				<div class="dis_box"><em class="icon_error"></em><span id="error-content-2"></span></div>
			</div> -->
      <div class="country_tips c_b">
        用户输入手机号码时请正确选择区域前缀，如：台湾：+8869*******，香港：+8526*******
        <a class="fr underline" id="select_country_code" href="javascript:void(0)">帮助</a>
      </div>  
      <div class="fixed_bot">
        <input class="btn332 btn_reg_1" id="submit_button" value="发送邮件" type="submit">   
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
    

     $(document).ready(function(){
         $("#submit_button").click(function(){
            if($("#user").val()=="")
            {
             alert("邮箱不能为空");
             return false;
            }
            layer.msg('邮箱已发送请前去激活');

         });
      });
</script>
</body>
</html>