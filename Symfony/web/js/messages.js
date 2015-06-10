$(document).ready(function(){
	$('.conversation-resources-link').on('click', function(e){
          e.preventDefault();
          $(this).parent().children('.conversation-resources-list').slideToggle(200);
     });
});