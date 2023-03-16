<!DOCTYPE html>
<html lang="en">
<head>
	@include('components.header')
	<title>change_profile</title>
	<script src="{{asset("js/user/change.js")}}"></script>
	<link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
	<script src="https://unpkg.com/jcrop"></script>
	<script src="{{asset("js/changeAvatar.js")}}"></script>
</head>
<body>
@include('components.navbar')
<div class="row col-12">
	<div class="card col-lg-9">
		<div class="card-body">
			<a data-bs-toggle="modal" data-bs-target="#changeAvatar">
				<img src="{{\app\Http\Controllers\UserController::getAvatar()}}" class="m-2 rounded-circle" height="96px" />
			</a>
			<h4 class="d-inline">{{$user->username}}</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="{{env('APP_URL').'Actions/ChangeUserInfo'}}" id="infoForm">
				@csrf
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

				<input class="btn btn-outline-success" type="submit" id="submit_profile">
			</form>
			<button class="btn btn-outline-danger" id="abort">取消</button>
			<button class="btn btn-outline-primary" id="edit">修改</button>
		</div>
	</div>

	<div class="modal fade" id="changeAvatar" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">更换头像</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div>
						<form action="/Actions/" method="post" enctype="multipart/form-data" id="avatarForm">
							@csrf
							<label for="ava" class="form-label">上传新头像</label>
							<input class="form-control form-control-lg" id="icon" type="file" name="ava" accept="image/png,image/jpeg,image/gif">
						</form>
					</div>
					<div class="">
						<img src="" id="cropper" class="mb-1" width="100%">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
					<button type="button" class="btn btn-primary" id="submit_avatar">保存</button>
				</div>
			</div>
		</div>
	</div>
</div>
@include('components.navfooter')
@include('components.footer')
</body>
</html>
