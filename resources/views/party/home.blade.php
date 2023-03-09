<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('components.header')
	<title>{{$party->title}} - {{$party->subtitle}}</title>
	<link rel="stylesheet" href="{{ asset('/css/party/home.css') }}" />
</head>
<body>
<div class="container my-5">
	<div class="row">
		<div class="px-2 col-12">
			<div class="card rounded kirisame-bg shadow-lg">
				<div class="card-body">
					<div class="row">
						<div class="col-3 col-lg-2">
							<img src="https://storage.thparty.fun/party/avatar/{{$party->id}}.png" class="img-fluid rounded-circle" alt="{{$party->title}}" />
						</div>
						<div class="col">
							<h1>{{$party->title}}</h1>
							<h2>{{$party->subtitle}}</h2>
							<p class="text-secondary mb-0"><small>{{$party->start}}至{{$party->end}}</small></p>
							<p class="text-secondary"><small>{{$party->location}}</small></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container my-5">
	<div class="row">
		<div class="px-2 col-12">
			<div class="card rounded kirisame-bg shadow-lg">
				<div class="card-body">
					<ul class="nav nav-pills row justify-content-center" id="pills-tab" role="tablist">
						<li class="nav-item col" role="presentation">
							<button class="nav-link active w-100" id="review-tab" data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review" aria-selected="true">总览</button>
						</li>
						<li class="nav-item col" role="presentation">
							<button class="nav-link w-100" id="show-tab" data-bs-toggle="pill" data-bs-target="#pills-show" type="button" role="tab" aria-controls="pills-show" aria-selected="false">节目</button>
						</li>
						<li class="nav-item col" role="presentation">
							<button class="nav-link w-100" id="activity-tab" data-bs-toggle="pill" data-bs-target="#pills-activity" type="button" role="tab" aria-controls="pills-activity" aria-selected="false">互动</button>
						</li>
						@if($party->type==2)
							<li class="nav-item col" role="presentation">
								<button class="nav-link w-100" id="group-tab" data-bs-toggle="pill" data-bs-target="#pills-group" type="button" role="tab" aria-controls="pills-group" aria-selected="false">社团</button>
							</li>
						@endif
						@if($party->type>=1)
							<li class="nav-item col" role="presentation">
								<button class="nav-link w-100" id="post-tab" data-bs-toggle="pill" data-bs-target="#pills-post" type="button" role="tab" aria-controls="pills-post" aria-selected="false">动态</button>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container my-5">
	<div class="row">
		<div class="px-2 col-12">
			<div class="card rounded kirisame-bg shadow-lg">
				<div class="card-body tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-review" role="tabpanel" aria-labelledby="review-tab" tabindex="0">
						<div class="row my-3">
							<div class="col-6 col-lg-3 p-2">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">参会</h5>
										<p class="display-5 text-center ps-2">114514</p>
									</div>
								</div>
							</div>
							<div class="col-6 col-lg-3 p-2">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">节目</h5>
										<p class="display-5 text-center ps-2">10</p>
									</div>
								</div>
							</div>
							<div class="col-6 col-lg-3 p-2">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">互动</h5>
										<p class="display-5 text-center ps-2">5</p>
									</div>
								</div>
							</div>
							<div class="col-6 col-lg-3 p-2">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">动态</h5>
										<p class="display-5 text-center ps-2">1919</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row my-3">

						</div>
					</div>
					<div class="tab-pane fade" id="pills-show" role="tabpanel" aria-labelledby="show-tab" tabindex="0">2</div>
					<div class="tab-pane fade" id="pills-activity" role="tabpanel" aria-labelledby="activity-tab" tabindex="0">3</div>
					@if($party->type==2)
						<div class="tab-pane fade" id="pills-group" role="tabpanel" aria-labelledby="group-tab" tabindex="0">4</div>
					@endif
					@if($party->type>=1)
						<div class="tab-pane fade" id="pills-post" role="tabpanel" aria-labelledby="post-tab" tabindex="0">5</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
