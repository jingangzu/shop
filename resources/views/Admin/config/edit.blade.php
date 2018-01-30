@extends('admin.common')
@section('title','网站配置修改页')
@section('content')
<div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>修改网站配置</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

 @if(session('msg'))
            <h3>{{ session('msg') }}</h3>
            @endif
 <form action="{{ url('admin/config/'.$conf->conf_id) }}" method="post">
  
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      {{method_field('put')}}
        {{ csrf_field() }}
     <tr>
                 
                    <th><i class="require">*</i>标题：</th>
                    <td>
                        <input type="text" name="conf_title" value="{{ $conf->conf_title }}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>配置项标题必须填写</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>名称：</th>
                    <td>
                        <input type="text" name="conf_name" value="{{ $conf->conf_name }}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>配置项名称必须填写</span>
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>内容：</th>
                    <td>
                        <input type="text" name="conf_content" value="{{ $conf->conf_content }}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>配置项内容必须填写</span>
                    </td>
                </tr>
                <tr>
                    <th>类型：</th>
                    <td>
                        <input type="radio" name="field_type" value="radio" checked onclick="showTr()">{{ $conf->field_type }}
                    </td>
                </tr>
                <tr class="field_value">
                    <th>类型值：</th>
                    <td>
                        <input type="text" class="lg" name="field_value">
                        <p><i class="fa fa-exclamation-circle yellow"></i>{{ $conf->field_value }}</p>
                    </td>
                </tr>
                <tr>
                    <th>排序：</th>
                    <td>
                        <input type="text" class="sm" name="conf_order" value="{{ $conf->conf_order }}">
                    </td>
                </tr>
                <tr>
                    <th>说明：</th>
                    <td>
                    <input type="text" class="sm" name="conf_tips" value="{{ $conf->conf_tips }}">
                        <textarea id="" cols="30" rows="10" name="conf_tips" value="{{ $conf->conf_tips }}"></textarea>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input class="btn" type="submit" value="提交">
                        <input class="btn" type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
      
     </table>
   
    </form>
       </div>
 </div>
 <script>
        showTr();
        function showTr(){
//            获取当前选中元素的默认值
            var v = $('input[name="field_type"]:checked').val();
            if(v == 'radio'){
                $('.field_value').show();
            }else{
                $('.field_value').hide();
            }
        }
    </script>

     @endsection