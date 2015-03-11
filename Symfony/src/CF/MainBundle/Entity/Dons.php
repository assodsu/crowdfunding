<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dons
 *
 * @ORM\Table(name="dons")
 * @ORM\Entity
 */
class Dons
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
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var integer
     *
     * @ORM\Column(name="idFournisseur", type="integer")
     */
    private $idFournisseur;

    /**
    * @ORM\ManyToMany(targetEntity="CF\MainBundle\Entity\Ressources")
    */
    private $ressources;

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
     * Set quantite
     *
     * @param integer $quantite
     * @return Dons
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set idFournisseur
     *
     * @param integer $idFournisseur
     * @return Dons
     */
    public function setIdFournisseur($idFournisseur)
    {
        $this->idFournisseur = $idFournisseur;

        return $this;
    }

    /**
     * Get idFournisseur
     *
     * @return integer 
     */
    public function getIdFournisseur()
    {
        return $this->idFournisseur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ressources = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ressources
     *
     * @param \CF\MainBundle\Entity\Ressources $ressources
     * @return Dons
     */
    public function addRessource(\CF\MainBundle\Entity\Ressources $ressources)
    {
        $this->ressources[] = $ressources;

        return $this;
    }

    /**
     * Remove ressources
     *
     * @param \CF\MainBundle\Entity\Ressources $ressources
     */
    public function removeRessource(\CF\MainBundle\Entity\Ressources $ressources)
    {
        $this->ressources->removeElement($ressources);
    }

    /**
     * Get ressources
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRessources()
    {
        return $this->ressources;
    }
}
