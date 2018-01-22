<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div style="height:300px;background:#F0FFFF">
		
		{{ $input['name'] }}:您好,请点击链接进行激活
		<li style="margin-top:30px;margin-left:30px">
			<a href="{{ url('/index/user/active') }}/{{ $input['email'] }}">激活账号</a>
		</li>
	</div>
</body>
</html>