$(document).ready(
	function () {
		var e={};
		function crop() {
			$("#icon").show();
			const stage = Jcrop.attach('cropper',{
				aspectRatio: 1
			});
			const rect = Jcrop.Rect.create(0,0,200,200);
			const options = {};
			stage.newWidget(rect,options);
			stage.activate();
			return stage.active.pos;
		}
		$("#icon").hide();
		$('#edit').click(function(){
			e=crop();
		});

		$("#icon").change(function () {
			var file = $("#icon").get(0).files[0];
			var reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onloadend = function () {
				$("#cropper").attr("src", reader.result);
			}
		});
		$("#submit").on("click",function(){
			var formData = new FormData($("form")[0]);
			// console.log(test);
			formData.append("123","123");
			formData.append("avatar",$("#icon")[0].files[0]);
			for (i in ['x','y','w','h']){
				formData.append(i,e[i]);
			}
			$.ajax({
				// url:,
				data:formData,
				type:'POST',
				processData: false,
				contentType: false,
				success:function(res){
					if (res.code==200){
						alert("修改成功");
					}
				}
			});
		});
	}
);
