<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('components.header')
	<title>动态 - {{$party->title}}</title>
	<link rel="stylesheet" href="{{ asset('/css/party/home.css') }}"/>
	<script src="{{asset('js/layer.js')}}"></script>
</head>
<body>
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
					<a class="position-absolute btn btn-lg btn-outline-primary" href="/" style="left: 2%">&laquo; 返回</a>
					<h1 class="text-center m-0">动态</h1>
				</div>
			</div>
		</div>
	</div>
</div>
@auth
	@if(\App\Http\Controllers\UserController::checkPrivilege(\Illuminate\Support\Facades\Auth::id(),3,$party->id))
		<div class="container my-5">
			<div class="row">
				<div class="px-2 col-12">
					<div class="card rounded kirisame-bg shadow-lg">
						<div class="card-body">
							<form method="post" action="/Actions/NewPost">
								@csrf
								<input type="hidden" name="pid" value="{{$party->id}}" />
								<div class="mb-3">
									<label for="content" class="form-label">发布动态</label>
									<textarea class="form-control" name="content" id="content" rows="3"></textarea>
								</div>
								<div class="mb-3">
									<button type="submit" class="btn btn-primary">发布</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
@endauth
<div class="container my-5">
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
