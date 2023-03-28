var sent = 0;
$("#sendCaptcha").on("click", function () {
	var phone = $("#phone").val();
	var _token = $("input[name='_token']").val();
	$("#sendCaptcha").attr("disabled", "disabled");
	$.post("/Actions/SendSMSCaptcha", {
		_token: _token,
		phone: phone,
		success:function(data){
			$("#sendCaptcha").html("120秒后重新获取验证码");
			$("#sendCaptcha").attr("disabled", "disabled");
			var t = 119;
			var timeStr = '';
			var countDown = setInterval(function () {
				if (t == 0) {
					$("#sendCaptcha").html("发送验证码");
					$("#sendCaptcha").removeAttr("disabled", "disabled");
					sent=0;
					clearInterval(countDown);
					return 0;
				}
				timeStr = t + "秒后重新获取验证码";
				$("#sendCaptcha").html(timeStr);
				t--;
			}, 1000);
		}
	}, function (data) {sent=1;});

});

$("#phone").on("blur", function () {
	var phone = $("#phone").val();
	if (phone.length != 11) {
		$("#button-addon2").attr("disabled", "disabled");
	} else {
		if (sent==0){
			$("#button-addon2").removeAttr("disabled");
		}
	}
});

$("#submit").on("click", function(){
	var old_pw = $("#old_password").val();
	var new_pw = $("#password").val();
	var pwConfirm = $("#password_confirm").val();
	var captcha = $("#captcha").val();
	if(new_pw != pwConfirm){
		alert("两次密码不同！");
		return;
	}else if(old_pw == new_pw){
		alert("新密码不能和旧密码相同！");
		return;
	}
	$.post("/Actions/", {
		_token: _token,
		captcha: captcha,
		oldPassword: old_pw,
		newPassword: new_pw
	});
});

$(document).ready(function(){
	$("#navSecurity").css("font-weight","bold");
});
