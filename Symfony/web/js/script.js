$(document).ready(function(){
	$('.alert-top .close').on('click', function() {
		$('.alert-top').hide();
	});

	$('#toggle-menu').on('click', function(){
		$('.nav-content-res').stop().slideToggle();
	});

	$(window).on('resize', function(){
		if($(window).width() >= 760)
		{	
			$('.nav-content-res').hide();
		}
	});

	$('[data-toggle="tooltip"]').tooltip();

	$('.profile-navigation').on('click', function() {
		if ($('.profile-left-menu').is(':visible')) {
			$('.profile-left-menu').hide("slide", { direction: "left" }, 400);
			
		} else {
			$('.profile-left-menu').show("slide", { direction: "left" }, 400);
			
		}

		$(this).scrollTop();
	});
});