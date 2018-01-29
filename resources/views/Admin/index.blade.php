@extends('admin.common')
@section('title','商城后台系统')

@section('style')
<link href="css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="/admin/layer/layer.js"></script>

@stop

@section('content')
 <!-- 当前位置 -->
<div id="dcMain"> <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心</div>  <div id="index" class="mainBox" style="padding-top:18px;height:auto!important;height:550px;min-height:550px;">
    
   <div id="douApi"></div>
      <div class="indexBox">
    <div class="boxTitle">单页面快速管理</div>
    <ul class="ipage">
      
     <a href="#">
    <script>
          $('.ipage').on('click', function(){
            layer.open({
              type: 2,
                area: ['1000px', '900px'],
              content: 'http://www.dsb.cn/' //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
            }); 
          });
    </script>
     公司简介</a> 
      
     <a href="page.php?rec=edit&id=2" class="child1">企业荣誉</a> 
      
     <a href="page.php?rec=edit&id=3" class="child1">发展历程</a> 
      
     <a href="page.php?rec=edit&id=4" class="child1">联系我们</a> 
      
     <a href="page.php?rec=edit&id=5">人才招聘</a> 
      
     <a href="page.php?rec=edit&id=6">营销网络</a> 
          <div class="clear"></div>
    </ul>
   </div>
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="indexBoxTwo">
    <tr>
     <td width="65%" valign="top" class="pr">
      <div class="indexBox">
       <div class="boxTitle">网站基本信息</div>
       <ul>
        <table width="100%" border="0" cellspacing="0" cellpadding="7" class="tableBasic">
         <tr>
          <td width="120">单页面数：</td>
          <td><strong>6</strong></td>
          <td width="100">文章总数：</td>
          <td><strong>10</strong></td>
         </tr>
         <tr>
          <td>商品总数：</td>
          <td><strong></strong></td>
          <td>系统语言：</td>
          <td><strong>zh_cn</strong></td>
         </tr>
         <tr>
          <td>URL 重写：</td>
          <td><strong>关闭<a href="system.php" class="cueRed ml">（点击开启）</a> 
           </strong></td>
          <td>编码：</td>
          <td><strong>UTF-8</strong></td>
         </tr>
         <tr>
          <td>站点地图：</td>
          <td><strong>开启</strong></td>
          <td>站点模板：</td>
          <td><strong>default</strong></td>
         </tr>
         <tr>
          <td>DouPHP版本：</td>
          <td><strong>v1.3 Release 20160125</strong></td>
          <td>服务器日期：</td>
          <td><strong></strong></td>
         </tr>
        </table>
       </ul>
      </div>
     </td>
     <td valign="top" class="pl">
      <div class="indexBox">
       <div class="boxTitle"></div>
      </div>
     </td>
    </tr>
   </table>
   <div class="indexBox">
    <div class="boxTitle">服务器信息</div>
    <ul>
     <table width="100%" border="0" cellspacing="0" cellpadding="7" class="tableBasic">
      <tr>
       <td width="120" valign="top">PHP 版本：</td>
       <td valign="top"><?PHP echo PHP_VERSION; ?></td>
       <td width="100" valign="top">MySQL 版本：</td>
       <td valign="top">5.5.40</td>
      

      </tr>
      <tr>
       <td valign="top">文件上传限制：</td>
       <td valign="top">
         

         <?PHP
echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件";
?>
       </td>
       <td valign="top">GD 库支持：</td>
       <td valign="top">是</td>
      
      </tr>
     </table>
    </ul>
   </div>
  
  <div class="indexBox">
    <div class="boxTitle">网站用户信息</div>
    <ul>
     <table width="100%" border="0" cellspacing="0" cellpadding="7" class="tableBasic">
      <tr>
       <td width="120" valign="top">后台管理员人数：</td>
       <td valign="top">{{ session('allusers') }}</td>
       <td width="100" valign="top">前台总会员人数：</td>
       <td valign="top">{{ session('all') }}</td>
      </tr>
      
     </table>
    </ul>
   </div>
    
  </div>
 </div>
 <div class="clear"></div>
 

 @endsection
