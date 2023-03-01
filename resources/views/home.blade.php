<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('components.header')
	<title>THParty.Fun - 东方同人聚会一站式解决方案</title>
	<link rel="stylesheet" href="{{asset('css/home.css')}}" />
	<script type="application/javascript" src="{{asset("js/home.js")}}"></script>
</head>
<body>
	<div class="first-cover d-flex" id="first">
		<div class="bgFilter"></div>
		<div class="m-auto" style="z-index: 10">
			<h1 class="text-center text-white top-title title-glow mb-1">THParty.Fun</h1>
			<h5 class="text-white mb-3 text-center">往日东风，今朝同醉</h5>
			<div class="mx-auto text-center">
				<button class="btn btn-lg btn-outline-light mx-2" id="goHome">进入主页</button>
				<a class="btn btn-lg btn-outline-light mx-2" href="/Login" >登录</a>
			</div>

		</div>
	</div>
	<div>
		zhuye
	</div>
<script type="application/javascript">
	$(document).ready(function() {
		 glow=setInterval(function() {
			if ($('.top-title').hasClass('title-glow')) {
				$('.top-title').removeClass('title-glow');
			} else {
				$('.top-title').addClass('title-glow');
			}
		}, 1000);
	});
	$('#goHome').click(function() {
		goHome();
	});
</script>
</body>
</html>
