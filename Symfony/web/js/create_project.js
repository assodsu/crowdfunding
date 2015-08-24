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
		$boite.append('<div class="header-besoin-box"><span class="glyphicon glyphicon-user"></span></div>');
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
		index = index.slice(0, -5);
		index = index.slice(29, index.length);

		var newColor = "";
		var icon = "";

		if($(this).val() == 'benevole')
		{
			newColor = "green";
			icon = "user";
		}
		else if($(this).val() == 'financier')
		{
			newColor = "red";
			icon = "euro";
		}
		else if($(this).val() == 'materiel')
		{
			newColor = "purple";
			icon = "tag";
		}
		else if($(this).val() == 'communication')
		{
			newColor = "grey";
			icon = "tag";
		}
		$('#box-'+index).children('div.header-besoin-box').children('span').attr('class', "glyphicon glyphicon-"+icon);
		$('#box-'+index).attr('class', "besoin-box "+newColor);


    });

	/**** BOXS HISTOIRE ****/

	var $containerBox = $('div#cf_mainbundle_projet_boxs');

	var $lienAjoutBox = $('<a href="#" id="ajout_box" class="btn btn-success"><i class="fa fa-plus"></i></a>');

	$lienAjoutBox.click(function(e) {
		ajouterBox($containerBox);
		e.preventDefault();
		return false;
	});

	var indexBox = $containerBox.find(':input').length;

	$containerBox.children('div').each(function() {
		ajouterLienSuppressionBox($(this));
	});

	function ajouterBox($containerBox) {
		var $prototype = $($containerBox.attr('data-prototype').replace(/__name__label__/g, 'Boîte').replace(/__name__/g, indexBox));

		ajouterLienSuppressionBox($prototype);
		$containerBox.append($prototype);


		indexBox++;
	}

	function ajouterLienSuppressionBox($prototype) {
		$lienSuppression = $('<a href="#" class="delete-button"><span class="glyphicon glyphicon-remove"></span></a>');
		$prototype.append($lienSuppression);

		$lienSuppression.click(function(e) {
			$prototype.remove();
			e.preventDefault();
			return false;
		});
	}

	$('#button-validation-modal').on('click', function(e){
		e.preventDefault();

		if($('#box-title-form').val() != "")
		{
			if((CKEDITOR.instances['editor'].getData() != "") || ($('#form-video input').val() != "") || ($('#cf_mainbundle_projet_boxs_'+(indexBox-1)+'_urlImage_file').val() != ""))
			{
				$('#cf_mainbundle_projet_boxs_'+(indexBox-1)+'_titre').val($('#box-title-form').val());

				$icone = '<i class="fa fa-pencil"></i>';
				$type = 'text';

				if(CKEDITOR.instances['editor'].getData() != "")
				{
					$('#cf_mainbundle_projet_boxs_'+(indexBox-1)+'_contenu').html(CKEDITOR.instances['editor'].getData());
				}
				else if($('#form-video input').val() != "")
				{
					$('#cf_mainbundle_projet_boxs_'+(indexBox-1)+'_urlVideo').val($('#form-video input').val());
					$icone = '<i class="fa fa-video-camera"></i>';
					$type = 'video';
				}
				else if($('#cf_mainbundle_projet_boxs_'+(indexBox-1)+'_urlImage_file').val() != "")
				{
					$icone = '<i class="fa fa-picture-o"></i>';
					$type = 'picture';
				}
				
				$widthBox = '';
				if($('#radio-width-box input[name=box-width]:checked').val() == 0)
				{
					$('#cf_mainbundle_projet_boxs_'+(indexBox-1)+'_fullWidth input[name="cf_mainbundle_projet[boxs]['+(indexBox-1)+'][fullWidth]"][value="0"]').prop('checked', true);
				}
				else
				{
					$('#cf_mainbundle_projet_boxs_'+(indexBox-1)+'_fullWidth input[name="cf_mainbundle_projet[boxs]['+(indexBox-1)+'][fullWidth]"][value="1"]').prop('checked', true);
					$widthBox = ' large';
				}

				console.log($('#radio-width-box input[name=box-width]:checked').val());

				$('#modalForm').modal('hide');

				$('.blocs').append('<div class="bloc-'+(indexBox-1)+$widthBox+'"><div class="bloc-head">'+$icone+'</div><div class="bloc-body"><h1 class="bloc-title">'+$('#box-title-form').val()+'</h1><a href="#" class="config-bloc" id-bloc="'+(indexBox-1)+'" type-bloc="'+$type+'" data-toggle="modal" data-target="#modalEditForm">Config</a> <a href="#" class="delete-bloc" id-bloc="'+(indexBox-1)+'">Delete</a></div></div>');
				
			}
			else
			{
				console.log('ERREUR : REMPLIR LES CHAMPS');
			}
		}
		else
		{
			console.log('ERREUR : REMPLIR LES CHAMPS');
		}
	});

	$('#add-box').on('click', function(e){
		ajouterBox($containerBox);
		$('#box-title-form').val('');
		CKEDITOR.instances['editor'].setData('');
		$('#form-video input').val('');
	});

	$('#file-form-image').on('click', function(e) {
		e.preventDefault();
	    $('#cf_mainbundle_projet_boxs_'+(indexBox-1)+'_urlImage_file').trigger('click');
	});

	$('.blocs').on("click", ".config-bloc", function(e) {
		$idBlock = $(this).attr('id-bloc');
		$typeBlock = $(this).attr('type-bloc');
		$('#modalEditForm .modal-body').html('');
		$('#box-title-formEdit').val($('#cf_mainbundle_projet_boxs_'+$idBlock+'_titre').val());
		if($typeBlock == 'text')
		{
			$('#modalEditForm .modal-body').append('<textarea id="editorEdit" name="editor"></textarea>');
    		CKEDITOR.replace( 'editorEdit' );
			CKEDITOR.instances['editorEdit'].setData($('#cf_mainbundle_projet_boxs_'+$idBlock+'_contenu').val());
		}
		else if($typeBlock == 'video')
		{
			$('#modalEditForm .modal-body').append('<input type="text" id="video-edit-form" placeholder="Entrez l\'url de la vidéo (ex : http://youtube.com/azeaze123aze)">');
			$('#video-edit-form').val($('#cf_mainbundle_projet_boxs_'+$idBlock+'_urlVideo').val());
		}
		else if($typeBlock == 'picture')
		{
			$('#modalEditForm .modal-body').append('<a href="#" id="file-formEdit-image">Choisir une image pour le bloc</a>');
		}
	});

	$('#modalEditForm').on("click", "#file-formEdit-image", function(e) {
		e.preventDefault();
	    $('#cf_mainbundle_projet_boxs_'+$idBlock+'_urlImage_file').trigger('click');
	});

	$('#button-validation-modalEdit').on('click', function(e){
		e.preventDefault();

		if($('#box-title-form').val() != "")
		{
			if((CKEDITOR.instances['editor'].getData() != "") || ($('#form-video input').val() != "") || ($('#cf_mainbundle_projet_boxs_'+(indexBox-1)+'_urlImage_file').val() != ""))
			{
				if($typeBlock == 'text')
				{
					$('#cf_mainbundle_projet_boxs_'+$idBlock+'_contenu').html(CKEDITOR.instances['editorEdit'].getData());
				}
				else if($typeBlock == 'video')
				{
					$('#cf_mainbundle_projet_boxs_'+$idBlock+'_urlVideo').val($('#form-video input').val());
				}

				if($('#radio-width-box-edit input[name=box-width-edit]:checked').val() == 0)
				{
					if($('.bloc-'+$idBlock).hasClass('large'))
					{
						$('.bloc-'+$idBlock).removeClass('large');
					}
				}
				else
				{
					if(!$('.bloc-'+$idBlock).hasClass('large'))
					{
						$('.bloc-'+$idBlock).addClass('large');
					}
				}

				$('#modalFormEdit').modal('hide');
			}
			else
			{
				console.log('ERREUR : REMPLIR LES CHAMPS');
			}
		}
		else
		{
			console.log('ERREUR : REMPLIR LES CHAMPS');
		}
	});

	$('.blocs').on("click", ".delete-bloc", function(e) {
		$('#cf_mainbundle_projet_boxs_'+$(this).attr('id-bloc')).parent().children('a').trigger('click');
		$('.bloc-'+$(this).attr('id-bloc')).remove();
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