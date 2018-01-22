@extends('layouts.admin')
@section('title','商城后台网站配置页面')
@section('content')
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>网站配置</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        
         <form action="{{ url('admin/config/changecontent') }}" method="post">
       
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>{{ config('webconfig.web_title') }}</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    <tr>
                {{csrf_field()}}
                        <th class="tc" width="5%">排序</th>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>名称</th>
                        <th>内容</th>

                        <th>操作</th>
                    </tr>


                    @foreach($data as $k=>$v)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{ $v->conf_id }})" value="{{ $v->conf_order }}">
                        </td>
                        <td class="tc">{{ $v->conf_id }}</td>
                        <td>
                            <a href="#">{{ $v->conf_title }}</a>
                        </td>
<!-- {{--                        <td>{{ mb_substr($v->user_pass,0,30,'utf-8').'...' }}</td>--}} -->
                        <td >{{ $v->conf_name }}</td>

                        <td >
                            <input type="hidden" name="conf_id[]" value="{{ $v->conf_id }}">
                            {!! $v->conf_contents !!}
                        </td>

                        <td>
                            <a href="{{ url('admin/config/'.$v->conf_id.'/edit') }}">修改</a>
                            <a href="javascript:;" onclick="delConfig({{ $v->conf_id }})">删除</a>
                        </td>
                    </tr>
                     @endforeach
                 <!--    <tr>
                        <th></th>
                        <td colspan="5">
                            <input class="btn" type="submit" value="提交">
                        </td>
                    </tr>  -->  

                </table>

                {{--<div class="page_list">--}}
                    {{--{!! $data->appends(['keywords'=>$input['keywords']])->render() !!}--}}
                {{--</div>--}}


                {{--<div class="page_list">--}}
                    {{--{!! $data->render() !!}--}}
                {{--</div>--}}

            </div>
        </div>

    </form>


    </div>
 </div> 

   <script>
        function delConfig(id){
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //向服务器发送ajax请求，删除当前id对应的用户数据
//                $.post('请求的路由','携带的参数','处理成功后的返回结果')
                $.post('{{ url('admin/config/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
//                    data就是服务器返回的json数据
//                    console.log(data);
//                    JSON.parse()
//                    JSON.stringify()
                    if(data.status == 0){
                        layer.msg(data.message, {icon: 6});
                        setTimeout(function(){
                            window.location.href = location.href;
                        },1000);


                    }else{
                        layer.msg(data.message, {icon: 5});

                        window.location.href = location.href;
                    }

                })

//
            }, function(){

            });
        }


         //排序
        function changeOrder(obj,id){
//            获取当前文本框的值
              var v = $(obj).val();
//            $.post('路由','参数','执行后的返回结果')
            $.post('{{ url('admin/config/changeOrder').'/' }}'+id,{'_token':"{{ csrf_token() }}",'conf_id':id,'conf_order':v},function(data){
               // console.log(data);
                if(data.status == 0){
//                    如果修改成功，给用户一个修改成功的提示，然后刷新页面
                    layer.msg(data.msg);

                    setTimeout(function(){
                        window.location.href = location.href;
                    },1000);
                }else{
                    layer.msg(data.msg);
                }
            })
        }
    </script>

 @endsection