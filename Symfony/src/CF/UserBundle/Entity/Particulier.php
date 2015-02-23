<?php

namespace CF\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="particuliers")
 * @UniqueEntity(fields = "username", targetClass = "CF\UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "CF\UserBundle\Entity\User", message="fos_user.email.already_used")
 */
class Particulier extends User
{
    // construct
    public function __construct()
    {
        parent::__construct();

        $this->setTypeUser('Particulier');
        $this->setUsername(uniqid());
    }


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $pseudo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=1)
     */
    protected $sexe;

    /**
     * @ORM\Column(type="date")
     */
    protected $dateNaissance;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $benevole;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Particulier
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Particulier
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Particulier
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Particulier
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Particulier
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set benevole
     *
     * @param boolean $benevole
     * @return Particulier
     */
    public function setBenevole($benevole)
    {
        $this->benevole = $benevole;

        if($benevole == true)
            $this->setTypeUser('Bénévole');
        else
            $this->setTypeUser('Particulier');

        return $this;
    }

    /**
     * Get benevole
     *
     * @return boolean 
     */
    public function getBenevole()
    {
        return $this->benevole;
    }
}
