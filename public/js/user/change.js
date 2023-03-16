$(document).ready(
	function () {
		$("#abort").hide();
		$("#submit").hide();
		$('#edit').click(
			function () {
				$(".form-control-plaintext").removeClass("form-control-plaintext").addClass("form-control").attr("readonly",false);
				$(this).hide();
				$("#abort").show();
				$("#submit").show();
			}
		);
		$("#abort").on("click",function(){

		})
	}
);
