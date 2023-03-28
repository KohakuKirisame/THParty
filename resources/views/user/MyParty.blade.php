<!DOCTYPE html>
<html lang="zh-CN">
<head>
	@include('components.header')
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.css">
	<script src="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.js"></script>
	<title>我主办的聚会 - THParty.Fun</title>
	<script type="application/javascript" src="{{asset("js/user/MyParty.js")}}"></script>
</head>
<body>
@include('components.navbar')
<div class="row px-2 justify-content-center">
	<div class="col-lg-9 my-5">
		<div id="party-list">
			<table id="partyTable">

			</table>
			{{--@foreach($parties as $party)
				@if()

				@endif
			@endforeach  用于显示多个活动--}}
			<!--<div class="card party-item">
				<div class="card-header">
					<h2 class="mb-0">
						<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#party1-detail" aria-expanded="true" aria-controls="activity1-details">
							<img src="https://storage.thparty.fun/party/avatar/{{}}.png" class="party-icon">
							Activity 1 Name
						</button>
					</h2>
					<div class="party-info">
						<p>时间: 10:00 AM - 12:00 PM</p>
						<p>主办者: {{}}</p>
					</div>
				</div>
				<div id="party1-detail" class="collapse" data-bs-parent="#party-list">
					<div class="card-body">
						<p>没有更多了</p>
					</div>
				</div>
			</div>-->

		</div>
	</div>
</div>
@include('components.navfooter')
@include('components.footer')
</body>
</html>
