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

	if ($(window).width() < 760) {
		function footer(name) {
			$('h4.footer-'+name).on('click', function() {
				if ($('ul.footer-'+name).is(':visible')) {
					$('ul.footer-'+name).slideUp();
					if (name == "plan") {
						$('h4.footer-'+name).html('<i class="fa fa-chevron-right"></i> Plan du site');
					}
					if (name == "infos") {
						$('h4.footer-'+name).html('<i class="fa fa-chevron-right"></i> Informations');
					}
				} else {
					$('ul.footer-'+name).slideDown();
					if (name == "plan") {
						$('h4.footer-'+name).html('<i class="fa fa-chevron-down"></i> Plan du site');
					}
					if (name == "infos") {
						$('h4.footer-'+name).html('<i class="fa fa-chevron-down"></i> Informations');
					}
				}
			});
		}

		footer('plan');
		footer('infos');
	}

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