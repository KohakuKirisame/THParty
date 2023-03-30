<!DOCTYPE html>
<html lang="zh-CN">
<head>
	@include('components.header')
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.css">
	<script src="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.js"></script>
	<title>我作为Staff的聚会 - THParty.Fun</title>
	<script type="application/javascript" src="{{asset("js/user/asStaffParty.js")}}"></script>
</head>
<body>
@include('components.navbar')
<div class="row px-2 justify-content-center">
	<div class="col-lg-9 my-5">
		<div class="row">
			<div class="card col-12">
				<div class="card-body">
					<h5 class="card-title">我作为Staff的聚会</h5>
					<ul class="list-group list-group-flush" id="partyList">
						@foreach($parties as $party)
							<button class="btn" data-bs-toggle="collapse" data-bs-target="#partyContent-{{$party->id}}">
								<li class="list-group-item">
									<div class="row">
										<div class="col-3 col-lg-1 p-0">
											<img src="https://storage.thparty.fun/party/avatar/{{$party->id}}.png"
												 class="img-fluid" alt="{{$party->title}}">
										</div>
										<div class="col my-auto">
											<h5>{{$party->title}} - {{$party->subtitle}}</h5>
											<p class="text-secondary mb-0">{{$party->information}}</p>
										</div>
									</div>
								</li>
							</button>
							<div class="collapse" id="partyContent-{{$party->id}}" data-bs-parent="#partyList">
								<div class="row">
									<div class="col-3 col-lg-1 p-0">
										<img class="rounded-circle img-fluid" src="{{\App\Http\Controllers\UserController::getAvatar($party->$leader->id)}}" />
									</div>
									<div class="col my-auto">
										<h5>{{$party->$leader->username}}<span class="badge bg-danger">主催</span></h5>
									</div>
									<p><small>时间:{{$party->start}} - {{$party->end}}</small></p>
									<p>地点:{{$party->location}}</p>
									<p>详细信息:{{$party->information}}</p>
									<p>审核状态:@if($party->activated==-1)未通过 @elseif($party->activated==0)正在审核中 @else 已通过@endif</p>
									<span><a href="{{$party->domain}}">前往聚会页面>></a></span>
								</div>
							</div>
						@endforeach

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@include('components.navfooter')
@include('components.footer')
</body>
</html>
