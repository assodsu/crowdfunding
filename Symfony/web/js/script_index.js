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

	$('#search-bar').on('click', function() {
		$('#search-bar input').focus();
	});

	String.prototype.sansAccent = function(){
	    var accent = [
	        /[\300-\306]/g, /[\340-\346]/g, // A, a
	        /[\310-\313]/g, /[\350-\353]/g, // E, e
	        /[\314-\317]/g, /[\354-\357]/g, // I, i
	        /[\322-\330]/g, /[\362-\370]/g, // O, o
	        /[\331-\334]/g, /[\371-\374]/g, // U, u
	        /[\321]/g, /[\361]/g, // N, n
	        /[\307]/g, /[\347]/g, // C, c
	    ];
	    var noaccent = ['A','a','E','e','I','i','O','o','U','u','N','n','C','c'];
	     
	    var str = this;
	    for(var i = 0; i < accent.length; i++){
	        str = str.replace(accent[i], noaccent[i]);
	    }
	     
	    return str;
	}

	function selectionSelect() {
		$('.select').each(function() {
			$(this).removeClass('active');
			$(this).parent().children('span').remove();
			if ($('.search #form_tags').val().toUpperCase().indexOf($(this).text().toUpperCase()) > -1) {
				$(this).addClass('active');
				$(this).parent().append('<span class="glyphicon glyphicon-ok checkmark"></span>');
			}
		});
	}

	selectionSelect();
	
	$('.select').on('click', function() {
		$select = $(this);
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).parent().children('span').remove();
			
			var chaine = $('.search #form_tags').val();
			chaine = chaine.replace($select.text(),'');
			
			$('.search #form_tags').val($.trim(chaine));
		} else {
			$(this).addClass('active');
			$(this).parent().append('<span class="glyphicon glyphicon-ok checkmark"></span>');
			$('.search #form_tags').val( function( index, val ) {
				if (val == "")
					return $select.text();
				else
					return val + " " + $select.text();
			});
		}
	});
	
	function toSlick() {
		if($(window).width() <= 595 )
		{
			$('.slider.active').slick({
				slidesToShow: 2,
				slidesToScroll: 1,
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				prevArrow: '<button type="button" class="slick-prev"><img class="arrow-slider" src="../images/icones/arrowLeft.png" alt="previous"/></button>',
				nextArrow: '<button type="button" class="slick-next"><img class="arrow-slider" src="../images/icones/arrowRight.png" alt="next"/></button>'

			});
			$('.project-infos .title').css('font-size','13px');
		}
		else if($(window).width() <= 960 )
		{
			$('.slider.active').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				prevArrow: '<button type="button" class="slick-prev"><img class="arrow-slider" src="../images/icones/arrowLeft.png" alt="previous"/></button>',
				nextArrow: '<button type="button" class="slick-next"><img class="arrow-slider" src="../images/icones/arrowRight.png" alt="next"/></button>'

			});
			$('.project-infos .title').css('font-size','20px');
		}
		else
		{
			$('.slider.active').slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				prevArrow: '<button type="button" class="slick-prev"><img class="arrow-slider" src="../images/icones/arrowLeft.png" alt="previous"/></button>',
				nextArrow: '<button type="button" class="slick-next"><img class="arrow-slider" src="../images/icones/arrowRight.png" alt="next"/></button>'
			});
			$('.project-infos .title').css('font-size','22px');
		}
	}

	toSlick();

	$(".mask").css('opacity','0');

	$(".item-slider").hover(function(){
	    $(this).children('div.mask').animate({ opacity: "1" }, {queue: false});
	    $(this).children('div.project-more-infos').animate({ bottom: "5px" }, {duration: 200, queue: false});
	}, function() {
	    $(this).children('div.mask').animate({ opacity: "0" }, {queue: false});
	    $(this).children('div.project-more-infos').animate({ bottom: "-30px" }, {duration: 200, queue: false});
	});

	function imagesSlide(firstProjectSlide) {
		var img = firstProjectSlide.children('div.slide-image').attr('img');

		if(img)
		{
			$('.carousel-front').css('background', 'url("../uploads/'+img+'") center center no-repeat').css('background-size','cover');
			
			$('.carousel-front-texte').animate(
					{right:'-400px'},
					{duration: 0,queue: false}
				).animate(
					{right:'0'},
					{duration: 600,queue: false}
				);
			$('.text-selected-project').text(firstProjectSlide.children('div.slide-image').attr('text'));
			$('#hrefBtnDiscover').attr('href', 'projet/voir/' + firstProjectSlide.children('div.slide-image').attr('slugProject'));
			$('.project-selected-infos').text(firstProjectSlide.children('div.project-more-infos').children('div.text-infos').children('p').text());
			$('.carousel-front-texte .jauge').html(firstProjectSlide.children('div.project-more-infos').children('div.jauge').html());
			toSlick();
		}
	}

	imagesSlide($('div.slider.active > div > div > div.item-slider.slick-slide.slick-active').first());
	
	$('.sidebar-projects a, .slick-prev, .slick-next').on('click', function(){
		imagesSlide($('div.slider.active > div > div > div.item-slider.slick-slide.slick-active').first());
	});
	$('.item-slider').on('click', function(){
		imagesSlide($(this));
	});
	$( ".slide-image" ).each(function() {
		var img = $(this).attr('img');		
		if(img)
			$(this).css('background', 'url("../uploads/'+img+'") center center no-repeat').css('background-size','cover');
	});
	$('.slide-image-blured').each(function() {
		var img = $(this).parent().parent().children('div.slide-image').attr('img');	
		if(img)
			$(this).css('background', 'url("../uploads/'+img+'") center center no-repeat').css('background-size','cover');
	});
});