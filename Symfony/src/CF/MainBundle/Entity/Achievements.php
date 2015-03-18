<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achievements
 *
 * @ORM\Table(name="achievements")
 * @ORM\Entity
 */
class Achievements
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="icone", type="text")
     */
    private $icone;

    
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
     * @return Achievements
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
     * Set description
     *
     * @param string $description
     * @return Achievements
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set icone
     *
     * @param string $icone
     * @return Achievements
     */
    public function setIcone($icone)
    {
        $this->icone = $icone;

        return $this;
    }

    /**
     * Get icone
     *
     * @return string 
     */
    public function getIcone()
    {
        return $this->icone;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->particuliers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add particuliers
     *
     * @param \CF\UserBundle\Entity\Partculier $particuliers
     * @return Achievements
     */
    public function addParticulier(\CF\UserBundle\Entity\Partculier $particuliers)
    {
        $this->particuliers[] = $particuliers;

        return $this;
    }

    /**
     * Remove particuliers
     *
     * @param \CF\UserBundle\Entity\Partculier $particuliers
     */
    public function removeParticulier(\CF\UserBundle\Entity\Partculier $particuliers)
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
