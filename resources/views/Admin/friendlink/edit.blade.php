@extends('admin.common')

@section('title','编辑友情链接')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>编辑友情链接</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="{{ url('/admin/friendlink') }}" class="actionBtn">友情链接列表</a>添加友情链接</h3>
            @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form id='art_form' action="{{ url('/admin/friendlink').'/'.$data->id }}" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
        {{ method_field('put') }}
     <table width="100%"  class='table'>
      <tr>
       <td width="100" align="right">友情链接名称</td>
       <td>
        <input id="gn"  type="text" name="name" value="{{ $data->name }}" size="40" class="inpMain" /><span id='msg1'>请填写链接名称</span>
       </td>
      </tr>
      <script type="text/javascript">
        $(function(){
              $('#gn').on('blur',function(){
              var gn = $(this).val();
              if(!gn){

                 $('#msg1').text('链接名称不能为空');
              $('#msg1').attr('style','color:red');
              }else{
                $('#msg1').text('符合要求');
                $('#msg1').attr('style','color:green');

              }
             

            });
        });

      </script>
     
      <tr>
       <td align="right">链接URL</td>
       <td>
        <input id="url" type="text" name="url" value="{{ $data->url }}" size="40" class="inpMain" /><span id='msg2'>填写网址</span>
       </td>
      </tr>
       <script type="text/javascript">
        $(function(){

              $('#url').on('blur',function(){
              var gn = $(this).val();
              var res = gn.match(/^(http|ftp|https):\/\/.*?/);
              if(!res){

                 $('#msg2').text('请填写网址');
              $('#msg2').attr('style','color:red');
              }else{
                 $('#msg2').text('符合要求');
                 $('#msg2').attr('style','color:green');
              }
            });
          
       });
      </script>
      <tr>
       <td align="right">图片</td>
       <td>
       <div style="height:80px;position:relative;">
        <img id='image' src="{{ url('linkpic/').'/'.$data->image }}" style='position:absolute;left:0px;' height='100%'>
        <input id="file"  type="file" name="image" size="10" class="inpFlie goods_pic" style='position:absolute;left:0px;display:block;height:80px;opacity:0;width:80px;'></input>
        </div>
       </td>
      </tr>
      <script type="text/javascript">

      $('#file').on('change',function(){
          $.post("{{ url('/admin/friendlink').'/'.$data->id }}",{'_token':{{ csrf_token()}},'_method':'put','image':$()} )
      });

      </script>
      <tr>
       <td></td>
       <td>
        <input id="sub" name="submit" class="btn" type="submit" value="提交" />
       </td>
      </tr>
     </table>
    </form>
           </div>
 </div>
 <div class="clear"></div>
 <script type="text/javascript">
 @if(session('msg'))
      layer.msg("{{ session('msg') }}");

 @endif
 </script>
@stop