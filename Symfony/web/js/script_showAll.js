$(document).ready(function(){
	var x=0;

    $(".panel").hover(function(){
		if(x==0)$(".sous-menu").toggle(800);
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

$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() == $(document).height()) {
	setTimeout(function() {
		$(".content").append("<div class='apercu'>		</div>");
	}, 2000);
	}
  });
});