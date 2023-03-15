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
<div class="container-fluid col-10">
	<div class="row justify-content-center">
		<form action="/Actions/ChangeAvator" enctype="multipart/form-data" method="POST" id="form">
			<div class="mb-3">
				<label for="icon" class="col- col-form-label">头像</label>
				<input class="form-control mb-1" type="file" id="icon" name="avatar">
				<div class="col-6">
					<img src="https://www.martingrocery.top/passageForHulenkius/0/0.png" id="cropper" class="mb-1" width="100%">
				</div>
			</div>
			<button class="btn btn-outline-danger" id="abort">取消</button>
			<input class="btn btn-outline-success" type="button" id="submit" value="提交">

		</form>
		<button class="btn btn-outline-primary col-3" id="edit">修改</button>
	</div>
</div>

</body>
<script src="{{asset("js/changeAvatar.js")}}"></script>
</html>