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
    * @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Projet")
    * @ORM\JoinColumn(name="idProjet",referencedColumnName="id")
    */
    private $idProjet;

    /**
    * @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Ressources")
    * @ORM\JoinColumn(name="idRessource",referencedColumnName="id")
    */
    private $idRessource;


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
     * Set idProjet
     *
     * @param \CF\MainBundle\Entity\Projet $idProjet
     * @return Besoins
     */
    public function setIdProjet(\CF\MainBundle\Entity\Projet $idProjet)
    {
        $this->idProjet = $idProjet;

        return $this;
    }

    /**
     * Get idProjet
     *
     * @return \CF\MainBundle\Entity\Projet 
     */
    public function getIdProjet()
    {
        return $this->idProjet;
    }

    /**
     * Set idRessource
     *
     * @param \CF\MainBundle\Entity\Ressources $idRessource
     * @return Besoins
     */
    public function setIdRessource(\CF\MainBundle\Entity\Ressources $idRessource)
    {
        $this->idRessource = $idRessource;

        return $this;
    }

    /**
     * Get idRessource
     *
     * @return \CF\MainBundle\Entity\Ressources 
     */
    public function getIdRessource()
    {
        return $this->idRessource;
    }
}
