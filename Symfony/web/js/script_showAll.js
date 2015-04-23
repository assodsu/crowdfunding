$(document).ready(function(){

	$("#menu, #sub-menu").hover(function(){
	    $("#sub-menu").stop(true, false).animate({ marginLeft: "200px" });
	}, function() {
	    $("#sub-menu").stop(true, false).animate({ marginLeft: "0px" });
	});

	$("#body-menu li").hover(function(){

		var categorie = $(this).children().attr('href');
		$(this).children().css('color','#63a2e8');
		$("#sub-menu div").removeClass("display").addClass('hidden');
		$(categorie).removeClass("hidden").addClass(" display");

	}, function() {
		$(this).children().css('color','#888687');
	});
});