<?php
// src/CF/MainBundle/Entity/ConnexionForm.php

namespace CF\MainBundle\Entity; 

class ConnexionForm{

	/*attributs de la classe*/
	private $identifiant;	//identifiant de l'utilisateur
	private $password;		//password de l'utilisateur
	private $save=false;	//booléen représentant le fait de se souvenir des identifiants

	/*constructeur*/	
	public function _construct(){
		//vide
	}

	/*getteurs et setters*/
	public function setIdentifiant($id)	{	$this->identifiant=$id; }

	public function getIdentifiant()	{	return $this->identifiant; }

	public function setPassword($pass)	{ 	$this->password=$pass; }

	public function getPassword()		{	return $this->password; }

	public function setSave($s)			{	$this->save=$s; }

	public function getSave()			{	return $this->save; }

}//end classe