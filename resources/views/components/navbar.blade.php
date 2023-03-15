<link href="{{asset('css/navCore.css')}}" rel="stylesheet">
<link href="{{asset('css/sidebars.css')}}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="{{asset('js/offcanvas-navbar.js')}}"></script>
<script src="{{asset('js/sidebars.js')}}"></script>
	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}

		.b-example-divider {
			height: 3rem;
			background-color: rgba(0, 0, 0, .1);
			border: solid rgba(0, 0, 0, .15);
			border-width: 1px 0;
			box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
		}

		.b-example-vr {
			flex-shrink: 0;
			width: 1.5rem;
			height: 100vh;
		}

		.bi {
			vertical-align: -.125em;
			fill: currentColor;
		}

		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
		}

		.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
		}
	</style>

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
			<!-- content here-->
