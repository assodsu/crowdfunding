//script de controle du formulaire d'inscription d'un particulier
$(document).ready(function(){
	//on désactive tous les boutons
	$('#step0Next').attr("disabled",true);
	$('#step1Next').attr("disabled",true);
	$('#step2Next').attr("disabled",true);
	
	$('#fos_user_registration_form_plainPassword_second').keyup(function(){

		if ((($('#fos_user_registration_form_pseudo').length)!=0) && ($('#fos_user_registration_form_email').length!=0) && ($('#fos_user_registration_form_plainPassword_first').length!=0) ) {
			$('#step0Next').attr("disabled",false);
		}
		else { 
			$('#step0Next').attr("disabled",true);
		}

	});



	$('#fos_user_registration_form_telephone').keyup(function(){

		if ( (($('#fos_user_registration_form_nom').length)!=0) && ($('#fos_user_registration_form_prenom').length!=0) ) {
			$('#step1Next').attr("disabled",false);
		}
		else { 
			$('#step2Next').attr("disabled",true);
		}

	});

	$('#fos_user_registration_form_ville').keyup(function(){

		if ( (($('#fos_user_registration_form_ville').length)!=0)) {
			$('#step2Next').attr("disabled",false);
		}
		else { 
			$('#step2Next').attr("disabled",true);
		}

	});

});