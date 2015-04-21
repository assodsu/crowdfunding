$(document).ready(function() {

	var $containerDons = $('div#cf_mainbundle_projet_dons');

	var $lienAjoutDons = $('<div id="add-besoin-box"><a href="#">+</a></div>');

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

	$(".header-besoin-box select").change(function () {
	  var parent = $(this).parent().parent().parent();
	  var color = parent.attr('class');
	  var span = $(this).parent().parent().children('span');

      var newColor = "";
      var icon = "";

      if($(this).val() == 1)
      {
      	newColor = "green";
      	icon = "user";
      }
      else if($(this).val() == 2)
      {
      	newColor = "red";
      	icon = "euro";
      }
      else if($(this).val() == 3)
      {
      	newColor = "purple";
      	icon = "tag";
      }
      else if($(this).val() == 4)
      {
      	newColor = "grey";
      	icon = "tag";
      }
      span.attr('class', "glyphicon glyphicon-"+icon);
      parent.attr('class', "besoin-box "+newColor);
    });
});