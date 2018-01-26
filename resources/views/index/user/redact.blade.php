@extends('index.user.layout')

@section('content')

<script src="/index/js/city.js/cityJson.js"></script>
<script src="/index/js/city.js/citySet.js"></script>
<script src="/index/js/city.js/Popt.js"></script>
<script src="/index/js/jquery.min.js" language="javascript" type="text/javascript" ></script>

 <div class="zuirifip">
        	<!--基本信息-->
            <div class="basedexinxi">
            	<a href="#">基本信息</a>
            </div>
            <!--基本信息结束--> 
            <!--修改基本信息开始-->

            <form action="/index/user/doredact" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
	            <div class="baseopxg">
	            	<!--第一部分-->
	                <div class="tirstbf">
	                	<span>

	                    	<!-- <img src="/avatar/{{ $data->avatar }}"/> -->
	                        
	                        <div id="div1"><img src="/avatar/{{ $data->avatar }}" id="avatar" tapmode onclick="getPicture()"  style="cursor: hand"/></div>
     <input type="file" name="avatars" onchange="setImage(this,div1,avatar);" id="photo" value="{{ $data->avatar }}" style="display: none"/><a href="#">编辑头像</a>
     <script type="text/javascript">

 function getPicture(){
    $("#photo").click();
    }

function setImage(docObj, localImagId, imgObjPreview) {
    var f = $(docObj).val();
    f = f.toLowerCase();
    var strRegex = ".bmp|jpg|jpeg$";
    var re=new RegExp(strRegex);
    if (re.test(f.toLowerCase())){
         //return true;
         // return true;
    }
    else{
        alert("请选择正确格式的图片");
         file = $("#photo");
         file.after(file.clone());
         file.remove();
        return false;
    }
    if (docObj.files && docObj.files[0]) {
        //火狐下，直接设img属性
        //imgObjPreview.style.display = 'block';
        //imgObjPreview.style.width = '140px';
        //imgObjPreview.style.height = '187px';
        //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式  
        imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);

    } else {
        //IE下，使用滤镜
        docObj.select();
        var imgSrc = document.selection.createRange().text;
        //必须设置初始大小
        //localImagId.style.width = "140px";
        //localImagId.style.height = "187px";
        //图片异常的捕捉，防止用户修改后缀来伪造图片
        try {
            localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
            localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
        } catch(e) {
            alert("您上传的图片格式不正确，请重新选择!");
            return false;
        }
        imgObjPreview.style.display = 'none';
        document.selection.empty();
    }
    return true;
}

</script>
	                    </span>
	                    <tr><td>
	                    <em>用户名：</em>
	                    <input class="shurukuang" type="text" name="name" value="{{ $user->name }}" /></td></tr>
	                   
	                </div>
	                <!--第二部分-->
	       
	                <div class="thetwobf">
	                	<em>昵称：</em><input class="shurukuang" type="text" name="nickname" value="{{ $data->nickname }}" />
	                </div>
	              
	                <div class="thetwobf">
	                	<em>手机号：</em><input class="shurukuang" type="text" name="phone" value="{{ $data->phone }}"/>
	                </div>
	       
	                <div class="thetwobf">
	                	<em>邮箱：</em><input class="shurukuang" type="text" name="email" value="{{ $user->email }}"/>
	                </div>
	                  <div class="thetwobf">
	                  
	                	<em>性别：</em>
	                  <td>

		                  
		                  <label><input type='radio' name='sex' value='2'@if($data->sex == 2)checked @endif />男</label>
		                  <input type='radio' name='sex' value='1' @if($data->sex == 1)checked @endif />女
		                  <label><input type='radio' name='sex' value='3'@if($data->sex == 3)checked @endif />保密</label>
		                  
		                </td>
		               
	                </div>
	               
	               
	               
	                <div class="thetwobf">
	                	<!-- <a href="#" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px" type="submit">保存</a> -->
						<input style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#2F4F4F; margin-left:213px" class="submit" type="submit" name="submit" value="立即修改" >
						
	                </div>
	            </div>  
            </form>	
            <!--修改基本信息结束-->
        </div>

@endsection