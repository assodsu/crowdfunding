$(document).ready(function() {

	function changeCarousel(linkId, projetToActive) {
		$(linkId).on('click', function(e) {
			e.preventDefault();
			$('.sidebar-projects .active').removeClass('active');
			$('.slider.active').removeClass('active');
			$(projetToActive).addClass('active');
			$(linkId).addClass('active');
			toSlick();
		});
	}

	changeCarousel('#linkProjetsAccueil', '#projetsAccueil');
	changeCarousel('#linkProjetsAboutissants', '#projetsAboutissants');
	changeCarousel('#linkProjetsNouveaux', '#projetsNouveaux');

	$('.search').on('click', function() {
		$('.search input').focus();
	});
	
	$('.select').on('click', function() {
		$select = $(this);
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).parent().children('span').remove();
			
			var chaine = $('.search input').val();
			chaine = chaine.replace($select.text(),'');
			
			$('.search input').val($.trim(chaine));
		} else {
			$(this).addClass('active');
			$(this).parent().append('<span class="glyphicon glyphicon-ok checkmark"></span>');
			$('.search input').val( function( index, val ) {
				if (val == "")
					return $select.text();
				else
					return val + " " + $select.text();
			});
		}
	});
	
	function toSlick() {
		if($(window).width() <= 960 )
		{
			console.log('Mode tablette');
			$('.slider.active').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				prevArrow: '<button type="button" class="slick-prev"><</button>',
				nextArrow: '<button type="button" class="slick-next">></button>'

			});
		}
		else
		{
			console.log('Mode ecran');
			$('.slider.active').slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				prevArrow: '<button type="button" class="slick-prev"><</button>',
				nextArrow: '<button type="button" class="slick-next">></button>'

			});
		}
	}

	toSlick();

	$(".mask").css('opacity','0');

	$(".item-slider").hover(function(){
	    $(this).children('div.mask').animate({ opacity: "1" }, {queue: false});
	    $(this).children('div.project-more-infos').animate({ bottom: "5px" }, {queue: false});
	}, function() {
	    $(this).children('div.mask').animate({ opacity: "0" }, {queue: false});
	    $(this).children('div.project-more-infos').animate({ bottom: "-30px" }, {queue: false});
	});

	function imagesSlide() {
		var firstProjectSlide = $('div.slider.active > div > div > div.item-slider.slick-slide.slick-active').first();
		var img = firstProjectSlide.children('div.slide-image').attr('img');
		$('.carousel-front').css('background', 'url("../uploads/'+img+'") center center no-repeat').css('background-size','cover');
		$('.carousel-front-texte').animate(
				{right:'-400px'},
				{duration: 0,queue: false}
			).animate(
				{right:'0'},
				{duration: 500,queue: false}
			);
		$('.text-selected-project').text(firstProjectSlide.children('div.slide-image').attr('text'));
		$('#hrefBtnDiscover').attr('href', 'projet/' + firstProjectSlide.children('div.slide-image').attr('idProject'));
		$('.project-selected-infos').text(firstProjectSlide.children('div.project-more-infos').children('div.text-infos').children('p').text());
		$('.carousel-front-texte .jauge').html(firstProjectSlide.children('div.project-more-infos').children('div.jauge').html());
		toSlick();
	}

	imagesSlide();
	
	$('.sidebar-projects a, .slick-prev, .slick-next, .item-slider').on('click', function(){
		imagesSlide();
	});
	$( ".slide-image" ).each(function() {
		var img = $(this).attr('img');
		$(this).css('background', 'url("../uploads/'+img+'") center center no-repeat').css('background-size','cover');
	});
	$('.slide-image-blured').each(function() {
		var img = $(this).parent().parent().children('div.slide-image').attr('img');
		$(this).css('background', 'url("../uploads/'+img+'") center center no-repeat').css('background-size','cover');
	});
});