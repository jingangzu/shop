@extends('admin.common')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>商品列表</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{ url('/admin/goods/add') }}" class="actionBtn add">添加商品</a>商品列表</h3>
    <div class="filter">
    <form action="product.php" method="post">
     <select name="cat_id">
      <option value="0">未分类</option>
                  <option value="1"> 电子数码</option>
                        <option value="4">- 智能手机</option>
                        <option value="5">- 平板电脑</option>
                        <option value="2"> 家居百货</option>
                        <option value="3"> 母婴用品</option>
                 </select>
     <input name="keyword" type="text" class="inpMain" value="" size="20" />
     <input name="submit" class="btnGray" type="submit" value="筛选" />
    </form>
    <span>
    <a class="btnGray" href="product.php?rec=re_thumb">更新商品缩略图</a>
        <a class="btnGray" href="product.php?rec=sort">开始筛选首页商品</a>
        </span>
    </div>
        <div id="list">
    <form name="action" method="get" action="{{ url('/admin/goods/index') }}">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

      <tr>
        <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
        <th width="40" align="center">编号</th>
        <th align="left">商品名称</th>
        <th width="80" align="center">商品分类</th>
        <!-- <th width="70" align="center">商品描述</th> -->
       <th width="80" align="center">添加日期</th>
        <th width="80" align="center">操作</th>
      </tr>
   
     <tr>

        <!-- <td align="center"><input type="checkbox" name="checkbox[]" value="1" /></td> -->
        <td align="center"></td>
        <td></td>
        <td align="center"><!-- <a href="product.php?cat_id=5"> --><!-- </a></td> -->
        <!-- <td>{{ $item->goods_attributer }}</td> -->
        <td align="center"></td>
        <td align="center">
                  <a href="product.php?rec=edit&id=1">编辑</a> | <a href="product.php?rec=del&id=1">删除</a>
                 </td>
      </tr>
      
          </table>
          
    <div class="action">
     <select name="action" onchange="douAction()">
      <option value="0">请选择...</option>
      <option value="del_all">删除</option>
      <option value="category_move">移动分类至</option>
     </select>
     <select name="new_cat_id" style="display:none">
      <option value="0">未分类</option>
                  <option value="1"> 电子数码</option>
                        <option value="4">- 智能手机</option>
                        <option value="5">- 平板电脑</option>
                        <option value="2"> 家居百货</option>
                        <option value="3"> 母婴用品</option>
                 </select>
     <input name="submit" class="btn" type="submit" value="执行" />
    </div>
    </form>
    </div>
    <div class="clear"></div>
    <!-- {!! $data->appends($where)->render() !!}   -->            </div>
 </div>
 <div class="clear"></div>
@stop