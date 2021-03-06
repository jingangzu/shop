
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
      <a href="/admin/personage/{{ session('user')->id }}">编辑我的个人资料</a>
      
      <a href="/admin/resetpw/{{ session('user')->id }}">修改密码</a>
     </div>
    </li>
    <li class="noRight"><a href="/admin/loginout">退出
    </a></li>
   </ul>
  </div>
 </div>
</div>
<!-- dcHead 结束 --> <div id="dcLeft"><div id="menu">
 <ul class="top">
  <li><a href="index.html"><i class="home"></i><em>管理首页</em></a></li>
 </ul>
 <ul class="top">
  <li><a href="{{url('admin/config')}}"><i class="home"></i><em>网站配置</em></a></li>
 </ul>
 <ul>
  <li><a href="{{url('/admin/show/index')}}"><i class="show"></i><em>首页幻灯广告</em></a></li>
 </ul>
 <ul>
  <li><a href="{{url('/admin/advertisement/index')}}"><i class="show"></i><em>广告位</em></a></li>
 </ul>
   <ul>
  <li><a href="{{ url('/admin/cate/list') }}"><i class="productCat"></i><em>商品分类</em></a></li>

  <li><a href="{{ url('/admin/goods') }}"><i class="product"></i><em>商品列表</em></a></li>
 </ul>
  <ul>
  <li><a href="{{url('/admin/users')}}"><i class="article"></i><em>用户管理</em></a></li>
  <li><a href="{{url('/admin/config')}}"><i class="article"></i><em>网站配置</em></a></li>
  <li><a href="{{url('/admin/config/create')}}"><i class="article"></i><em>添加网站配置</em></a></li>

 </ul>
   <ul class="bot">
  <li><a href="{{url('/admin/orders')}}"><i class="mobile"></i><em>商品订单管理</em></a></li>

  <li><a href="{{url('/admin/role/create')}}"><i class="manager"></i><em>添加角色</em></a></li>
  <li><a href="{{url('/admin/role')}}"><i class="manager"></i><em>角色列表</em></a></li>
  <li><a href="{{url('/admin/permission/create')}}"><i class="manager"></i><em>添加权限</em></a></li>
  <li><a href="{{url('/admin/permission')}}"><i class="manager"></i><em>权限列表</em></a></li>
  <li><a href="{{url('/admin/recommend/index')}}"><i class="manager"></i><em>推荐位管理</em></a></li>
  <li><a href="{{ url('/admin/frindlink/show') }}"><i class="backup"></i><em>友情链接</em></a></li>
  
 </ul>
</div></div>
@section('content')

@show

<div id="dcFooter">
 <div id="footer">
  <div class="line"></div>
  <ul>
。
  </ul>
 </div>
</div><!-- dcFooter 结束 -->
<div class="clear"></div> </div>
</body>
</html>