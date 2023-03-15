<!DOCTYPE html>
<html lang="en">
<head>
	@include('components.header')
	<meta charset="UTF-8">
	<title>change_profile</title>
	<script type="application/javascript" src="{{asset("js/navCore.js")}}"></script>
	<link rel="stylesheet" href="{{asset("css/navCore.css")}}}">
	<link rel="stylesheet" href="{{asset("css/navStyle.css")}}}">
	<script src="{{asset("js/user/change.js")}}"></script>
	<link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
	<script src="https://unpkg.com/jcrop"></script>
</head>
<body>
<div class="container-fluid col-12">
	<form method="POST" action="#">
		<div class="mb-3 row">
			<label for="username" class="col-sm-3 col-lg-2 col-form-label">昵称</label>
			<div class="col-sm-9 col-lg-10">
				<input type="text" readonly class="form-control-plaintext" id="username" value="114514">
			</div>
		</div>
		<div class="mb-3 row">
			<label for="qq" class="col-sm-3 col-lg-2 col-form-label">QQ</label>
			<div class="col-sm-9 col-lg-10">
				<input type="text" readonly class="form-control-plaintext" id="qq" value="114514">
			</div>
		</div>
		<div class="mb-3 row">
			<label for="sign" class="col-sm-3 col-lg-2 col-form-label">签名</label>
			<div class="col-sm-9 col-lg-10">
				<input type="text" readonly class="form-control-plaintext" id="sign" value="114514">
			</div>
		</div>
		<div class="mb-3 row">
			<label for="intro" class="col-sm-3 col-lg-2 col-form-label">自我介绍</label>
			<div class="col-sm-9 col-lg-10">
				<input type="text" readonly class="form-control-plaintext" id="intro" value="114514">
			</div>
		</div>
		<button class="btn btn-outline-danger" id="abort">取消</button>
		<input class="btn btn-outline-success" type="submit" id="submit">
	</form>
	<button class="btn btn-outline-primary" id="edit">修改</button>
</div>
</body>
</html>
