
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>@yield('title')</title>
<meta name="keywords" content="简洁,实用,后台管理,静态网页,模板下载" /> 
<meta name="description" content="简洁实用的后台管理静态网页模板下载。" /> 
<meta name="Copyright" content="Douco Design." />


<link href="/css/public.css" rel="stylesheet" type="text/css">
<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/global.js"></script>
<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>
<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="dcWrap"> <div id="dcHead">
 <div id="head">
  <div class="logo"><a href="index.html"><img src="/images/dclogo.gif" alt="logo"></a></div>
  <div class="nav">
   <ul>
    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
     <div class="drop mTopad"><a href="product.php?rec=add">商品</a> <a href="article.php?rec=add">文章</a> <a href="nav.php?rec=add">自定义导航</a> <a href="show.html">首页幻灯</a> <a href="page.php?rec=add">单页面</a> <a href="manager.php?rec=add">管理员</a> <a href="link.html"></a> </div>
    </li>
    <li><a href="../index.php" target="_blank">查看站点</a></li>
    <li><a href="index.php?rec=clear_cache">清除缓存</a></li>
    <li><a href="http://help.douco.com" target="_blank">帮助</a></li>
    <li class="noRight"><a href="module.html">DouPHP+</a></li>
   </ul>
   <ul class="navRight">
     @if(!empty(session('user')))
        <li class="M noLeft"><a href="JavaScript:void(0);">您好: {{ session('user')->name }}</a>

    @endif
     <div class="drop mUser">
      <a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>
      <a href="manager.php?rec=cloud_account">设置云账户</a>
     </div>
    </li>
    <li class="noRight"><a href="/admin/loginout">退出</a></li>


   </ul>
  </div>
 </div>
</div>
<!-- dcHead 结束 --> <div id="dcLeft"><div id="menu">
 <ul class="top">
  <li><a href="index.html"><i class="home"></i><em>管理首页</em></a></li>
 </ul>
 <ul>
  <li><a href="system.html"><i class="system"></i><em>系统设置</em></a></li>
  <li><a href="nav.html"><i class="nav"></i><em>自定义导航栏</em></a></li>
  <li><a href="show.html"><i class="show"></i><em>首页幻灯广告</em></a></li>
  <li><a href="page.html"><i class="page"></i><em>单页面管理</em></a></li>
 </ul>
   <ul>
  <li><a href="product_category.html"><i class="productCat"></i><em>商品分类</em></a></li>

  <li><a href="{{ url('/admin/goods') }}"><i class="product"></i><em>商品列表</em></a></li>
 </ul>
  <ul>
  <li><a href="{{url('/admin/users')}}"><i class="article"></i><em>用户管理</em></a></li>

 </ul>
   <ul class="bot">
  <li><a href="{{url('/admin/orders')}}"><i class="mobile"></i><em>商品订单管理</em></a></li>
  <li><a href="theme.html"><i class="theme"></i><em>设置模板</em></a></li>
  <li><a href="{{url('/admin/role/create')}}"><i class="manager"></i><em>添加角色</em></a></li>
  <li><a href="{{url('/admin/role')}}"><i class="manager"></i><em>角色列表</em></a></li>
  <li><a href="{{url('/admin/permission/create')}}"><i class="manager"></i><em>添加权限</em></a></li>
  <li><a href="{{url('/admin/permission')}}"><i class="manager"></i><em>权限列表</em></a></li>
  <li><a href="{{ url('/admin/friendlink') }}"><i class="backup"></i><em>友情链接</em></a></li>
  <li><a href="manager.php?rec=manager_log"><i class="managerLog"></i><em>操作记录</em></a></li>
 </ul>
</div></div>
@section('content')

@show

<div id="dcFooter">
 <div id="footer">
  <div class="line"></div>
  <ul>
   版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
  </ul>
 </div>
</div><!-- dcFooter 结束 -->
<div class="clear"></div> </div>
</body>
</html>