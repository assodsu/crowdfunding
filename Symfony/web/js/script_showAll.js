$(document).ready(function(){
	$('.search').on('click', function() {
		$('.search input').focus();
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
			if ($('.search input').val().toUpperCase().indexOf($(this).text().toUpperCase()) > -1) {
				$(this).addClass('active');
				$(this).parent().append('<span class="glyphicon glyphicon-ok checkmark"></span>');
			}
		});
	}

	selectionSelect();

	$('.search input').keyup(function() {
		selectionSelect();	
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

	$(window).scroll(function(){
		if ($(this).scrollTop() > $('#search-content').height()) {
			if($(this).width() <= 760) {
	  			$('.search').css('position','fixed').css('z-index','5').css('top','0');
			}
			else {
				$('.search').css('position','fixed').css('z-index','5').css('top','46px');
			}
	  		$('#content-scrolling').css('margin-top','50px');
	  		$('.scrolling-text').show(200);

		} 
		else {

	  		$('.search').css('position','relative').css('z-index','5').css('top','0');
	  		$('#content-scrolling').css('margin-top','0');
	  		$('.scrolling-text').hide(200);
		}
		if($(window).scrollTop() + $(window).height() == $(document).height()) {
			$('.scrolling-text').hide(200);
		}
	});

});