<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ressources
 *
 * @ORM\Table(name="ressources")
 * @ORM\Entity
 */
class Ressources
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
    *@ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Ressources")
    *@ORM\JoinColumn(name="idPere",referencedColumnName="id")
    */
    private $idPere;


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
     * Set nom
     *
     * @param string $nom
     * @return Ressources
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set idPere
     *
     * @param \CF\MainBundle\Entity\Ressources $idPere
     * @return Ressources
     */
    public function setIdPere(\CF\MainBundle\Entity\Ressources $idPere = null)
    {
        $this->idPere = $idPere;

        return $this;
    }

    /**
     * Get idPere
     *
     * @return \CF\MainBundle\Entity\Ressources 
     */
    public function getIdPere()
    {
        return $this->idPere;
    }
}
