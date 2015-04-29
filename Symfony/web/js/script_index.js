$(document).ready(function() {
	//$('.carousel-front').css('background', 'url("../images/carousel-example2.jpg") center center no-repeat');

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
});