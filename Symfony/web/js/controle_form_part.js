//script de controle du formulaire d'inscription d'un particulier
//CODE FONCTIONNEL
$(document).ready(function(){
	//on désactive tous les boutons
	$('#step0Next').attr("disabled",true);
	$('#step1Next').attr("disabled",true);
	$('#step2Next').attr("disabled",true);
	

	/*1ERE PARTIE DU FORMULAIRE*/
	$('#fos_user_registration_form_pseudo').keyup(function(){

		if ((($('#fos_user_registration_form_pseudo').val().length)!=0) && ($('#fos_user_registration_form_email').val().length!=0) && ($('#fos_user_registration_form_plainPassword_first').val().length!=0) && ($('#fos_user_registration_form_plainPassword_second').val().length!=0)) {
			$('#step0Next').attr("disabled",false);
		}
		else { 
			$('#step0Next').attr("disabled",true);
		}

	});


	$('#fos_user_registration_form_email').keyup(function(){

		if ((($('#fos_user_registration_form_pseudo').val().length)!=0) && ($('#fos_user_registration_form_email').val().length!=0) && ($('#fos_user_registration_form_plainPassword_first').val().length!=0) && ($('#fos_user_registration_form_plainPassword_second').val().length!=0)) {
			$('#step0Next').attr("disabled",false);
		}
		else { 
			$('#step0Next').attr("disabled",true);
		}

	});

	$('#fos_user_registration_form_plainPassword_first').keyup(function(){

		if ((($('#fos_user_registration_form_pseudo').val().length)!=0) && ($('#fos_user_registration_form_email').val().length!=0) && ($('#fos_user_registration_form_plainPassword_first').val().length!=0) && ($('#fos_user_registration_form_plainPassword_second').val().length!=0)) {
			$('#step0Next').attr("disabled",false);
		}
		else { 
			$('#step0Next').attr("disabled",true);
		}

	});


	$('#fos_user_registration_form_plainPassword_second').keyup(function(){

		if ((($('#fos_user_registration_form_pseudo').val().length)!=0) && ($('#fos_user_registration_form_email').val().length!=0) && ($('#fos_user_registration_form_plainPassword_first').val().length!=0) && ($('#fos_user_registration_form_plainPassword_second').val().length!=0)) {
			$('#step0Next').attr("disabled",false);
		}
		else { 
			$('#step0Next').attr("disabled",true);
		}

	});

	/*2EME PARTIE DU FORMULAIRE*/
	$('#fos_user_registration_form_telephone').keyup(function(){

		if ( (($('#fos_user_registration_form_nom').val().length)!=0) && ($('#fos_user_registration_form_prenom').val().length!=0) ) {
			$('#step1Next').attr("disabled",false);
		}
		else { 
			$('#step2Next').attr("disabled",true);
		}

	});

	$('#fos_user_registration_form_nom').keyup(function(){

		if ( (($('#fos_user_registration_form_nom').val().length)!=0) && ($('#fos_user_registration_form_prenom').val().length!=0) ) {
			$('#step1Next').attr("disabled",false);
		}
		else { 
			$('#step2Next').attr("disabled",true);
		}

	});

	$('#fos_user_registration_form_prenom').keyup(function(){

		if ( (($('#fos_user_registration_form_nom').val().length)!=0) && ($('#fos_user_registration_form_prenom').val().length!=0) ) {
			$('#step1Next').attr("disabled",false);
		}
		else { 
			$('#step2Next').attr("disabled",true);
		}

	});

	/*3EME PARTIE DU FORMULAIRE*/
	$('#fos_user_registration_form_ville').keyup(function(){

		if ( (($('#fos_user_registration_form_ville').val().length)!=0)) {
			$('#step2Next').attr("disabled",false);
		}
		else { 
			$('#step2Next').attr("disabled",true);
		}

	});




});