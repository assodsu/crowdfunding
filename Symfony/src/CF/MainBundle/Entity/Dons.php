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
    * @ORM\ManyToOne(targetEntity="CF\UserBundle\Entity\User")
    * @ORM\JoinColumn(name="fournisseur", referencedColumnName="id")
    * @ORM\JoinColumn(nullable=false)
    */
    private $fournisseur;
    
    /**
    * @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Besoins", inversedBy="dons")
    * @ORM\JoinColumn(nullable=false)
    */
    private $besoin;

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
     * Set fournisseur
     *
     * @param \CF\UserBundle\Entity\User $fournisseur
     * @return Dons
     */
    public function setFournisseur(\CF\UserBundle\Entity\User $fournisseur = null)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return \CF\UserBundle\Entity\User 
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * Set besoin
     *
     * @param \CF\MainBundle\Entity\Besoins $besoin
     * @return Dons
     */
    public function setBesoin(\CF\MainBundle\Entity\Besoins $besoin)
    {
        $this->besoin = $besoin;

        return $this;
    }

    /**
     * Get besoin
     *
     * @return \CF\MainBundle\Entity\Besoins 
     */
    public function getBesoin()
    {
        return $this->besoin;
    }
}
