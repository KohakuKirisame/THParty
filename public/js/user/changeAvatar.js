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
			// stage.newWidget();
			stage.activate();
			//stage.active.pos;
		}

		$('#edit').click(function(){
			$("#icon").show();
		});
		$("#icon").change(function () {
			var file = $("#icon").get(0).files[0];
			if(file === undefined)return;
			var reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onloadend = function () {
				$("#cropper").attr("src", reader.result);
				$(".jcrop-image-stage").css({"z-index":999});
				crop();
			}



		});
		$("#submit_avatar").on("click",function(){
			var formData = new FormData($("form")[0]);
			// console.log(test);
			// formData.append("123","123");
			e=stage.active.pos;
			formData.append("avatar",$("#icon")[0].files[0]);
			for (i in ['x','y','w','h']){
				formData.append(i,e[i]);
			}
			console.log(formData.find("x"));
			$.ajax({
				// url:,
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
