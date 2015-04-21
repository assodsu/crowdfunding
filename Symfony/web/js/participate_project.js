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
		var $prototype = $($containerDons.attr('data-prototype').replace(/__name__label__/g, '').replace(/__name__/g, indexDon));
		
		ajouterLienSuppressionDon($prototype);
		$containerDons.append($prototype);        
		$containerDons.append('</div>');

		indexDon++;

		$containerDons.append($lienAjoutDons);
	}

	function ajouterLienSuppressionDon($prototype) {
		$lienSuppression = $('<a href="#" class="delete-button"><span class="glyphicon glyphicon-remove"></span></a>');
		$boite = $('<div class="besoin-box green" id="box-'+indexDon+'"></div>');
		$boite.append($lienSuppression);
		$boite.append('<div class="header-besoin-box"><span class="glyphicon glyphicon-user"></span><div class="styled-select"><select><option value="1" selected>Humaines</option><option value="2">Financière</option><option value="3">Matérielles</option><option value="4">Informationel - Com.</option></select><span class="glyphicon glyphicon-menu-down"></span></div></div>');
		$($prototype.children('div#cf_mainbundle_projet_dons_'+indexDon)).appendTo($boite);
		$prototype.append($boite);

		$lienSuppression.click(function(e) {
			$prototype.remove();
			e.preventDefault();
			return false;
		});
	}
	$(document).on('change', '.header-besoin-box select', function(){
		
	  var parent = $(this).parent().parent().parent();
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