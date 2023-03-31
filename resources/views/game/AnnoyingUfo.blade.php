<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>恼人的UFO - THParty.Fun</title>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<script type="application/javascript" src="{{asset("js/game/AnnoyingUfo.js")}}"></script>
</head>
<body>
<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-6">
			<h1 class="display-1">正在加载中...</h1>
		</div>
		<div class="col-sm-12 col-lg-6 my-sm-3">
			<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
				<a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
					<span class="fs-5 fw-semibold">队伍</span>
				</a>

				<div class="list-group list-group-flush border-bottom scrollarea" id="groupList">
					<div class="list-group-item row py-3 lh-tight" id="groupItem1">
						<div class="row">
							<div class="col-8"><input type="text" class="groupName form-control" id="groupName1" placeholder="队伍名称..."></div>
							<div class="groupCount col-4">
								<button class="btn scoreMinus btn-danger" id="scoreMinus1" tid="1"><h5 class="d-inline">-</h5></button>
								<span><b class="score" id="score1">0</b></span>
								<button class="btn scoreAdd btn-success" id="scoreAdd1" tid="1"><h5 class="d-inline">+</h5></button>
							</div>
						</div>
					</div>


					<div class="list-group-item row py-3 lh-tight">
						<button class="btn col-12 btn-info" id="addGroup">
							+
						</button>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

</body>
</html>
/
