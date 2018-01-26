<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div style="height:300px;background:#F0FFFF">
		
		您好,请点击链接进行重置密码
		<li style="margin-top:30px;margin-left:30px">
			<a href="{{ url('/index/user/nextresetpw') }}/{{ $input['email'] }}">重置</a>
		</li>
	</div>
</body>
</html>