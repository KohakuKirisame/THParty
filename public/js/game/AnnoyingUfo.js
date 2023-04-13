$(document).ready(function(){
	var xGreySrc = "/img/tmpXGrey.png";
	var xRedSrc = "/img/tmpXLight.png";
	var groupNum = 1;
	$("#deleteGroup1").hide();
	$("#groupList").on("click",".deleteGroup",function (){
		tid = $(this).attr("tid");
		$("div[id=groupItem"+tid+"]").fadeOut();//非常不好的操作，可能会给未来留下大坑！
	});
	$("#groupList").on("blur",".groupName",function(){
		$(this).removeClass("form-control");
		$(this).addClass("form-control-plaintext");
		tid = $(this).attr("tid");
		var t=1;
		var countDown = setInterval(function () {
			if (t == 0) {
				// doing some alarm;
				$("button[id=deleteGroup"+tid+"]").fadeOut();
				clearInterval(countDown);
				return 0;
			}
			t--;
		}, 100);
	});

	$("#groupList").on("click",".groupName",function(){
		$(this).addClass("form-control");
		$(this).removeClass("form-control-plaintext");
		tid = $(this).attr("tid");
		$("button[id=deleteGroup"+tid+"]").fadeIn("fast");
	});
	// $("#groupList").on("click",".scoreMinus",function(){
	//     tid = $(this).attr("tid");
	//     if( parseInt($("#score" + tid.toString()).html()) > 0) {
	//         $("#score" + tid.toString()).html(parseInt($("#score" + tid.toString()).html()) - 1);
	//     }
	// });
	$("#groupList").on("click",".scoreAdd",function(){
		let tid = $(this).attr("tid");
		let score = parseInt($("#groupItem"+tid.toString()).attr("score"));
		// console.log("score",score,"tid",tid);
		if(score <= 2){
			score++;
			$("img[tid="+tid.toString()+"]img[imgN="+score+"]").attr("src",xRedSrc);
			console.log($("img[tid="+tid.toString()+"]img[imgN="+score+"]").attr("src"));
			$("#groupItem"+tid.toString()).attr("score",score);
		}

		// $("#score" + tid.toString()).html(parseInt($("#score" + tid.toString()).html()) + 1);
	});
	$("#groupReset").on("click",function (){
		for(let i=1;i<=groupNum;i++){
			$("div[id=groupItem"+i+"]").fadeOut();
		}
	});
	$("#addGroup").click(function(){
		groupNum++;
		let tid = groupNum.toString();
		let newGroup = '<div class="list-group-item row py-3 lh-tight" id="groupItem'+tid+'" score="0">\n' +
			'                        <div class="row">\n' +
			'                        <div class="col-8"><input type="text" class="groupName form-control" id="groupName'+tid+'" placeholder="队伍名称..." tid="'+tid+'"></div>\n' +
			'                        <div class="groupCount col-3">\n' +
			'                            <div class="row">\n' +
			'                                <div class="col-8">\n' +
			'                                    <div class="row">\n' +
			'                                        <div class="col-4 p-0">\n' +
			'                                            <img src="'+xGreySrc+'" tid="'+tid+'" imgN="1" width="100%">\n' +
			'                                        </div>\n' +
			'                                        <div class="col-4 p-0">\n' +
			'                                            <img src="'+xGreySrc+'" tid="'+tid+'" imgN="2" width="100%">\n' +
			'                                        </div>\n' +
			'                                        <div class="col-4 p-0">\n' +
			'                                            <img src="'+xGreySrc+'" tid="'+tid+'" imgN="3" width="100%">\n' +
			'                                        </div>\n' +
			'                                    </div>\n' +
			'                                </div>\n' +
			'                                <div class="col-4">\n' +
			'                                    <button class="btn btn-danger scoreAdd" id="scoreAdd'+tid+'" tid="'+tid+'">O</button>\n' +
			'                                </div>\n' +
			'                            </div>\n' +
			'                        </div>\n' +
			'                            <div class="col-1">\n' +
			'                                <button class="btn deleteGroup" id="deleteGroup'+tid+'" tid="'+tid+'"><i class="bi bi-x-circle"></i></button>\n' +
			'                            </div>\n' +
			'                        </div>\n' +
			'\n' +
			'                    </div>';

		$("#groupItem"+(groupNum-1).toString()).after(newGroup);
		$("#groupName"+tid).focus();
	});




	$("#timerSet").hide();
	var timeCount = 15;
	var countDown;
	var isCounting = 0;
	$("#timerChange").on("click",function (){
		if($(this).attr("setting")==='1'){
			$(this).attr("setting","0");
			// $(this).addClass("btn-success");
			// $(this).removeClass("btn-outline-dark");
			$("#timerSet").fadeIn("fast");
			$(this).html("<i class=\"bi bi-check-lg\"></i>");
		}else if($(this).attr("setting")==='0'){
			$("#timerSet").fadeOut();
			$(this).attr("setting","1");
			// $(this).removeClass("btn-success");
			// $(this).addClass("btn-outline-dark");
			$(this).html("<i class=\"bi bi-pencil-square\"></i>");
			timeCount = $("#timerSet").val();
			$("#timerShow").html(timeCount);
			// console.log(timeCount);
		}
	});

	$("#timerBegin").on("click",function(){
		if(isCounting==0) {
			isCounting = 1;
			timerBegin(timeCount, 5);
			$("#timerBegin").html("<i class=\"bi bi-arrow-clockwise\"></i>");
			$("#timerBegin").removeClass("btn-success");
			$("#timerBegin").addClass("btn-danger");
			var _token = $("meta[name='csrf-token']").attr("content");
			var room=$("meta[name='room']").attr("content");
			$.post("/Actions/Game/AnnoyingUfo",{
					_token: _token,
					room: room,
				},
				function(data,status){
					$("#linesText").html(data);
				}
			);
		}else{
			$("#timerBegin").html("<i class=\"bi bi-play\"></i>");
			$("#timerBegin").removeClass("btn-danger");
			$("#timerBegin").addClass("btn-success");
			timerReset();

		}
	});
	// $("#timerReset").on("click",function(){
	//     $("#timerBegin").removeAttr("disabled");
	//     $("#timerBegin").html("<i class=\"bi bi-play\"></i>");
	//     $("#timerBegin").removeClass("btn-warning");
	//     $("#timerBegin").addClass("btn-success");
	//     timerReset();
	// });
	function timerBegin(time, alarmTime){//倒计时时长、变红时长

		var t = parseInt(time)-1;
		const redTime = parseInt(alarmTime);
		countDown = setInterval(function () {
			$("#timerShow").html(t);
			if (t == 0) {
				// doing some alarm;
				clearInterval(countDown);
				isCounting = 0;
				return 0;
			}
			if (t == redTime){
				$("#timerShow").css("color","red");//样式变换
			}
			t--;
		}, 1000);
	}
	function timerReset(){
		clearInterval(countDown);
		isCounting = 0;
		$("#timerShow").css("color","black");
		$("#timerShow").html(timeCount);
	}

});
