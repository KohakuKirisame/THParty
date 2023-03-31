$(document).ready(function(){
	var groupNum = 1;
	$("#groupList").on("blur",".groupName",function(){
		$(this).removeClass("form-control");
		$(this).addClass("form-control-plaintext");
	});
	$("#groupList").on("click",".groupName",function(){
		$(this).addClass("form-control");
		$(this).removeClass("form-control-plaintext");
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
			"                        <div class='row justify-content-center'><div class='col-8'><input type=\"text\" class=\"groupName col-7 form-control\" placeholder='队伍名称...' id=\'groupName\'"+tid+"></div>\n" +
			"                        <div class=\"groupCount col-4 justify-content-center\">\n" +
			"                            <button class=\"btn scoreMinus btn-danger\" id=\"scoreMinus1\" tid=\""+tid+"\"><h5 class='d-inline'>-</h5></button>\n" +
			"                            <span><b class=\"score\" id=\"score"+tid+"\">0</b></span>\n    " +
			"                            <button class=\"btn scoreAdd btn-success\" id=\"scoreAdd1\" tid=\""+tid+"\"><h5 class='d-inline'>+</h5></button>\n" +
			"                        </div></div>\n" +
			"                    </div>";
		$("#groupItem"+(groupNum-1).toString()).after(newGroup);
	});
});
