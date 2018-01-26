@extends('admin.common')

@section('title','添加商品')

@section('content')

 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加商品</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="{{ url('/admin/goods') }}" class="actionBtn">商品列表</a>添加商品</h3>
            @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form id='art_form' action="{{ url('/admin/goods') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

     <table width="100%"  class='table'>
      <tr>
       <td width="50" align="right">商品名称</td>
       <td>
        <input id="gn"  type="text" name="goods_name" value="{{ old('goods_name')}}" size="80" class="inpMain" /><span id='msg1'>请填写商品名称</span>
       </td>
      </tr>
      <script type="text/javascript">
      // alert($);
        $(function(){
              $('#gn').on('blur',function(){
              var gn = $(this).val();
              var res = gn.match(/\w+/);
              if(!res){

                 $('#msg1').text('商品名称不能为空');
              $('#msg1').attr('style','color:red');
              }
             

            });
        });
           


      </script>
      <tr>
       <td align="right">商品分类</td>
       <td>
        <select name="cid">
         
                           <option value="1" 
                              @if(old('cid')==1)
                                          selected
                              @endif
                                       > 电子数码</option>
                                    <option value="4"
                              @if(old('cid')==4)
                                          selected
                              @endif
                                    >- 智能手机</option>
                                    <option value="5"
                              @if(old('cid')==5)
                                          selected
                              @endif
                                    >- 平板电脑</option>


                                    <option value="2"
                                    @if(old('cid')==2)
                                          selected
                              @endif
                                    > 家居百货</option>
                                    <option value="3"
                                    @if(old('cid')==3)
                                          selected
                              @endif
                                    > 母婴用品</option>
                          </select>
       </td>
      </tr>
      <tr>
       <td align="right">商品价格</td>
       <td>
        <input type="text" name="goods_price" value="{{ old('goods_price') }}" size="40" class="inpMain" />
       </td>
      </tr>
      
      <tr> 
             <td align="right">库存</td>
       <td>
        <input type="text" name="goods_stock" value="{{ old('goods_stock') }}" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">简单描述</td>
       <td>
        <input type="text" name="goods_description" value="{{ old('goods_description')}}" size="50" class="inpMain" />
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