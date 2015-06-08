$(document).ready(function(){
	$('.alert-top .close').on('click', function() {
		$('.alert-top').hide();
	});

	$('#toggle-menu').on('click', function(){
		$('.nav-content-res').stop().slideToggle();
	});

	$(window).on('resize', function(){
		if($(this).width() >= 760)
		{	
			if ($('.nav-content-res').is(':visible')) {
				$('.nav-content-res').hide();
			}
			
			if (!$('#footer-top ul.footer-plan').is(':visible')) {
				$('#footer-top ul.footer-plan').show();
			}

			if (!$('#footer-top ul.footer-infos').is(':visible')) {
				$('#footer-top ul.footer-infos').show();
			}
		}

		if ($(this).width() < 760) {
			$('#footer-top section.footer-plan').on('click', function() {
				if ($('#footer-top ul.footer-plan').is(':visible')) {
					$('#footer-top ul.footer-plan').slideUp();
					$('#footer-top h4.footer-plan').html('<i class="fa fa-chevron-right"></i> Plan du site');
				} else {
					$('#footer-top ul.footer-plan').slideDown();
					$('#footer-top h4.footer-plan').html('<i class="fa fa-chevron-down"></i> Plan du site');
				}
			});

			$('#footer-top section.footer-infos').on('click', function() {
				if ($('#footer-top ul.footer-infos').is(':visible')) {
					$('#footer-top ul.footer-infos').slideUp();
					$('#footer-top h4.footer-infos').html('<i class="fa fa-chevron-right"></i> Informations');
				} else {
					$('#footer-top ul.footer-infos').slideDown();
					$('#footer-top h4.footer-infos').html('<i class="fa fa-chevron-down"></i> Informations');
				}
			});
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