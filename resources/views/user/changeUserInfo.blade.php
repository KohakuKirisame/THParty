<!DOCTYPE html>
<html lang="en">
<head>
	@include('components.header')
	<title>change_profile</title>
	<script type="application/javascript" src="{{asset("js/navCore.js")}}"></script>
	<script src="{{asset("js/user/change.js")}}"></script>
	<link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
	<script src="https://unpkg.com/jcrop"></script>
</head>
<body>
@include('components.navbar')
<div class="container-fluid col-12">
	<form method="POST" action="{{env('APP_URL').'Actions/ChangeUserInfo'}}" id="infoForm">
		<div class="mb-3 row">
			<label for="username" class="col-sm-3 col-lg-2 col-form-label">昵称</label>
			<div class="col-sm-9 col-lg-10">
				<input type="text" readonly class="form-control-plaintext" id="username" name="username" value="{{$user->username}}">
			</div>
		</div>
		<div class="mb-3 row">
			<label for="qq" class="col-sm-3 col-lg-2 col-form-label">邮箱</label>
			<div class="col-sm-9 col-lg-10">
				<input type="email" readonly class="form-control-plaintext" id="email" name="username" value="1{{$user->email}}">
			</div>
		</div>
		<div class="mb-3 row">
			<label for="qq" class="col-sm-3 col-lg-2 col-form-label">QQ</label>
			<div class="col-sm-9 col-lg-10">
				<input type="text" readonly class="form-control-plaintext" id="qq" name="qq" value="{{$user->qq}}">
			</div>
		</div>
		<div class="mb-3 row">
			<label for="sign" class="col-sm-3 col-lg-2 col-form-label">签名</label>
			<div class="col-sm-9 col-lg-10">
				<input type="text" readonly class="form-control-plaintext" id="sign" name="sign" value="{{$user->sign}}">
			</div>
		</div>
		<div class="mb-3 row">
			<label for="intro" class="col-sm-3 col-lg-2 col-form-label">自我介绍</label>
			<div class="col-sm-9 col-lg-10">
				<textarea form="infoForm" type="text" readonly class="form-control-plaintext" id="introduction" name="introduction">{!! $user->introduction !!}</textarea>
			</div>
		</div>
		<button class="btn btn-outline-danger" id="abort">取消</button>
		<input class="btn btn-outline-success" type="submit" id="submit">
	</form>
	<button class="btn btn-outline-primary" id="edit">修改</button>
</div>
@include('components.navfooter')
@include('components.footer')
</body>
</html>
