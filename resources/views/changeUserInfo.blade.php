<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>change_profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
	<script src="{{asset("js/change.js")}}"></script>
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
