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
        $this->setRoles(array('ROLE_USER'));
    }


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $firstname;

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
     * Set name
     *
     * @param string $name
     * @return Particulier
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Particulier
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
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

        if($benevole == true){
            $this->setTypeUser('Bénévole');
            $this->setRoles(array('ROLE_BENEVOLE'));
        }
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
