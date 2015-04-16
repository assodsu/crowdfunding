<?php

namespace CF\NotificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CF\NotificationBundle\Entity\NotificationRepository")
 */
class Notification
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\UserBundle\Entity\User")
     *  @ORM\JoinColumn(name="utilisateurSource", referencedColumnName="id")
     *  @ORM\JoinColumn(nullable=false)
     */
    protected $utilisateurSource;

    /**
     * @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Projet", cascade={"persist"})
     */
    private $projet;

    /**
    * @ORM\ManyToMany(targetEntity="CF\UserBundle\Entity\User", cascade={"persist"})
    * @ORM\JoinTable(name="notifications_users")
    */
    private $utilisateur;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Notification
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Notification
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
     * Constructor
     */
    public function __construct()
    {
        $this->projet = new \Doctrine\Common\Collections\ArrayCollection();
        $this->utilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set utilisateurSource
     *
     * @param \CF\UserBundle\Entity\User $utilisateurSource
     * @return Notification
     */
    public function setUtilisateurSource(\CF\UserBundle\Entity\User $utilisateurSource = null)
    {
        $this->utilisateurSource = $utilisateurSource;

        return $this;
    }

    /**
     * Get utilisateurSource
     *
     * @return \CF\UserBundle\Entity\User 
     */
    public function getUtilisateurSource()
    {
        return $this->utilisateurSource;
    }

    /**
     * Set projet
     *
     * @param \CF\MainBundle\Entity\Projet $projet
     * @return Notification
     */
    public function setProjet(\CF\MainBundle\Entity\Projet $projet = null)
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
     * Add utilisateur
     *
     * @param \CF\UserBundle\Entity\User $utilisateur
     * @return Notification
     */
    public function addUtilisateur(\CF\UserBundle\Entity\User $utilisateur)
    {
        $this->utilisateur[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \CF\UserBundle\Entity\User $utilisateur
     */
    public function removeUtilisateur(\CF\UserBundle\Entity\User $utilisateur)
    {
        $this->utilisateur->removeElement($utilisateur);
    }

    /**
     * Get utilisateur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
