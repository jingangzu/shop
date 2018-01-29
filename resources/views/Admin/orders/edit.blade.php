@extends('admin.common')

@section('content')

<div id="dcMain">
<!-- 当前位置 -->
<div id="urHere"><b>></b><strong>修改订单</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>修改订单</h3>
    
    <form action="{{ url('/admin/orders').'/'.$data->id }}" method="post" >
{{ csrf_field() }}
{{method_field('put')}}
    <input type="hidden" name="id" value="{{ $data->id }}">
     @if (count($errors) > 0 ) 
            <div class="alert alert-info">
                  <ul>
                       @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li> 
                      @endforeach
                  </ul>
            </div>
      @endif
      @if( session('info'))
            {{ session('info') }}

      @endif    
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="table">
       
       <td width="80" align="right">ID</td>
       <td>
        <input type="text" name="id" placeholder=""  value="{{$data->id}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="80" align="right">订单号</td>
       <td>
        <input type="text" name="o_code" placeholder=""  value="{{$data->o_code}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">总价格</td>
       <td>
        <input  type="text"  name="price"  placeholder=""  value="{{$data->price}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">总数量</td>
       <td>
        <input  type="text"  name="num"  placeholder=""  value="{{$data->num}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">收货人</td>
       <td>
        <input  type="text"  name="uname"  placeholder=""  value="{{$data->uname}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">状态</td>
       <td>
            <select name="ostate" id="catid" class="required">
              <option <?php if($data->ostate==1){echo 'selected';}  ?> value="1">已发货</option>
             <option <?php if($data->ostate==2){echo 'selected';}  ?> value="0">待发货</option>
          </select>
     </td>
      </tr>
      
      
     </table>
  <input type="submit" value="提交"  size="40" class="inpMain">
 
 </form>
   </div>
 <div class="clear"></div>
@stop