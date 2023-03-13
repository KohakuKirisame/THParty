<!DOCTYPE html>
<html lang="zh-CN">
<head>
	@include('components.header')
	<title>登录 - THParty.Fun</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<script>/* global bootstrap: false */
		(() => {
			'use strict'
			const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
			tooltipTriggerList.forEach(tooltipTriggerEl => {
				new bootstrap.Tooltip(tooltipTriggerEl)
			})
		})()
	</script>
	<style>
		body {
			min-height: 100vh;
			min-height: -webkit-fill-available;
		}

		html {
			height: -webkit-fill-available;
		}

		main {
			height: 100vh;
			height: -webkit-fill-available;
			max-height: 100vh;
			overflow-x: auto;
			overflow-y: hidden;
		}

		.dropdown-toggle { outline: 0; }

		.btn-toggle {
			padding: .25rem .5rem;
			font-weight: 600;
			color: rgba(0, 0, 0, .65);
			background-color: transparent;
		}
		.btn-toggle:hover,
		.btn-toggle:focus {
			color: rgba(0, 0, 0, .85);
			background-color: #d2f4ea;
		}

		.btn-toggle::before {
			width: 1.25em;
			line-height: 0;
			content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
			transition: transform .35s ease;
			transform-origin: .5em 50%;
		}

		.btn-toggle[aria-expanded="true"] {
			color: rgba(0, 0, 0, .85);
		}
		.btn-toggle[aria-expanded="true"]::before {
			transform: rotate(90deg);
		}

		.btn-toggle-nav a {
			padding: .1875rem .5rem;
			margin-top: .125rem;
			margin-left: 1.25rem;
		}
		.btn-toggle-nav a:hover,
		.btn-toggle-nav a:focus {
			background-color: #d2f4ea;
		}

		.scrollarea {
			overflow-y: auto;
		}
		.list-unstyled a{
			text-decoration:none;
		}

	</style>
</head>
<body>
<div class="container-fluid pe-0" id="mainContainer">
	<div class="row col-12">
		<div class="col-lg-2 pe-0 offcanvas-lg offcanvas-start min-vh-100" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
			<div class="offcanvas-header">
				<a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none">
					<i class="bi-alarm"></i>
					<span class="fs-5 fw-semibold"> THParty.Fun</span>

				</a>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body p-2">
				<div>

						<a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none d-none d-lg-block d-xl-block">
						<i class="bi-alarm"></i>
						<span class="fs-5 fw-semibold"> THParty.Fun</span>
						</a>


					<ul class="list-unstyled ps-0">
						<li class="border-top my-3"></li>
						<li class="mb-1">
							<button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
								聚会
							</button>
							<div class="collapse show" id="home-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									<li class="mb-1"><a href="#" class="link-dark rounded">我主办的聚会</a></li>
									<li class="mb-1"><a href="#" class="link-dark rounded">我作为Staff的聚会</a></li>
									<li class="mb-1"><a href="#" class="link-dark rounded">我参加的聚会</a></li>
								</ul>
							</div>
						</li>
						<li class="mb-1">
							<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
								我的游戏
							</button>
							<div class="collapse" id="dashboard-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									<li class="mb-1"><a href="#" class="link-dark rounded">占位1</a></li>
									<li class="mb-1"><a href="#" class="link-dark rounded">占位2</a></li>
									<li class="mb-1"><a href="#" class="link-dark rounded">占位3</a></li>
									<li class="mb-1"><a href="#" class="link-dark rounded">占位4</a></li>
								</ul>
							</div>
						</li>

						<li class="border-top my-3"></li>
						<li class="mb-1">
							<button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="true">
								Account
							</button>
							<div class="collapse show" id="account-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									<li class="mb-1"><a href="#" class="link-dark rounded">个人资料</a></li>
									<li class="mb-1"><a href="#" class="link-dark rounded">安全设置</a></li>
									<li class="mb-1"><a href="#" class="link-dark rounded">退出登录</a></li>
								</ul>
							</div>
						</li>
					</ul>
					<div class="dropdown">
						<a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
							<strong>mdo</strong>
						</a>
						<ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
							<li><a class="dropdown-item" href="#">New project...</a></li>
							<li><a class="dropdown-item" href="#">Settings</a></li>
							<li><a class="dropdown-item" href="#">Profile</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Sign out</a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
		<div class="col-lg-10 p-0">
			<div class="row">
			<nav class="navbar bg-light d-sm-block d-md-block d-xl-none d-lg-none">
				<div class="container-fluid">
					<button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
						<span class="navbar-toggler-icon"></span>
					</button>

					<span class="d-lg-none"></span>
				</div>
			</nav>
			</div>

	<div class="row justify-content-center my-lg-5 my-xl-5">
		<div class="card shadow-lg col-12 col-md-9 col-lg-6 opacity-75">
			<div class="card-body">
				<h4 class="card-title my-4 text-center">登录</h4>
				<form method="post" id="loginForm" action="/Actions/Login">
					@csrf
					<div class="mb-3">
						<label for="username" class="form-label">用户名</label>
						<input type="text" class="form-control" name="phone" id="phone" placeholder="手机号" />
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">密码</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="密码" />
					</div>
					<div class="mb-3 form-check d-flex justify-content-between align-items-center">
						<div>
							<input type="checkbox" class="form-check-input" id="remember" name="remember">
							<label class="form-check-label" for="remember">记住我</label>
						</div>
						<div>
							<a href="/Actions/Logout">忘记密码</a>
						</div>
					</div>

				</form>
				<div class="row justify-content-around px-2 mt-4">
					<a href="/Register" class="btn btn-outline-primary col-3">注册</a>
					<button onclick="$('#loginForm').submit();" class="btn btn-outline-primary col-6">登录</button>
				</div>

				<div class="px-2 my-4">
					@foreach($errors->all() as $error) <p class="text-center text-danger" id="warning">{{$error}}</p>@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
</div>

@include('components.footer')
</body>
</html>
