<?php

namespace CF\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass="CF\UserBundle\Entity\AssociationRepository")
 * @ORM\Table(name="cf_user_associations")
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
        $this->setCertified(false);
        $this->dateCreationAsso = new \Datetime();
    }

    public function __toString() {
        return $this->nom;
    }

    public function jsonSerialize()
    {
        $array = array();
        foreach ($this->getTags() as $tag) {
            $array[] = array('id' => $tag->getId(),'nom' => $tag->getNom(), 'couleur' => $tag->getCouleur());
        };

        return array_merge(array(
            'id' => $this->getId(),
            'nom' => $this->getNom(),
            'slug' => $this->getSlug(),
            'logo' => $this->getLogo()->getAssetPath(),
            'certified' => $this->getCertified(),
        ), array('tags' => $array));
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank(message="Le numéro Waldec doit être renseigné")
     */
    protected $numWaldec;

    /**
     * @ORM\Column(type="date")
     */
    protected $dateCreationAsso;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $descriptionAsso;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $certified;

    /**
    * @ORM\ManyToMany(targetEntity="CF\MainBundle\Entity\Tags", cascade={"persist"})
    * @ORM\JoinTable(name="cf_user_association_tags")
    */
    private $tags;

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

    /**
     * Set certified
     *
     * @param boolean $certified
     *
     * @return Association
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

    /**
     * Add tag
     *
     * @param \CF\MainBundle\Entity\Tags $tag
     *
     * @return Association
     */
    public function addTag(\CF\MainBundle\Entity\Tags $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \CF\MainBundle\Entity\Tags $tag
     */
    public function removeTag(\CF\MainBundle\Entity\Tags $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
