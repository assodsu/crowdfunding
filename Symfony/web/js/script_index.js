$(document).ready(function() {
<<<<<<< HEAD
	$('.carousel-front').css('background', 'url("../images/carousel-example2.jpg") center center no-repeat').css('background-size', 'cover');
=======
>>>>>>> origin/Accueil

	$('.search').on('click', function() {
		$('.search input').focus();
	});
	
	$('.select').on('click', function() {
		$select = $(this);
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');	
			
			var chaine = $('.search input').val();
  			chaine = chaine.replace($select.text(),'');
  			
  			$('.search input').val($.trim(chaine));
		} else {
			$(this).addClass('active');
			$('.search input').val( function( index, val ) {
    			if (val == "")
    				return $select.text();
    			else
    				return val + " " + $select.text();
    		});
		}
	});

	$('.slider').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		prevArrow: '<button type="button" class="slick-prev"><</button>',
		nextArrow: '<button type="button" class="slick-next">></button>'

	});

	$(".mask").css('opacity','0');

	$(".item-slider").hover(function(){
	    $(this).children('div.mask').animate({ opacity: "1" }, {queue: false});
	    $(this).children('div.project-more-infos').animate({ bottom: "5px" }, {queue: false});
	}, function() {
	    $(this).children('div.mask').animate({ opacity: "0" }, {queue: false});
	    $(this).children('div.project-more-infos').animate({ bottom: "-30px" }, {queue: false});
	});
});