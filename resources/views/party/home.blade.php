<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('components.header')
	<title>{{$party->title}} - {{$party->subtitle}}</title>
	<link rel="stylesheet" href="{{ asset('/css/party/home.css') }}"/>
	<script src="{{asset('js/layer.js')}}"></script>
</head>
<body style="min-height: 960px">
<div class="container my-5">
	<div class="row">
		<div class="px-2 col-12">
			<div class="card rounded kirisame-bg shadow-lg">
				<div class="card-body">
					<div class="row">
						<div class="col-3 col-lg-2 p-0">
							<img src="https://storage.thparty.fun/party/avatar/{{$party->id}}.png"
							     class="img-fluid rounded-circle" alt="{{$party->title}}"/>
						</div>
						<div class="col">
							<h1>{{$party->title}}</h1>
							<h2>{{$party->subtitle}}</h2>
							<p class="text-secondary mb-0"><small>{{$party->start}}至{{$party->end}}</small></p>
							<p class="text-secondary"><small>{{$party->location}}</small></p>
						</div>
						<div class="w-100"></div>
						@if(!auth()||!\App\Http\Controllers\ParticipantController::isParticipant($party->id,\Illuminate\Support\Facades\Auth::id()))
							<a class="btn btn-outline-success" href="{{env('APP_URL').'/Actions/Join/'.$party->id}}">报名</a>
						@else
							<a class="btn btn-outline-danger" href="{{env('APP_URL').'/Actions/Quit/'.$party->id}}">您已报名</a>
						@endif
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
							<button class="nav-link active w-100" id="review-tab" data-bs-toggle="pill"
							        data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review"
							        aria-selected="true">总览
							</button>
						</li>
						<li class="nav-item col" role="presentation">
							<button class="nav-link w-100" id="show-tab" data-bs-toggle="pill"
							        data-bs-target="#pills-show" type="button" role="tab" aria-controls="pills-show"
							        aria-selected="false">节目
							</button>
						</li>
						<li class="nav-item col" role="presentation">
							<button class="nav-link w-100" id="activity-tab" data-bs-toggle="pill"
							        data-bs-target="#pills-activity" type="button" role="tab"
							        aria-controls="pills-activity" aria-selected="false">互动
							</button>
						</li>
						@if($party->type==2)
							<li class="nav-item col" role="presentation">
								<button class="nav-link w-100" id="group-tab" data-bs-toggle="pill"
								        data-bs-target="#pills-group" type="button" role="tab"
								        aria-controls="pills-group" aria-selected="false">社团
								</button>
							</li>
						@endif
						@if($party->type>=1)
							<li class="nav-item col" role="presentation">
								<button class="nav-link w-100" id="post-tab" data-bs-toggle="pill"
								        data-bs-target="#pills-post" type="button" role="tab" aria-controls="pills-post"
								        aria-selected="false">动态
								</button>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container my-5">
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-review" role="tabpanel" aria-labelledby="review-tab"
			     tabindex="0">
				<div class="row my-3">
					<div class="col-6 col-lg-3 p-2">
						<div class="card shadow-lg kirisame-bg">
							<div class="card-body">
								<h5 class="card-title">参会</h5>
								<p class="display-5 text-center ps-2">{{$party->participants}}</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-lg-3 p-2">
						<div class="card  shadow-lg kirisame-bg">
							<div class="card-body">
								<h5 class="card-title">节目</h5>
								<p class="display-5 text-center ps-2">{{$shows->count()}}</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-lg-3 p-2">
						<div class="card shadow-lg kirisame-bg">
							<div class="card-body">
								<h5 class="card-title">互动</h5>
								<p class="display-5 text-center ps-2">5</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-lg-3 p-2">
						<div class="card shadow-lg kirisame-bg">
							<div class="card-body">
								<h5 class="card-title">动态</h5>
								<p class="display-5 text-center ps-2">{{$party->posts}}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row my-3 p-2">
					<div class="card col-12 shadow-lg kirisame-bg">
						<div class="card-body">
							<h5 class="card-title">简介</h5>
							<p class="card-text" style="white-space: pre-line">{{ $party->information }}</p>
						</div>
					</div>
				</div>
				<div class="row my-3 p-2">
					<div class="card col-12 shadow-lg kirisame-bg">
						<div class="card-body">
							<h5 class="card-title">Staff</h5>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<div class="row">
										<div class="col-3 col-lg-1 p-0">
											<img class="rounded-circle img-fluid" src="{{\App\Http\Controllers\UserController::getAvatar($leader->id)}}" />
										</div>
										<div class="col my-auto">
											<h5>{{$leader->username}}<span class="badge bg-danger">主催</span></h5>
											<p class="text-secondary mb-0">{{$leader->sign}}</p>
										</div>
									</div>
								</li>
								@foreach($staffs as $staff)
									<li class="list-group-item">
										<div class="row">
											<div class="col-3 col-lg-1 p-0">
												<img class="rounded-circle img-fluid" src="{{\App\Http\Controllers\UserController::getAvatar($staff->uid)}}" />
											</div>
											<div class="col my-auto">
												<h5>{{$staff->user->username}}</h5>
												<p class="text-secondary mb-0">{{$staff->user->sign}}</p>
											</div>
										</div>
									</li>
								@endforeach

							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-show" role="tabpanel" aria-labelledby="show-tab" tabindex="0">
				<div class="row my-3 p-2">
					<div class="card col-12 shadow-lg kirisame-bg">
						<div class="card-body">
							<h5 class="card-title">节目单</h5>
							<div class="accordion my-3" id="showList">
								@foreach($shows as $show)
									@if($show->public==1)
									<div class="accordion-item">
										<h2 class="accordion-header" id="showTitle-{{$show->id}}">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#showContent-{{$show->id}}" aria-expanded="false" aria-controls="showContent-{{$show->id}}">{{$show->title}}</button>
										</h2>
										<div id="showContent-{{$show->id}}" class="accordion-collapse collapse" aria-labelledby="showTitle-{{$show->id}}">
											<div class="accordion-body">
												<p class="text-secondary"><small>{{$show->start}}至{{$show->end}}</small></p>
												<p style="white-space: pre-line">{{$show->introduction}}</p>
												<div class="row my-2">
													@foreach($show->actor_info as $actor)
														<div class="rounded-pill d-flex col-auto bg-secondary px-0 m-2" style="height: 48px">
															<img class="rounded-circle" style="height: 48px;width: 48px;" src="{{\App\Http\Controllers\UserController::getAvatar($actor->id)}}" />
															<p class="my-auto text-white px-2">{{$actor->username}}</p>
														</div>
													@endforeach
												</div>
											</div>
										</div>
									</div>
									@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-activity" role="tabpanel" aria-labelledby="activity-tab" tabindex="0">
				3
			</div>
			@if($party->type==2)
				<div class="tab-pane fade" id="pills-group" role="tabpanel" aria-labelledby="group-tab" tabindex="0">4
				</div>
			@endif
			@if($party->type>=1)
				<div class="tab-pane fade" id="pills-post" role="tabpanel" aria-labelledby="post-tab" tabindex="0">
					<div class="row my-3 p-2">
						@foreach($posts as $post)
						<div class="col-12 my-2 shadow-lg card kirisame-bg">
							<div class="card-body">
								<div class="row">
										<img class="col-1 p-0 rounded-circle img-fluid" src="{{\App\Http\Controllers\UserController::getAvatar($post->uid)}}" style="width: 64px;height: 64px" />
									<div class="col my-auto">
										<h5>{{$post->user->username}}</h5>
										<p class="text-secondary">{{$post->user->sign}}</p>
									</div>
								</div>
								<hr class="mt-1 mb-4" />
								<p class="card-text" style="white-space: pre-line">{{$post->content}}</p>
								@if($post->img!=null)
									@php
										$images=json_decode($post->img);
									@endphp
									<div class="row">
										@foreach($images as $image)
											<img class="col-6 col-md-4 col-lg-3 imgView p-1 rounded" src="{{$image}}" style="object-fit: cover;aspect-ratio: 1/1" />
										@endforeach
									</div>
									@endif
							</div>

						</div>
						@endforeach
						<a class=" my-3 btn btn-lg btn-outline-primary" href="/Posts">更多</a>
					</div>
				</div>
			@endif
		</div>
</div>
@include('components.footer')
<script>
	$("body").on("click", ".imgView", function (e) {
		layer.photos({photos: {"data": [{"src": e.target.src}]}});
	});
</script>
</body>
</html>
