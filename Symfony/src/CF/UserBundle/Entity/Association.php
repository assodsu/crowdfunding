<?php

namespace CF\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="associations")
 * @UniqueEntity(fields = "username", targetClass = "CF\UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "CF\UserBundle\Entity\User", message="fos_user.email.already_used")
 */
class Association extends User
{
    // construct
    public function __construct()
    {
        parent::__construct();

        $this->setTypeUser('Association');
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
    protected $nomAsso;

    /**
     * @ORM\Column(type="string", length=10)
     */
    protected $numWaldec;

    /**
     * @ORM\Column(type="date")
     */
    protected $dateCreationAsso;

    /**
     * @ORM\Column(type="text")
     */
    protected $descriptionAsso;

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
     * Set nomAsso
     *
     * @param string $nomAsso
     * @return Particulier
     */
    public function setNomAsso($nomAsso)
    {
        $this->nomAsso = $nomAsso;

        return $this;
    }

    /**
     * Get nomAsso
     *
     * @return string 
     */
    public function getNomAsso()
    {
        return $this->nomAsso;
    }

    /**
     * Set numWaldec
     *
     * @param integer $numWaldec
     * @return Association
     */
    public function setNumWaldec($numWaldec)
    {
        $this->numWaldec = $numWaldec;

        return $this;
    }

    /**
     * Get numWaldec
     *
     * @return integer 
     */
    public function getNumWaldec()
    {
        return $this->numWaldec;
    }

    /**
     * Set dateCreationAsso
     *
     * @param \DateTime $dateCreationAsso
     * @return Association
     */
    public function setDateCreationAsso($dateCreationAsso)
    {
        $this->dateCreationAsso = $dateCreationAsso;

        return $this;
    }

    /**
     * Get dateCreationAsso
     *
     * @return \DateTime 
     */
    public function getDateCreationAsso()
    {
        return $this->dateCreationAsso;
    }

    /**
     * Set descriptionAsso
     *
     * @param string $descriptionAsso
     * @return Association
     */
    public function setDescriptionAsso($descriptionAsso)
    {
        $this->descriptionAsso = $descriptionAsso;

        return $this;
    }

    /**
     * Get descriptionAsso
     *
     * @return string 
     */
    public function getDescriptionAsso()
    {
        return $this->descriptionAsso;
    }
}
