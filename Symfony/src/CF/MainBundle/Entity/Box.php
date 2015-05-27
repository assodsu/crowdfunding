<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Box
 *
 * @ORM\Table(name="cf_main_boxs")
 * @ORM\Entity(repositoryClass="CF\MainBundle\Entity\BoxRepository")
 */
class Box
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fullWidth", type="boolean")
     */
    private $fullWidth;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;

    /**
    * @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Projet", inversedBy="boxs")
    * @ORM\JoinColumn(nullable=false)
    */
    private $projet;

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
     * Set titre
     *
     * @param string $titre
     * @return Box
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Box
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set projet
     *
     * @param \CF\MainBundle\Entity\Projet $projet
     * @return Box
     */
    public function setProjet(\CF\MainBundle\Entity\Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \CF\MainBundle\Entity\Projet 
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set fullWidth
     *
     * @param boolean $fullWidth
     *
     * @return Box
     */
    public function setFullWidth($fullWidth)
    {
        $this->fullWidth = $fullWidth;

        return $this;
    }

    /**
     * Get fullWidth
     *
     * @return boolean
     */
    public function getFullWidth()
    {
        return $this->fullWidth;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return Box
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer
     */
    public function getOrdre()
    {
        return $this->ordre;
    }
}
