<link href="{{asset('css/navCore.css')}}" rel="stylesheet">
<script src="{{asset('js/navCore.js')}}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<div class="container-fluid pe-0" id="mainContainer">
	<div class="row col-12">
		<div class="col-lg-2 p-0 offcanvas-lg offcanvas-start min-vh-100" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
			<div class="offcanvas-header">
				<a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none">
					<i class="bi-alarm"></i>
					<span class="fs-5 fw-semibold"> THParty.Fun</span>
				</a>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body p-2 h-100" style="background-color: white !important;">
				<div>
					<a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none d-none d-lg-block d-xl-block">
						<i class="bi-alarm"></i>
						<span class="fs-5 fw-semibold"> THParty.Fun</span>
					</a>
					<ul class="list-unstyled ps-0">
						<li class="border-top my-3"></li>
						<li class="mb-1 nav-category">
							聚会
						</li>
						<li class="mb-1 nav-item rounded"><a href="#" class="link-dark">
								我主办的聚会</a></li>
						<li class="mb-1 nav-item rounded"><a href="#" class="link-dark">
								我作为Staff的聚会</a></li>
						<li class="mb-1 nav-item rounded"><a href="#" class="link-dark">
								我参加的聚会</a></li>

						<li class="border-top my-3"></li>
						<li class="mb-1 nav-category">
							我的游戏
						</li>
						<li class="mb-1 nav-item rounded"><a href="#" class="link-dark">
								占位1</a></li>
						<li class="mb-1 nav-item rounded"><a href="#" class="link-dark">
								占位2</a></li>
						<li class="mb-1 nav-item rounded"><a href="#" class="link-dark">
								占位3</a></li>
						<li class="mb-1 nav-item rounded"><a href="#" class="link-dark">
								占位4</a></li>


						<li class="border-top my-3"></li>
						<li class="mb-1 nav-category">
							用户信息
						</li>
						<li class="mb-1 nav-item rounded"><a href="/Profile" class="link-dark">
								个人资料</a></li>
						<li class="mb-1 nav-item rounded"><a href="#" class="link-dark">
								安全设置</a></li>
						<li class="mb-1 nav-item rounded"><a href="/Actions/Logout" class="link-dark">退出登录</a></li>

					</ul>


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
			<!-- content here-->
