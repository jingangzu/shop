@extends('admin.common')

@section('title','编辑商品')

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
         
                           <option value="1"> 电子数码</option>
                                    <option value="4">- 智能手机</option>
                                    <option value="5">- 平板电脑</option>
                                    <option value="2"> 家居百货</option>
                                    <option value="3"> 母婴用品</option>
                          </select>
       </td>
      </tr>
      <tr>
       <td align="right">商品价格</td>
       <td>
        <input type="text" name="goods_price" value="{{$data->goods_price}}" size="40" class="inpMain" />
       </td>
      </tr>
      <!-- <tr>

       <td align="right">缩略图</td>
               
       <td><div style="height:80px;position:relative;"><div></div>
        <img id='image1' src="/images/default.jpg" style='position:absolute;left:0px;' height='100%'>
        <input  type="file" name="image1" size="10" class="inpFlie goods_pic" style='position:absolute;left:0px;display:block;height:80px;opacity:0;width:80px;'></input>
        <img  id='image2' src="/images/default.jpg" style='position:absolute;left:100px;' height='100%'>
        <input   type="file" name="image2" size="10" class="inpFlie goods_pic" style='position:absolute;left:100px;display:block;height:80px;opacity:0;width:80px;'></input>
        <img id='image3'  src="/images/default.jpg" style='position:absolute;left:200px;' height='100%'>
        <input  type="file" name="image3" size="10" class="inpFlie goods_pic" style='position:absolute;left:200px;display:block;height:80px;opacity:0;width:80px;'></input>
        <img id='image4'  src="/images/default.jpg" style='position:absolute;left:300px;' height='100%'>
        <input  type="file" name="image4" size="10" class="inpFlie goods_pic" style='position:absolute;left:300px;display:block;height:80px;opacity:0;width:80px;'></input>
        <img id='image5'  src="/images/default.jpg" style='position:absolute;left:400px;' height='100%'>
        <input  type="file" name="image5" size="10" class="inpFlie goods_pic" style='position:absolute;left:400px;display:block;height:80px;opacity:0;width:80px;'></input>
       
        </div>
                        <!-- <input type="hidden" size="50" id="art_thumb" name="art_thumb">

                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                        {{--<script src="http://www.myblog.com/resources/org/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>--}}
                        {{--<link rel="stylesheet" type="text/css" href="http://www.myblog.com/resources/org/uploadify/uploadify.css">--}} 
                        <script type="text/javascript">
                            $(function () {
                                $(".goods_pic").change(function () {
                                    var imgPath = $(this).val();
                                // console.log(imgPath);
                                if (imgPath == "") {
                                    alert("请选择上传图片！");
                                    return;
                                }
                   
                                //判断上传文件的后缀名
                               
                                      var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                      if (strExtension != 'jpg' && strExtension != 'gif'
                                          && strExtension != 'png' && strExtension != 'bmp') {
                                          alert("请选择图片文件");
                                          return;
                                      }

                                

                           // var myform = document.getElementById('art_from');


                                //将整个form打包进formData对象中传到服务器。
//                                var formData = new FormData($('#art_form')[0]);




                                //只将文件上传表单项的内容放入formData对象
                                var formData = new FormData();
                                formData.append($(this).attr('name'), $(this)[0].files[0]);
                                formData.append('_token', '{{csrf_token()}}');
                                                            // console.log(formData);


                                var id=$(this).attr('name');
                                 $.ajax({
                                    type: "POST",
                                    url: "/admin/goods/picture",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {
//                                        $('#art_thumb_img').attr('src','/'+data);
                                        if(data==11){
                                         layer.alert('上传失败');
                                        
                                        // $('#art_thumb').val(data);
                                        }else{
                                            $('#'+id).attr('src','{{ env('QINIU_YUMING') }}'+data);
                                        }
                                      
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        layer.alert("上传失败，请检查网络后重试");
                                    }
                                });
                                });
                            });
                           
                        </script></tr> -->
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