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
<div class="container-fluid col-10">
	<div class="row justify-content-center">
		<form action="/Actions/changeAvator/" enctype="multipart/form-data" method="POST" id="form">
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
