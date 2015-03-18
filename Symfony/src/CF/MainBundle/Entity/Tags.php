<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity
 */
class Tags
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
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
    *@ORM\ManyToMany(targetEntity="CF\MainBundle\Entity\Projet")
    */
    private $projets;

    /**
    *@ORM\ManyToMany(targetEntity="CF\UserBundle\Entity\Particulier")
    */
    private $particuliers;

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
     * @return Tags
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
     * Constructor
     */
    public function __construct()
    {
        $this->projets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->particuliers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projets
     *
     * @param \CF\MainBundle\Entity\Projets $projets
     * @return Tags
     */
    public function addProjet(\CF\MainBundle\Entity\Projets $projets)
    {
        $this->projets[] = $projets;

        return $this;
    }

    /**
     * Remove projets
     *
     * @param \CF\MainBundle\Entity\Projets $projets
     */
    public function removeProjet(\CF\MainBundle\Entity\Projets $projets)
    {
        $this->projets->removeElement($projets);
    }

    /**
     * Get projets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjets()
    {
        return $this->projets;
    }

    /**
     * Add particuliers
     *
     * @param \CF\UserBundle\Entity\Particulier $particuliers
     * @return Tags
     */
    public function addParticulier(\CF\UserBundle\Entity\Particulier $particuliers)
    {
        $this->particuliers[] = $particuliers;

        return $this;
    }

    /**
     * Remove particuliers
     *
     * @param \CF\UserBundle\Entity\Particulier $particuliers
     */
    public function removeParticulier(\CF\UserBundle\Entity\Particulier $particuliers)
    {
        $this->particuliers->removeElement($particuliers);
    }

    /**
     * Get particuliers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParticuliers()
    {
        return $this->particuliers;
    }
}
