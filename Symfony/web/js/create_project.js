$(document).ready(function() {

	var $containerBesoins = $('div#cf_mainbundle_projet_besoins');

	var $lienAjoutBesoins = $('<div id="add-besoin-box"><a href="#">+</a></div>');

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
		$containerBesoins.append('</div>');

		indexBesoin++;

		$containerBesoins.append($lienAjoutBesoins);
	}

	function ajouterLienSuppressionBesoin($prototype) {
		$lienSuppression = $('<a href="#" class="delete-button"><span class="glyphicon glyphicon-remove"></span></a>');
		$boite = $('<div class="besoin-box green" id="box-'+indexBesoin+'"></div>');
		$boite.append($lienSuppression);
		$boite.append('<div class="header-besoin-box"><span class="fa fa-users"></span></div>');
		$($prototype.children('div#cf_mainbundle_projet_besoins_'+indexBesoin)).appendTo($boite);
		$prototype.append($boite);

		$lienSuppression.click(function(e) {
			$prototype.remove();
			e.preventDefault();
			return false;
		});
	}

	$(document).on('change', '.body-besoin', function(){

		var index = $(this).attr('id');
		index = jQuery.trim(index).substring(29, 30);

		var newColor = "";
		var icon = "";

		if($(this).val() == 'benevole')
		{
			newColor = "green";
			icon = "users";
		}
		else if($(this).val() == 'financier')
		{
			newColor = "red";
			icon = "euro";
		}
		else if($(this).val() == 'materiel')
		{
			newColor = "purple";
			icon = "cube";
		}
		else if($(this).val() == 'communication')
		{
			newColor = "grey";
			icon = "tag";
		}
		$('#box-'+index).children('div.header-besoin-box').children('span').attr('class', "fa fa-"+icon);
		$('#box-'+index).attr('class', "besoin-box "+newColor);
    });

	

	/**** NAVIGATION ****/
    var navListItems = $('.step a'), allWells = $('.row.step-content');

    allWells.hide();
    $('#step-1').show();
    changeActuelStep();

    function changeActuelStep() {
        for (var i = 1; i <= 5; i++)
            if ($('#step-'+ i).is(':visible'))
                $('a.step-'+i+' .step-active').css('background-color', '#2ECC71').css('color', 'white');
            else
                $('a.step-'+i+' .step-active').css('background-color', 'white').css('color', '#2574A9');
    }

    navListItems.click(function(e)
    {
        e.preventDefault();
        var target = $($(this).attr('href'));
        var numberStep = '1';

        if ($(this).hasClass('step-1')) {
            numberStep = '1';
        } else if ($(this).hasClass('step-2')) {
            numberStep = '2';
        } else if ($(this).hasClass('step-3')) {
            numberStep = '3';
        } else if ($(this).hasClass('step-4')) {
            numberStep = '4';
        } else {
            numberStep = '5';
        }

        $('.step-' + numberStep).html('<div class="step-active">'+numberStep+'</div>');
        
        allWells.hide();
        target.show();
        changeActuelStep();
    });

    $('.step-last a').click(function(e)
    {
        e.preventDefault();
        var target = $($(this).attr('href'));
        var numberStep = '5';
        $('.step-' + numberStep).html('<div class="step-active">'+numberStep+'</div>');
        
        allWells.hide();
        target.show();
        changeActuelStep();
    });

    $('#activate-step-2').on('click', function(e) {
        $('a.step-2').trigger('click');
    });

    $('#activate-step-3').on('click', function(e) {
        $('a.step-3').trigger('click');
    });

    $('#activate-step-4').on('click', function(e) {
        $('a.step-4').trigger('click');
    });

    $('#activate-step-5').on('click', function(e) {
        $('a.step-5').trigger('click');   
    });
});