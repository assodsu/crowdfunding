$(document).ready(function(){
$(".sidebar li a").hover(function(){
	$(".sidebar2").css("display","inline-block");
});

$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() == $(document).height()) {
		$(".content").append("<div class=\"apercu\"><img src=\"{{ asset('images/1.jpg') }}\"/></div><div class=\"apercu\"><img src=\"{{ asset('images/2.jpg') }}\"/></div><div class=\"apercu\"><img src=\"{{ asset('images/3.jpg') }}\"/></div><div class=\"apercu\"><img src=\"{{ asset('images/4.jpg') }}\"/></div><div class=\"apercu\"><img src=\"{{ asset('images/5.jpg') }}\"/></div>");
    }
  });
  
  
});