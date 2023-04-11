$(document).ready(function(){
	var groupNum = 1;
	$("#deleteGroup1").hide();
	$("#groupList").on("click",".deleteGroup",function (){
		tid = $(this).attr("tid");
		// alert(tid);
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
	$("#groupList").on("click",".scoreMinus",function(){
		tid = $(this).attr("tid");
		if( parseInt($("#score" + tid.toString()).html()) > 0) {
			$("#score" + tid.toString()).html(parseInt($("#score" + tid.toString()).html()) - 1);
		}
	});
	$("#groupList").on("click",".scoreAdd",function(){
		tid = $(this).attr("tid");
		$("#score" + tid.toString()).html(parseInt($("#score" + tid.toString()).html()) + 1);
	});

	$("#addGroup").click(function(){
		groupNum++;
		tid = groupNum.toString();
		var newGroup = "<div class=\"list-group-item row py-3 lh-tight\" id=\"groupItem"+tid+"\">\n" +
			"                        <div class='row justify-content-center'><div class='col-8'><input type=\"text\" class=\"groupName col-7 form-control\" placeholder='队伍名称...' id=\'groupName"+tid+"\' tid=\'"+tid+"\'></div>\n" +
			"                        <div class=\"groupCount col-3 justify-content-center\">\n" +
			"                            <button class=\"btn scoreMinus btn-danger\" id=\"scoreMinus1\" tid=\""+tid+"\"><h5 class='d-inline'>-</h5></button>\n" +
			"                            <span><b class=\"score\" id=\"score"+tid+"\">0</b></span>\n    " +
			"                            <button class=\"btn scoreAdd btn-success\" id=\"scoreAdd1\" tid=\""+tid+"\"><h5 class='d-inline'>+</h5></button>\n" +
			"                        </div><div class=\"col-1\"><button class=\"btn deleteGroup\" id=\"deleteGroup"+tid+"\" tid=\""+tid+'\" display=\"none\"><i class="bi bi-x-circle"></i></button></div>'+"\n"+
			"                    </div>";

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
