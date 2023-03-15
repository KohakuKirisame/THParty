$(document).ready(
	function () {
		var e={};
		function crop() {
			//使用Jcrop显示裁剪框，并返回位置
			const stage = Jcrop.attach('cropper',{
				aspectRatio: 1
			});
			const rect = Jcrop.Rect.create(0,0,200,200);
			const options = {};
			stage.newWidget(rect,options);
			stage.activate();
			return stage.active.pos;
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
			}
			e=crop();
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
				data:formData,//formData包括 File,x,y,w,h;
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
