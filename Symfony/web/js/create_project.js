$(document).ready(function() {

	var $containerBesoins = $('div#cf_mainbundle_projet_besoins');

	var $lienAjoutBesoins = $('<a href="#" id="ajout_besoin" class="btn btn-success"><i class="fa fa-plus"></i></a>');

	$lienAjoutBesoins.click(function(e) {
		ajouterBesoin($containerBesoins);
		e.preventDefault();
		return false;
	});

	var indexBesoin = $containerBesoins.find(':input').length;

	if (indexBesoin == 0) {
		ajouterBesoin($containerBesoins);
	} 
	else {
		$containerBesoins.children('div').each(function() {
			ajouterLienSuppressionBesoin($(this));
		});
	}

	function ajouterBesoin($containerBesoins) {
		var $prototype = $($containerBesoins.attr('data-prototype').replace(/__name__label__/g, 'Ressource').replace(/__name__/g, indexBesoin));

		ajouterLienSuppressionBesoin($prototype);
		$containerBesoins.append($prototype);
		indexBesoin++;

		$containerBesoins.append($lienAjoutBesoins);
	}

	function ajouterLienSuppressionBesoin($prototype) {
		$lienSuppression = $('<a href="#" class="btn btn-danger" id="suppr_besoin"><i class="fa fa-minus"></i></a>');
		$prototype.append($lienSuppression);

		$lienSuppression.click(function(e) {
			$prototype.remove();
			e.preventDefault();
			return false;
		});
	}

	/**** BOXS HISTOIRE ****/

	var $containerBox = $('div#cf_mainbundle_projet_boxs');

	var $lienAjoutBox = $('<a href="#" id="ajout_box" class="btn btn-success"><i class="fa fa-plus"></i></a>');

	$lienAjoutBox.click(function(e) {
		ajouterBox($containerBox);
		e.preventDefault();
		return false;
	});

	var indexBox = $containerBox.find(':input').length;

	if (indexBox == 0) {
		ajouterBox($containerBox);
	} 
	else {
		$containerBox.children('div').each(function() {
			ajouterLienSuppressionBox($(this));
		});
	}

	function ajouterBox($containerBox) {
		var $prototype = $($containerBox.attr('data-prototype').replace(/__name__label__/g, 'Boîte').replace(/__name__/g, indexBox));

		ajouterLienSuppressionBox($prototype);
		$containerBox.append($prototype);
		indexBox++;

		$containerBox.append($lienAjoutBox);
	}

	function ajouterLienSuppressionBox($prototype) {
		$lienSuppression = $('<a href="#" class="btn btn-danger" id="suppr_box"><i class="fa fa-minus"></i></a>');
		$prototype.append($lienSuppression);

		$lienSuppression.click(function(e) {
			$prototype.remove();
			e.preventDefault();
			return false;
		});
	}

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