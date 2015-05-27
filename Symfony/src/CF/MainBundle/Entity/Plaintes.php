<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plaintes
 *
 * @ORM\Table(name="cf_main_plaintes")
 * @ORM\Entity
 */
class Plaintes
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
     * @ORM\Column(name="sujet", type="text")
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="ressourcesPerdues", type="text")
     */
    private $ressourcesPerdues;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Projet")
     *  @ORM\JoinColumn(name="idProjet", referencedColumnName="id")
     *  @ORM\JoinColumn(nullable=false)
     */
    private $idProjet;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\UserBundle\Entity\Particulier")
     *  @ORM\JoinColumn(name="idPart", referencedColumnName="id")
     *  @ORM\JoinColumn(nullable=false)
     */
    private $idPart;

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
     * Set sujet
     *
     * @param string $sujet
     * @return Plaintes
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set ressourcesPerdues
     *
     * @param string $ressourcesPerdues
     * @return Plaintes
     */
    public function setRessourcesPerdues($ressourcesPerdues)
    {
        $this->ressourcesPerdues = $ressourcesPerdues;

        return $this;
    }

    /**
     * Get ressourcesPerdues
     *
     * @return string 
     */
    public function getRessourcesPerdues()
    {
        return $this->ressourcesPerdues;
    }

    /**
     * Set idProjet
     *
     * @param \CF\MainBundle\Entity\Projet $idProjet
     * @return Plaintes
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
     * Set idPart
     *
     * @param \CF\UserBundle\Entity\Particulier $idPart
     * @return Plaintes
     */
    public function setIdPart(\CF\UserBundle\Entity\Particulier $idPart)
    {
        $this->idPart = $idPart;

        return $this;
    }

    /**
     * Get idPart
     *
     * @return \CF\UserBundle\Entity\Particulier 
     */
    public function getIdPart()
    {
        return $this->idPart;
    }
}
