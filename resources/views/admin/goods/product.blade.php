@extends('admin.common')

@section('title','管理中心 - 商品列表')
@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>商品列表</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{ url('/admin/goods/create') }}" class="actionBtn add">添加商品</a>商品列表</h3>
    <div class="filter">
    <form action="{{ url('/admin/goods') }}" method="get">
     <select name="cid">
      <option value="0">未分类</option>
                  <option value="1"> 电子数码</option>
                        <option value="4">- 智能手机</option>
                        <option value="5">- 平板电脑</option>
                        <option value="2"> 家居百货</option>
                        <option value="3"> 母婴用品</option>
                 </select>
     <input name="keyword" type="text" class="inpMain" value="{{ $where['keyword'] }}" size="20" />
     <input name="submit" class="btnGray" type="submit" value="筛选" />
    </form>
    <span>
        <a class="btnGray" href="product.php?rec=sort">开始筛选首页商品</a>
        </span>
    </div>
        <div id="list">
    <form name="action" method="post" action="product.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       
        <th width="40" align="center">编号</th>
        <th align="left">商品名称</th>
        <th  align="center">商品分类</th>
        <th  align="center">商品价格</th>
        <th  width='180' align="center">商品描述</th>
        <th  align="center">库存</th>
        <th  align="center">销量</th>
       <th align="center">状态</th>
        <th  align="center">操作</th>
      </tr>

      @foreach($data as $v)
       <tr>
     
        <td align="center">{{ $v->id }}</td>
        <td><a href="product.php?rec=edit&id=15">{{ $v->goods_name }}</a></td>
        <td align="center">{{ $v->cid }}</a></td>
        <td align="center">{{ $v->goods_price }}</td>
        <td style="width:200px" align="center" ><div style="position:relative;width:200px;white-space:nowrap;overflow:hidden; text-overflow:ellipsis;">{{ $v->goods_description }}</div></td>
        <td align="center">{{ $v->goods_stock}}</td>
        <td align="center">{{ $v->goods_xiaoliang }}</td>
        <td align="center">
        @if($v->goods_status==0)
              未上架
        @elseif($v->goods_status==1)
              已上架
        @endif</td>
        <td align="center">
                  <a href="{{ url('admin/goods').'/'.$v->id.'/edit' }}">编辑</a> | <a href="{{url('admin/goods/picture').'/'.$v->id}}">添加图片</a> | <a href="{{url('admin/goods/up').'/'.$v->id}}">
                  @if($v->goods_status==0)
                  <a href="{{url('admin/goods/up').'/'.$v->id}}">
                  上架
                   @elseif($v->goods_status==1)
                   <a href="{{url('admin/goods/down').'/'.$v->id}}">
                   下架
                   @endif

                  </a> | <a href="javascript:;" onclick="del({{$v->id}});">删除</a>


                 </td>
      </tr>
      @endforeach
           
           
          </table>
            <script type="text/javascript">
            function del(id){

                 $.post('{{url('admin/goods/')}}/'+id,{'_method':'delete','_token':'{{ csrf_token() }}'},function(data){
                      console.log(data);

                      // location.reload();
                      location.href=location.href;

                 });


            }

              

         

            </script>
    {!!  $data->appends($where)->render()  !!}
                 </div>
 </div>
 <div class="clear"></div>
 @stop