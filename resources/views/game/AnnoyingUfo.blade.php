<!DOCTYPE html>
<html lang="zh-CN">
<head>
	@include('components.header')
	<title>恼人的UFO - THParty.Fun</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<script type="application/javascript" src="{{asset("js/game/AnnoyingUfo.js")}}"></script>
	<meta name="room" content="{{$room->id}}">
</head>
<body>
<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-6">
			<div class="row" id="timerDiv">
				<div class="col-7" style="text-align:center">
					<h1 class="display-1" id="timerShow">15</h1>
				</div>
				<div class="col-5">
					<div class="row">
						<div class="col-4"><input type="number" class="form-control" value="15" min="0" id="timerSet"></div>
						<div class="col-8">
							<button id="timerChange" class="btn btn-outline-dark" setting="1"><i class="bi bi-pencil-square"></i></button>
							<button class="btn btn-success" id="timerBegin"><i class="bi bi-play"></i></button>
							<!--                            <button id="timerFinishSet" class="btn btn-outline-dark"><i class="bi bi-check"></i></button>-->
							<!--                            <button id="timerReset" class="btn btn-outline-dark"><i class="bi bi-arrow-clockwise"></i></button>-->
						</div>

					</div>
					<div class="row">
						<div class="col-4"></div>
						<div class="col-8">
							<br>

						</div>
					</div>
				</div>

			</div>
			<div class="row"><h1 class="display-1" id="linesText">等待开始...</h1></div>
		</div>
		<div class="col-sm-12 col-lg-6 my-sm-3">
			<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
				<a href="#" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
					<span class="fs-5 fw-semibold">队伍 &nbsp</span><button id="groupReset" class="btn"><i class="bi-arrow-clockwise"></i></button>
				</a>
				<div class="list-group list-group-flush border-bottom scrollarea" id="groupList">
					<div class="list-group-item row py-3 lh-tight" id="groupItem1" score="0">
						<div class="row">
							<div class="col-8"><input type="text" class="groupName form-control" id="groupName1" placeholder="队伍名称..." tid="1"></div>
							<div class="groupCount col-3">
								<div class="row">
									<div class="col-8">
										<div class="row">
											<div class="col-4 p-0">
												<img src="/img/tmpXGrey.png" tid="1" imgN="1" width="100%">
											</div>
											<div class="col-4 p-0">
												<img src="/img/tmpXGrey.png" tid="1" imgN="2" width="100%">
											</div>
											<div class="col-4 p-0">
												<img src="/img/tmpXGrey.png" tid="1" imgN="3" width="100%">
											</div>
										</div>
									</div>
									<div class="col-4">
										<button class="btn btn-danger scoreAdd" id="scoreAdd1" tid="1">O</button>
									</div>
								</div>
								<!--                            <div>--><!--已经弃用的设计-->
								<!--                                <button class="btn scoreMinus btn-danger" id="scoreMinus1" tid="1"><h5 class="d-inline">-</h5></button>-->
								<!--                                <span><b class="score" id="score1">0</b></span>-->
								<!--                                <button class="btn scoreAdd btn-success" id="scoreAdd1" tid="1"><h5 class="d-inline">+</h5></button>-->
								<!--                            </div>-->
							</div>
							<div class="col-1">
								<button class="btn deleteGroup" id="deleteGroup1" tid="1"><i class="bi bi-x-circle"></i></button>
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
