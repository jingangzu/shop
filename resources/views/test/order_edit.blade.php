<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加订单</title>
</head>
<body>
	<form action="{{ url('/admin/order') }}/1" method="post" >
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		商品:<input type="text">
		<button>提交</button>
	</form>
</body>
</html>