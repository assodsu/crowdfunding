//script de controle des champs de formulaire de l'inscription d'une association
$(document).ready(function(){

	//descativation des boutons
	$('#step0Next').attr("disabled",true);
	$('#step1Next').attr("disabled",true);
	$('#step2Next').attr("disabled",true);
	$('#step4Next').attr("disabled",true);

	//controle à l'appui d'une touche sur le champ du second password
	$('#fos_user_registration_form_email').keyup(function(){

		if (($('#fos_user_registration_form_email').val().length!=0) && ($('#fos_user_registration_form_plainPassword_first').val().length!=0) && ($('#fos_user_registration_form_plainPassword_second').val().length!=0) ) {
			$('#step0Next').attr("disabled",false);
		}
		else { 
			$('#step0Next').attr("disabled",true);
		}

	});
	$('#fos_user_registration_form_plainPassword_first').keyup(function(){

		if (($('#fos_user_registration_form_email').val().length!=0) && ($('#fos_user_registration_form_plainPassword_first').val().length!=0) && ($('#fos_user_registration_form_plainPassword_second').val().length!=0) ) {
			$('#step0Next').attr("disabled",false);
		}
		else { 
			$('#step0Next').attr("disabled",true);
		}

	});
	$('#fos_user_registration_form_plainPassword_second').keyup(function(){

		if (($('#fos_user_registration_form_email').val().length!=0) && ($('#fos_user_registration_form_plainPassword_first').val().length!=0) && ($('#fos_user_registration_form_plainPassword_second').val().length!=0) ) {
			$('#step0Next').attr("disabled",false);
		}
		else { 
			$('#step0Next').attr("disabled",true);
		}

	});

	//controle à l'appui d'une touche dans le champ de téléphone
	/*$('#fos_user_registration_form_telephone').keyup(function(){

		if (($('#fos_user_registration_form_nomAsso').length!=0) && ($('#fos_user_registration_form_numWaldec').length!=0) ) {
			$('#step1Next').attr("disabled",false);
		}
		else { 
			$('#step1Next').attr("disabled",true);
		}

	});

	//controle de la taille du champ ville
	$('#fos_user_registration_form_ville').keyup(function(){

		if (($('#fos_user_registration_form_ville').length!=0)) {
			$('#step2Next').attr("disabled",false);
		}
		else { 
			$('#step2Next').attr("disabled",true);
		}

	});

	//
	$('#fos_user_registration_form_descriptionAsso').keyup(function(){

		if (($('#fos_user_registration_form_descriptionAsso').length!=0)) {
			$('#step4Next').attr("disabled",false);
		}
		else { 
			$('#step4Next').attr("disabled",true);
		}

	});*/


});