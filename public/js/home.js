function goHome(){
	$('#first').fadeOut(2000);
	setTimeout(function(){
		$('#first').removeClass('d-flex');
	}, 2000);
	clearInterval(glow);
}
