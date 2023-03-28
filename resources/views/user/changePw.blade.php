<!DOCTYPE html>
<html lang="zh-CN">
<head>
	@include('components.header')
	<title>修改密码 - THParty.Fun</title>
	<script type="application/javascript" src="{{asset("js/user/changePw.js")}}"></script>
</head>
<body>
@include('components.navbar')
<div class="row px-2 justify-content-center">
	<div class="row justify-content-center">
		<div class="card shadow-lg col-12 col-md-9 col-lg-6 opacity-75">
			<div class="card-body">
				<h4 class="card-title my-4 text-center">修改密码</h4>
				<form method="post" id="changePwForm">
					@csrf
					<div class="mb-3">
						<label for="old_password" class="form-label">旧密码</label>
						<input type="password" class="form-control" name="old_password" id="old_password" placeholder="旧密码" />
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">新密码</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="新密码" />
					</div>
					<div class="mb-3">
						<label for="password_confirm" class="form-label">确认新密码</label>
						<input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="确认密码" />
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">您的手机号为:{{$user->phone}}</span>
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="captcha" id="captcha" placeholder="手机验证码">
						<button class="btn btn-outline-success" type="button" id="sendCaptcha" disabled="disabled">发送验证码</button>
					</div>
				</form>
				<div class="row justify-content-around px-2 mt-4">
					<button class="btn btn-outline-primary" id="submit">修改密码</button>
				</div>
				<div class="px-2 my-4">
					@foreach($errors->all() as $error) <p class="text-center text-danger" id="warning">{{$error}}</p>@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@include('components.navfooter')
@include('components.footer')
</body>
</html>
