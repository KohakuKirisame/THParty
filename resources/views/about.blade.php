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
					@foreach($developers as $developer)
						<div class="col-6 col-md-3 col-xl-2 px-2 mb-2">
							<div class="card rounded p-0 ani" id="dev{{$developer['id']}}" onmouseenter="addShadow('#dev{{$developer["id"]}}')" onmouseleave="noShadow('#dev{{$developer["id"]}}')">
								<img src="{{$developer['avatar']}}" class="card-img-top rounded-circle p-3" />
								<div class="card-body">
									<h5 class="card-title text-center">{{$developer['name']}}</h5>
									<h6 class="card-subtitle text-center text-muted">{{$developer['job']}}</h6>
								</div>
								<ul class="list-group list-group-flush">
									<a class="list-group-item list-group-item-action" href="https://github.com/{{$developer['github']}}">GitHub</a>
									<a class="list-group-item list-group-item-action">QQ {{$developer['qq']}}</a>
								</ul>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="row my-4 justify-content-center">
		<iframe class="col-12 col-lg-6 shadow-lg p-0" id="afdian_leaflet_NebulaShrine" src="https://afdian.net/leaflet?slug=NebulaShrine" scrolling="no" height="200" frameborder="0"></iframe>
		<div class=" col-12 col-lg-6 px-0 ps-lg-4">
			<div class="card rounded shadow-lg">
				<div class="card-body">
					<figure class="my-4 px-3">
						<blockquote class="blockquote">
							<p><small>Here’s to the crazy ones, the misfits, the rebels, the troublemakers, the round pegs in the square holes … the ones who see things differently — they’re not fond of rules, and they have no respect for the status quo. … You can quote them, disagree with them, glorify or vilify them, but the only thing you can’t do is ignore them because they change things. … They push the human race forward, and while some may see them as the crazy ones, we see genius, because the people who are crazy enough to think that they can change the world, are the ones who do.</small></p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Steve Jobs
						</figcaption>
					</figure>
				</div>
			</div>
		</div>

	</div>

</div>
@include('components.footer')
</body>
</html>
