$(document).ready(function() {

	var $containerDons = $('div#cf_mainbundle_projet_dons');

	var $lienAjoutDons = $('<a href="#" id="ajout_don" class="btn btn-success"><i class="fa fa-plus"></i></a>');

	$lienAjoutDons.click(function(e) {
		ajouterDon($containerDons);
		e.preventDefault();
		return false;
	});

	var indexDon = $containerDons.find(':input').length;

	if (indexDon == 0) {
		ajouterDon($containerDons);
	} 
	else {
		$containerDons.children('div').each(function() {
			ajouterLienSuppressionDon($(this));
		});
	}

	function ajouterDon($containerDons) {
		var $prototype = $($containerDons.attr('data-prototype').replace(/__name__label__/g, 'Ressource').replace(/__name__/g, indexDon));

		ajouterLienSuppressionDon($prototype);
		$containerDons.append($prototype);
		indexDon++;

		$containerDons.append($lienAjoutDons);
	}

	function ajouterLienSuppressionDon($prototype) {
		$lienSuppression = $('<a href="#" class="btn btn-danger" id="suppr_don"><i class="fa fa-minus"></i></a>');
		$prototype.append($lienSuppression);

		$lienSuppression.click(function(e) {
			$prototype.remove();
			e.preventDefault();
			return false;
		});
	}
});