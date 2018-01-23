@extends('admin.common')

@section('title','管理中心 - 友情链接列表')
@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>友情链接列表</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="{{ url('/admin/friendlink/create') }}" class="actionBtn add">添加友情链接</a>友情链接列表{{ session('msg')}}</h3>
    <div class="filter">

    <form action="{{ url('/admin/friendlink') }}" method="get">
     <input name="name" type="text" class="inpMain" value="{{ $where['name'] }}" size="20" />
     <input name="submit" class="btnGray" type="submit" value="筛选" />
    </form>
    </div>
        <div id="list">
    <form name="action" method="post" action="product.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       
        <th width="40" align="center">编号</th>
        <th align="center">友情链接名称</th>
        <th  align="center">URL</th>
        <th  align="center">图片</th>
        <th  align="center">状态</th>        
        <th  align="center">操作</th>
      </tr>

      @foreach($data as $v)
       <tr>
     
        <td align="center">{{ $v->id }}</td>
        <td align="center">{{ $v->name }}</a></td>
        <td align="center">{{ $v->url }}</td>
        <td align="center"><img src="{{ url('linkpic/'.$v->image) }}" height="30" /></td>
        <td align="center">
        @if($v->status==0)
            隐藏
        @elseif($v->status==1)
             显示
        @endif</td>
        <td align="center">
                  <a href="{{ url('admin/friendlink').'/'.$v->id.'/edit' }}">编辑</a> |
                  @if($v->status==0)
                   <a href="{{url('admin/frindlink/show').'/'.$v->id}}">
                  显示</a>
                   @elseif($v->status==1)
                   <a href="{{url('admin/frindlink/hide').'/'.$v->id}}">
                   隐藏</a> 
                   @endif

                  | <a href="javascript:;" onclick="del({{$v->id}});">删除</a>


                 </td>
      </tr>
      @endforeach
           
           
          </table>
          @if(session('msg'))
          <script type="text/javascript">
                  layer.msg("{{session('msg')}}");
          </script>
                               

          @endif
            <script type="text/javascript">
            function del(id){
              layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //向服务器发送ajax请求，删除当前id对应的商品数据
                $.post('{{url('admin/friendlink')}}/'+id,{'_method':'delete','_token':'{{ csrf_token() }}'},function(data){
                      location.href=location.href;
                        });
//
            }, function(){

            });



            }


            </script>
    {!!  $data->appends($where)->render()  !!}
                 </div>
 </div>
 <div class="clear"></div>
 @stop