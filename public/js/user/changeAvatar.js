$(document).ready(
	function () {
		// $("#icon").hide();
		var e={};
		// const stage;
		function crop() {
			const stage = Jcrop.attach('cropper',{
				aspectRatio: 1
			});
			const rect = Jcrop.Rect.create(0,0,100,100);
			const options = {};
			stage.newWidget(rect,options);
			stage.activate();
			//stage.active.pos;
		}

		$("#icon").change(function () {
			var file = $("#icon").get(0).files[0];
			if(file === undefined)return;
			var reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onloadend = function () {
				$("#cropper").attr("src", reader.result);
				crop();

				$(".jcrop-image-stage").css({"z-index":999});
			};
		});
		$("#submit_avatar").on("click",function(){
			var formData = new FormData($("#avatarForm")[0]);
			var _token = $("#avatarForm input[name='_token']").val();
			// console.log(test);
			// formData.append("123","123");
			// e=stage.active.pos;
			formData.append("avatar",$("#icon")[0].files[0]);
			formData.append("x",$(".jcrop-widget").css("left").slice(0,-2));
			formData.append("y",$(".jcrop-widget").css("top").slice(0,-2));
			formData.append("w",$(".jcrop-widget").css("width").slice(0,-2));
			formData.append("h",$(".jcrop-widget").css("height").slice(0,-2));
			// for (i in ['x','y','w','h']){
			// 	formData.append(i,e[i]);
			// }
			// console.log(formData.get("x"));

			$.ajax({
				// url:,
				_token:_token,
				data:formData,
				type:'POST',
				processData: false,
				contentType: false,
				success:function(res){
					if (res.code==200){
						//alert("修改成功");
						console.log("修改成功");
					}
				}
			});
		});
	}
);
