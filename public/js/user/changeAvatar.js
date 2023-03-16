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
			$(".jcrop-image-stage").css({"z-index":999});
			//stage.active.pos;
		}
		function remove(){
			if($(".jcrop-widget").length!=0){
				var img = $("#cropper");
				$(".jcrop-image-stage").remove();
				$("#imgContainer").append(img);
			}
		}
		$("#icon").change(function () {
			var file = $("#icon").get(0).files[0];
			remove();
			if(file === undefined)return;
			var reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onloadend = function () {
				$("#cropper").attr("src", reader.result);
				crop();
			};
		});
		$("imgContainer").on("load","img",function (){
				$(".modal-body").height($("#avatarForm").height()+$("#cropper").height()+5);
				$(".jcrop-image-stage").css({"z-index":999});
			}
		);
		$("#submit_avatar").on("click",function(){
			var formData = new FormData($("#avatarForm")[0]);
			var _token = $("#avatarForm input[name='_token']").val();
			var width = $("#cropper").width();
			// console.log(width);
			formData.append("x",$(".jcrop-widget").css("left").slice(0,-2));
			formData.append("y",$(".jcrop-widget").css("top").slice(0,-2));
			formData.append("w",$(".jcrop-widget").css("width").slice(0,-2));
			formData.append("h",$(".jcrop-widget").css("height").slice(0,-2));
			formData.append("width",width);
			$.ajax({
				url:'https://thparty.fun/Actions/ChangeAvatar',
				headers: {
					'X-CSRF-TOKEN': _token
				},
				xhrFields: {
					withCredentials: true
				},
				data:formData,
				type:'POST',
				processData: false,
				contentType: false,
				success:function(res){
					if (res==0){
						alert("修改成功，由于浏览器缓存，可能需要5分钟后才能看到效果");
						location.reload();
					}
				}
			});
		});
	}
);
