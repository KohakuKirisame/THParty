<!DOCTYPE html>
<html lang="zh-CN">
<head>
	@include('components.header')
	<title>注册 - THParty.Fun</title>

</head>
<body>
<div class="container my-5" id="mainContainer">
	<div class="row justify-content-center">
		<div class="card shadow-lg col-12 col-md-9 col-lg-6 opacity-75">
			<div class="card-body">
				<h4 class="card-title my-4 text-center">注册</h4>
				<form method="post" id="regForm" action="/Actions/Register">
					@csrf
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">+86</span>
						<input type="text" class="form-control" name="phone" id="phone" placeholder="手机号码">
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="captcha" id="captcha" placeholder="手机验证码">
						<button class="btn btn-outline-success" type="button" id="button-addon2">发送验证码</button>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="username" id="username" placeholder="昵称">
					</div>
					<div class="mb-3">
						<input type="password" class="form-control" name="password" id="password" placeholder="密码">
					</div>
					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" id="remember" name="remember">
						<label class="form-check-label" for="remember">记住我</label>
					</div>
				</form>
				<div class="row justify-content-around px-2 mt-4">
					<button onclick="$('#regForm').submit();" class="btn btn-outline-primary col-6">注册</button>
				</div>
				<div class="row justify-content-around px-2 mt-4 text-center">
					<a href="/Login" class="text-muted">已有账号？点此登录</a>
				</div>
				<div class="px-2 my-4">
					@foreach($errors->all() as $error) <p class="text-center text-danger" id="warning">{{$error}}</p>@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@include('components.footer')
<script type="application/javascript" src="{{asset("js/register.js")}}"></script>
</body>
</html>
