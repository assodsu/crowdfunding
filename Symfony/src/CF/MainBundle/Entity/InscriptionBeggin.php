<?php
// src/CF/MainBundle/Entity/InscriptionBeggin.php

namespace CF\MainBundle\Entity;

class InscriptionBeggin{
/*classe du formulaire de determination de type (asso,entreprise,personne)*/

	/*attributs*/
	private $type;	//type de l'utilisateur

	/*constructeur de classe*/
	public function _construct(){
		//vide
	}

	/*getteurs et setteurs*/
	public function getType()		{	return $this->type;	}

	public function setType($new)	{	$this->type=$new;	}


}//endClasse