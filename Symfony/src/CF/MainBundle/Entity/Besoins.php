<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Besoins
 *
 * @ORM\Table(name="besoins")
 * @ORM\Entity
 */
class Besoins
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
     * @ORM\Column(name="quantiteDemande", type="integer")
     */
    private $quantiteDemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantiteActuelle", type="integer")
     */
    private $quantiteActuelle;

    /**
     * @var string
     *
     * @ORM\Column(name="pourcentage", type="decimal")
     */
    private $pourcentage;

    /**
    * @var string
    * 
    * @ORM\Column(name="ressource", type="string", length=150)
    */
    private $ressource;

    /**
    * @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Projet", inversedBy="besoins")
    * @ORM\JoinColumn(nullable=false)
    */
    private $projet;


    public function __construct()
    {
        $this->setQuantiteActuelle(0);
        $this->setPourcentage("0");
    }


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
     * Set quantiteDemande
     *
     * @param integer $quantiteDemande
     * @return Besoins
     */
    public function setQuantiteDemande($quantiteDemande)
    {
        $this->quantiteDemande = $quantiteDemande;

        return $this;
    }

    /**
     * Get quantiteDemande
     *
     * @return integer 
     */
    public function getQuantiteDemande()
    {
        return $this->quantiteDemande;
    }

    /**
     * Set quantiteActuelle
     *
     * @param integer $quantiteActuelle
     * @return Besoins
     */
    public function setQuantiteActuelle($quantiteActuelle)
    {
        $this->quantiteActuelle = $quantiteActuelle;

        return $this;
    }

    /**
     * Get quantiteActuelle
     *
     * @return integer 
     */
    public function getQuantiteActuelle()
    {
        return $this->quantiteActuelle;
    }

    /**
     * Set pourcentage
     *
     * @param string $pourcentage
     * @return Besoins
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    /**
     * Get pourcentage
     *
     * @return string 
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * Set projet
     *
     * @param \CF\MainBundle\Entity\Projet $projet
     * @return Besoins
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
     * Set ressource
     *
     * @param string $ressource
     * @return Besoins
     */
    public function setRessource($ressource)
    {
        $this->ressource = $ressource;

        return $this;
    }

    /**
     * Get ressource
     *
     * @return string 
     */
    public function getRessource()
    {
        return $this->ressource;
    }
}
