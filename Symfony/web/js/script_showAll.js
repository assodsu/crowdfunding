$(document).ready(function(){
	var x=0;
    $(".panel").hover(function(){
		if(x==0)$(".sous-menu").toggle({duration:800});
	});
	
	$(".menu li a").hover(
	function(){
		var ref = $(this).attr("href");
		$(".tab-pane").removeClass(" active");
		$(ref).removeClass(" fade").addClass(" active");
		x=0;
	});
	
	$(".sous-menu").click(
	function(){
		x=1;
		$(this).css("display","inline-block");
	});
});