$(document).ready(function(){
	$('.alert-top').delay(300).slideDown(800).delay(6000).slideUp(800);
	$('[data-toggle="tooltip"]').tooltip();

	$('.profile-navigation').on('click', function() {
		if ($('.profile-left-menu').is(':visible')) {
			$('.profile-left-menu').hide("slide", { direction: "left" }, 400);
			$('.block-new-project').hide("slide", { direction: "left" }, 400);
			
		} else {
			$('.profile-left-menu').show("slide", { direction: "left" }, 400);
			$('.block-new-project').show("slide", { direction: "left" }, 400);
			
		}

		$(this).scrollTop();
	});
});