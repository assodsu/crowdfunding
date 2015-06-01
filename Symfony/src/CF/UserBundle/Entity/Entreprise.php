<?php

namespace CF\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="cf_user_entreprises")
 * @UniqueEntity(fields = "username", targetClass = "CF\UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "CF\UserBundle\Entity\User", message="fos_user.email.already_used")
 */
class Entreprise extends User
{
    // construct
    public function __construct()
    {
        parent::__construct();

        $this->setTypeUser('Entreprise');
        $this->setUsername(uniqid());
        $this->setRoles(array('ROLE_ENTREPRISE'));
        $this->setCertified(false);
    }


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    protected $numSiret;

    /**
     * @ORM\Column(type="date")
     */
    protected $dateCreationEntreprise;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $certified;

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
     * Set numSiret
     *
     * @param integer $numSiret
     * @return Entreprise
     */
    public function setNumSiret($numSiret)
    {
        $this->numSiret = $numSiret;

        return $this;
    }

    /**
     * Get numSiret
     *
     * @return integer 
     */
    public function getNumSiret()
    {
        return $this->numSiret;
    }

    /**
     * Set dateCreationEntreprise
     *
     * @param \DateTime $dateCreationEntreprise
     * @return Entreprise
     */
    public function setDateCreationEntreprise($dateCreationEntreprise)
    {
        $this->dateCreationEntreprise = $dateCreationEntreprise;

        return $this;
    }

    /**
     * Get dateCreationEntreprise
     *
     * @return \DateTime 
     */
    public function getDateCreationEntreprise()
    {
        return $this->dateCreationEntreprise;
    }

    /**
     * Set certified
     *
     * @param boolean $certified
     *
     * @return Entreprise
     */
    public function setCertified($certified)
    {
        $this->certified = $certified;

        return $this;
    }

    /**
     * Get certified
     *
     * @return boolean
     */
    public function getCertified()
    {
        return $this->certified;
    }
}
