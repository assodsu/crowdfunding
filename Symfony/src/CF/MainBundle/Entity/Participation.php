<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participations")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Participation
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
    * @ORM\ManyToOne(targetEntity="CF\UserBundle\Entity\User")
    * @ORM\JoinColumn(name="fournisseur", referencedColumnName="id")
    * @ORM\JoinColumn(nullable=false)
    */
    private $fournisseur;

    /**
    * @ORM\OneToMany(targetEntity="CF\MainBundle\Entity\Dons", cascade={"persist"}, mappedBy="participation")
    */
    private $dons;

    public function __construct()
    {
        $this->dons = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add dons
     *
     * @param \CF\MainBundle\Entity\Dons $dons
     * @return Projet
     */
    public function addDon(\CF\MainBundle\Entity\Dons $dons)
    {
        $this->dons[] = $dons;

        return $this;
    }

    /**
     * Remove dons
     *
     * @param \CF\MainBundle\Entity\Dons $dons
     */
    public function removeDon(\CF\MainBundle\Entity\Dons $dons)
    {
        $this->dons->removeElement($dons);
    }

    /**
     * Get dons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDons()
    {
        return $this->dons;
    }
}
