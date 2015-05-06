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
			if ($('.search input').val().sansAccent().toLowerCase().indexOf($(this).text().sansAccent().toLowerCase()) > -1) {
				$(this).addClass('active');
				$(this).parent().append('<span class="glyphicon glyphicon-ok checkmark"></span>');
			}
		});
		$('.search input').val($('.search input').val().sansAccent().toLowerCase());
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
			
			var chaine = $('.search input').val().sansAccent().toLowerCase();
			chaine = chaine.replace($select.text().sansAccent().toLowerCase(),'');
			
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
});