<!DOCTYPE html>
<html lang="zh-CN">
<head>
	@include('components.header')
	<title>登录 - THParty.Fun</title>
</head>
<body>
<div class="container my-5" id="mainContainer">
	<div class="row justify-content-center">
		<div class="card shadow-lg col-12 col-md-9 col-lg-6 opacity-75">
			<div class="card-body">
				<h4 class="card-title my-4 text-center">登录</h4>
				<form method="post" id="loginForm" action="/Actions/Login">
					@csrf
					<div class="mb-3">
						<input type="text" class="form-control" name="phone" id="phone" placeholder="手机号" />
					</div>
					<div class="mb-3">
						<input type="password" class="form-control" name="password" id="password" placeholder="密码" />
					</div>

					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" id="remember" name="remember">
						<label class="form-check-label" for="remember">记住我</label>
					</div>
				</form>
				<div class="row justify-content-around px-2 mt-4">
					<button onclick="$('#loginForm').submit();" class="btn btn-outline-primary col-6">登录</button>
				</div>

				<div class="px-2 my-4">
					@foreach($errors->all() as $error) <p class="text-center text-danger" id="warning">{{$error}}</p>@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@include('components.footer')
</body>
</html>
