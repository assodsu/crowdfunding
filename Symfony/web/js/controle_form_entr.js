//script de controle des champs de formulaire de l'inscription d'une association
//CODE FONCTIONNEL
$(document).ready(function(){

	//descativation des boutons
	$('#step0Next').attr("disabled",true);
	$('#step1Next').attr("disabled",true);
	$('#step2Next').attr("disabled",true);
	
	/*1ERE PARTIE DU FORM*/
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


	/*2EME PARTIE DU FORM*/
	$('#fos_user_registration_form_numSiret').keyup(function(){

		if (($('#fos_user_registration_form_nomEntreprise').val().length!=0) && ($('#fos_user_registration_form_numSiret').val().length!=0) ) {
			$('#step1Next').attr("disabled",false);
		}
		else { 
			$('#step1Next').attr("disabled",true);
		}

	});

	$('#fos_user_registration_form_nomEntreprise').keyup(function(){

		if (($('#fos_user_registration_form_nomEntreprise').val().length!=0) && ($('#fos_user_registration_form_numSiret').val().length!=0) ) {
			$('#step1Next').attr("disabled",false);
		}
		else { 
			$('#step1Next').attr("disabled",true);
		}

	});


	/*3EME PARTIE DU FORM*/
	$('#fos_user_registration_form_ville').keyup(function(){

		if (($('#fos_user_registration_form_ville').val().length!=0)) {
			$('#step2Next').attr("disabled",false);
		}
		else { 
			$('#step2Next').attr("disabled",true);
		}

	});




});