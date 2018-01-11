<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加订单</title>
</head>
<body>
	<form action="{{ url('/order') }}" method="post" >
		{{ csrf_field() }}
		商品:<input type="text">
		<button>提交</button>
	</form>
</body>
</html>