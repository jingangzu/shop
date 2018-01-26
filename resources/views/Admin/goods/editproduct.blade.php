@extends('admin.common')

@section('title','编辑商品')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>编辑商品</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="{{ url('/admin/goods') }}" class="actionBtn">商品列表</a>编辑商品</h3>
            @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif


    <form id='art_form' action="{{url('/admin/goods').'/'.$data->id}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}

     <table width="100%"  class='table'>
      <tr>
       <td width="90" align="right">商品名称</td>
       <td>
        <input type="text" name="goods_name" value="{{$data->goods_name}}" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">商品分类</td>
       <td>
        <select name="cid">
                @foreach($cates as $k=>$v)
                        <option value="{{$v->cate_id}}" 
                @if($data->cid==$v->id)
                            selected 
                @endif
                @if($v->cate_pid==0)
                            disabled
                @endif
                           >{{ $v->catenames }}</option>
                 @endforeach
         </select>
       </td>
      </tr>
      <tr>
       <td align="right">商品价格</td>
       <td>
        <input type="text" name="goods_price" value="{{$data->goods_price}}" size="40" class="inpMain" />
       </td>
      </tr>
       <tr> 
             <td align="right">缩略图</td>
       <td>
        <input type="file" name="picture"/>
       </td>
      </tr>
      <tr> 
             <td align="right">库存</td>
       <td>
        <input type="text" name="goods_stock" value="{{$data->goods_stock}}" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">简单描述</td>
       <td>
        <input type="text" name="goods_description" value="{{$data->goods_description}}" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        
        
        <input name="submit" class="btn" type="submit" value="提交" />
       </td>
      </tr>
     </table>
    </form>
           </div>
 </div>
 <div class="clear"></div>
@stop