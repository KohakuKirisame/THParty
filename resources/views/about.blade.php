<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('components.header')
	<title>关于本站</title>
	<link rel="stylesheet" href="/css/about.css" />
	<script type="application/javascript" src="{{asset("js/about.js")}}"></script>
</head>
<body>
<div class="container-fluid bgImg d-flex shadow-lg">
	<div class="bgFilter"></div>
	<h1 class="text-center py-5 m-auto text-white ti">关于本站</h1>
</div>
<div class="container mb-5 pb-5">
	<div class="row my-4">
		<div class="card rounded col-12 my-3 shadow-lg">
			<div class="card-body">
				<h5 class="card-title">THParty.Fun</h5>
				<div class="d-flex justify-content-center my-2">
					<img style="max-height: 192px" src="{{asset("storage/img/NebulaShrine.png")}}" />
				</div>
				<p class="card-text">
					THParty.Fun是一个开源的东方Project同人聚会信息聚合站和聚会线下互动活动工具站。<br />
					本项目最初是为了服务北京航空航天大学东方Project例会「空之航路」而建立，而后拓展了更加宏大的目标。</p>
				<p class="card-text">
					THParty.Fun is an open source project that gather TouHou Project fan parties and provide offline interactive game tools.
					This project started from TouHou fan party of BUAA. Then we set a greater goal for this project.
				</p>
				<p class="small text-secondary">本页背景：<a class="link-primary" href="https://pixiv.net/artworks/104050170">https://pixiv.net/artworks/104050170</a> </p>
			</div>
		</div>
		<div class="card rounded col-12 my-3 shadow-lg pb-4">
			<div class="card-body">
				<h5 class="card-title">开发者</h5>
				<div class="card-text mb-3">
					<a href="https://github.com/KohakuCao/THParty"><img class="rounded" src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white" /></a>
				</div>
				<div class="row">
					<div class="col-6 col-md-3 col-xl-2 px-2">
						<div class="card rounded p-0 ani" id="dev1" onmouseenter="addShadow('#dev1')" onmouseleave="noShadow('#dev1')">
							<img src="https://avatars.githubusercontent.com/u/26038081" class="card-img-top rounded-circle p-3" />
							<div class="card-body">
								<h5 class="card-title text-center">Kohaku</h5>
								<h6 class="card-subtitle text-center text-muted">架构师</h6>
							</div>
							<ul class="list-group list-group-flush">
								<a class="list-group-item list-group-item-action" href="https://github.com/KohakuCao">GitHub</a>
								<a class="list-group-item list-group-item-action">QQ 2991251742</a>
							</ul>
						</div>
					</div>
					<div class="col-6 col-md-3 col-xl-2 px-2">
						<div class="card rounded p-0 ani" id="dev2" onmouseenter="addShadow('#dev2')" onmouseleave="noShadow('#dev2')">
							<img src="https://avatars.githubusercontent.com/u/100140070" class="card-img-top rounded-circle p-3" />
							<div class="card-body">
								<h5 class="card-title text-center">唐汉瑜</h5>
								<h6 class="card-subtitle text-center text-muted">后端开发</h6>
							</div>
							<ul class="list-group list-group-flush">
								<a class="list-group-item list-group-item-action" href="https://github.com/HCPTangHY">GitHub</a>
								<a class="list-group-item list-group-item-action">QQ 1847680031</a>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row my-4 justify-content-center">
		<iframe class="col-12 col-lg-6 shadow-lg p-0" id="afdian_leaflet_NebulaShrine" src="https://afdian.net/leaflet?slug=NebulaShrine" scrolling="no" height="200" frameborder="0"></iframe>
	</div>

</div>
@include('components.footer')
</body>
</html>
