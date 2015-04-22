//script de controle des champs de formulaire de l'inscription d'une association
//CODE FONCTIONNEL
$(document).ready(function(){

	/**** NAVIGATION ****/
	var step = $('.stepwizard a');
	var allForms = $('.step-content');

	allForms.hide();
	$('#step-1').show();

	step.click(function(e) {
		var $target = $($(this).attr('href'));

		e.preventDefault();
		allForms.hide(0);
		$target.slideDown(1000);
		step.closest('a').children().switchClass("btn-primary", "btn-default", 1000, "easeInOutQuad");
		$(this).children().switchClass("btn-default", "btn-primary", 1000, "easeInOutQuad");
	});

	$('#activate-step-2').on('click', function(e) {
		allForms.hide();
		$('a[href="#step-2"] button').removeAttr('disabled').trigger('click');
	});

	$('#activate-step-3').on('click', function(e) {
		allForms.hide();
		$('a[href="#step-3"] button').removeAttr('disabled').trigger('click');
	});

	$('#activate-step-4').on('click', function(e) {
		allForms.hide();
		$('a[href="#step-4"] button').removeAttr('disabled').trigger('click');
	});

	$('#activate-step-5').on('click', function(e) {
		allForms.hide();
		$('a[href="#step-5"] button').removeAttr('disabled').trigger('click');
	});

});