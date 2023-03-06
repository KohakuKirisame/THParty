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
				@if(!\Illuminate\Support\Facades\Auth::check())<a class="btn btn-lg btn-outline-light mx-2" href="/Login" >登录</a>@endif
			</div>

		</div>
	</div>
	<div class="container pt-5 mb-3">
		<div class="row">
			<div class="col-12 col-lg-8 row mx-auto">
				<h1 class="m-auto mb-2 col-12 text-center">醉眠幻想聚宴间</h1>
				<div class="m-auto text-center col-12">
					<a class="btn btn-lg btn-outline-success mx-2" href="/About">关于本站</a>
					@if(!\Illuminate\Support\Facades\Auth::check())<a class="btn btn-lg btn-outline-primary mx-2" href="/Login" >登录</a> @endif
				</div>
			</div>
			<div class="col-12 col-lg-4 text-center">
				<img src="{{asset("storage/img/stickers/Party_Isometric.svg")}}" />
			</div>
		</div>
	</div>
	<div class="container-fluid bg-white shadow-lg mb-4" id="feature">
		<div class="container my-4 py-4">
			<div class="row">
				<div class="row col-12 col-md-6 col-lg-3 mx-auto rounded hs">
					<img class="function-sticker my-3" src="{{asset('storage/img/thsvg/115.svg')}}" />
					<div class="w-100"></div>
					<h5 class="mx-auto text-center">主办活动</h5>
					<p class="px-2 my-3 text-secondary">通过THParty.Fun便捷创建一场东方聚会，邀请参会者与社团参加活动</p>
				</div>
				<div class="row col-12 col-md-6 col-lg-3 mx-auto rounded hs">
					<img class="function-sticker my-3" src="{{asset('storage/img/thsvg/090.svg')}}" />
					<div class="w-100"></div>
					<h5 class="mx-auto text-center mx-auto">记录足迹</h5>
					<p class="px-2 my-3 text-secondary">THParty.Fun会保留你的参会记录，留下每一次聚会的记忆</p>
				</div>
				<div class="row col-12 col-md-6 col-lg-3 mx-auto rounded hs">
					<img class="function-sticker my-3" src="{{asset('storage/img/thsvg/087.svg')}}" />
					<div class="w-100"></div>
					<h5 class="mx-auto text-center">享受聚会</h5>
					<p class="px-2 my-3 text-secondary">THParty.Fun内置多种现场互动活动辅助工具，让你的聚会充满活力</p>
				</div>
				<div class="row col-12 col-md-6 col-lg-3 mx-auto rounded hs">
					<img class="function-sticker my-3" src="{{asset('storage/img/thsvg/007.svg')}}" />
					<div class="w-100"></div>
					<h5 class="mx-auto text-center">动态跟踪</h5>
					<p class="px-2 my-3 text-secondary">实时获取活动最新动态并发表你的评论，与主办方进行互动</p>
				</div>
			</div>
		</div>
		<hr class="hr-fade-content" data-content="THParty.Fun">
		<div class="container my-4 py-4">
			<div class="row my-3 rounded hs">
				<div class="col-1" style="background: linear-gradient(to left,#ef4444,rgba(0,0,0,0)); height: auto">
				</div>
				<div class="col-11">
					<h5 class="display-5 mb-3">We Got This!</h5>
					<p>将麻烦的事情交给我们解决！THParty.Fun为各种规模的聚会提供了完整的一站式解决方案：小到20人的群友团建，大到数千人的东方展会，THParty.Fun都可以轻松Handle。</p>
					<p>我们提供了三种聚会类型选项：个人聚会、高校例会和商业展会，允许主办方对聚会进行自定义设置并获取免费的自定义域名。主办方可以在聚会中添加节目单、互动游戏、管理参会人员，充分展示聚会的个性和风格。THParty.Fun开发团队全程提供技术支持，为每一场聚会保驾护航。</p>
				</div>
			</div>
			<div class="row my-3 rounded hs">
				<div class="col-11">
					<h5 class="text-end display-5 mb-3">Keep Memory</h5>
					<p>我们明白，聚会的意义不仅仅在于当下的欢聚和热闹，更在于留下永恒的回忆。因此，为了让您的聚会体验更具意义和纪念价值，THParty.Fun会保留您的参会记录，记录下每一次聚会的细节和回忆。</p>
					<p>THParty.Fun会留存会议信息（除非主办方主动删除）。主办方能够在THParty.Fun上自定义数字藏品，为参加聚会的人员发送。同时，THParty.Fun支持上传活动图库与回放，让您在以后的时光里回顾和分享这段美好的经历。</p>
				</div>
				<div class="col-1" style="background: linear-gradient(to right,#7c4eaa,rgba(0,0,0,0)); height: auto">
				</div>
			</div>
			<div class="row my-3 rounded hs">
				<div class="col-1" style="background: linear-gradient(to left,#368972,rgba(0,0,0,0)); height: auto">
				</div>
				<div class="col-11">
					<h5 class="display-5 mb-3">Get Touched</h5>
					<p>互动环节不可或缺，而THParty.Fun让东方众之间的密切联系达到前所未有的高度。</p>
					<p>THParty.Fun内置了你划我猜、知识竞答等互动游戏与相应的题库，同时还支持主办方自定义题库。打则与STG Bingo样样不在话下，内置的工具可以让主办方轻松组织STG和非想天则比赛。动态发布功能让参会者能够实时了解聚会信息，并向主办方的动态添加评论。</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container mb-5 pb-5">
		<div class="row">
			<div class="col-12 col-lg-4 my-3">
				<div class="card bg-white rounded shadow-lg">
					<div class="card-body">
						<h5 class="card-title text-center">个人聚会</h5>
						<h6 class="card-subtitle mb-2 text-muted text-center">适用于私人聚会或小型团建</h6>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center">不可以收取入场费</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">人数限制</div>
								<div class="col-4 text-end text-secondary">20人</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">节目单</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">互动工具</div>
								<div class="col-4 text-end text-secondary">全部</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">自定义题库</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">动态</div>
								<div class="col-4 text-end text-secondary">不支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">添加Staff</div>
								<div class="col-4 text-end text-secondary">不支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">图库</div>
								<div class="col-4 text-end text-secondary">不支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">数字藏品</div>
								<div class="col-4 text-end text-secondary">不支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">参展社团列表</div>
								<div class="col-4 text-end text-secondary">不支持</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-12 col-lg-4 my-3">
				<div class="card bg-white rounded shadow-lg">
					<div class="card-body">
						<h5 class="card-title text-center">高校例会</h5>
						<h6 class="card-subtitle mb-2 text-muted text-center">适用于中学和高校的社团活动</h6>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center">不可以收取入场费</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">人数限制</div>
								<div class="col-4 text-end text-secondary">150人</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">节目单</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">互动工具</div>
								<div class="col-4 text-end text-secondary">全部</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">自定义题库</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">动态</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">添加Staff</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">图库</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">数字藏品</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">参展社团列表</div>
								<div class="col-4 text-end text-secondary">不支持</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-12 col-lg-4 my-3">
				<div class="card bg-white rounded shadow-lg">
					<div class="card-body">
						<h5 class="card-title text-center">商业展会</h5>
						<h6 class="card-subtitle mb-2 text-muted text-center">适用于收取入场费的活动</h6>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center">可收取费用，提供票据核验功能</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">人数限制</div>
								<div class="col-4 text-end text-secondary">不限</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">节目单</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">互动工具</div>
								<div class="col-4 text-end text-secondary">全部</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">自定义题库</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">动态</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">添加Staff</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">图库</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">数字藏品</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row px-4">
								<div class="col-8">参展社团列表</div>
								<div class="col-4 text-end text-secondary">支持</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	@include('components.footer')
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
