<?php
// src/CF/UserBundle/Entity/User.php

namespace CF\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"associations" = "Association", "entreprises" = "Entreprise", "particuliers" = "Particulier"})
 */
abstract class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Media", cascade={"persist","remove"})
     *  @ORM\JoinColumn(nullable=false)
     */
    protected $logo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $adresse = null;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $ville;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    protected $cp = null;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $telephone = null;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $site = null;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $facebook = null;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $twitter = null;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $googleplus = null;

    /**
     * @ORM\Column(type="string", length=25)
     */
    protected $typeUser;

    /**
     * @ORM\OneToMany(targetEntity="CF\NotificationBundle\Entity\Notification", mappedBy="user")
     */
    private $notifications;

    /**
     * @ORM\ManyToMany(targetEntity="CF\BadgeBundle\Entity\Badge", cascade={"persist"})
     */
    private $badges;

    /**
     * @ORM\ManyToMany(targetEntity="CF\MessageBundle\Entity\Conversation", mappedBy="utilisateurs")
     */
    private $conversations;

    /**
     * @ORM\OneToMany(targetEntity="CF\MessageBundle\Entity\Message", mappedBy="user")
     */
    private $messages;

    /**
     * @ORM\ManyToMany(targetEntity="CF\MainBundle\Entity\Projet", cascade={"persist"})
     */
    private $projetsSuivis;

    /**
     * @ORM\ManyToMany(targetEntity="CF\MainBundle\Entity\Projet", cascade={"persist"})
     * @ORM\JoinTable(
     *        name="user_projets_soutenus"
     * )
     */
    private $projetsSoutenus;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function __toString() {
        return $this->email;
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
     * Set typeUser
     *
     * @param string $typeUser
     * @return Association
     */
    public function setTypeUser($typeUser)
    {
        $this->typeUser = $typeUser;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getTypeUser()
    {
        return $this->typeUser;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return User
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set logo
     *
     * @param \CF\MainBundle\Entity\Media $logo
     * @return User
     */
    public function setLogo(\CF\MainBundle\Entity\Media $logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return \CF\MainBundle\Entity\Media 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return User
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return User
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return User
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set googleplus
     *
     * @param string $googleplus
     * @return User
     */
    public function setGoogleplus($googleplus)
    {
        $this->googleplus = $googleplus;

        return $this;
    }

    /**
     * Get googleplus
     *
     * @return string 
     */
    public function getGoogleplus()
    {
        return $this->googleplus;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * Add notification
     *
     * @param \CF\NotificationBundle\Entity\Notification $notification
     *
     * @return User
     */
    public function addNotification(\CF\NotificationBundle\Entity\Notification $notification)
    {
        $this->notifications[] = $notification;

        return $this;
    }

    /**
     * Remove notification
     *
     * @param \CF\NotificationBundle\Entity\Notification $notification
     */
    public function removeNotification(\CF\NotificationBundle\Entity\Notification $notification)
    {
        $this->notifications->removeElement($notification);
    }

    /**
     * Get notifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Add badge
     *
     * @param \CF\BadgeBundle\Entity\Badge $badge
     *
     * @return User
     */
    public function addBadge(\CF\BadgeBundle\Entity\Badge $badge)
    {
        $this->badges[] = $badge;

        return $this;
    }

    /**
     * Add message
     *
     * @param \CF\MessageBundle\Entity\Message $message
     *
     * @return User
     */
    public function addMessage(\CF\MessageBundle\Entity\Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove badge
     *
     * @param \CF\BadgeBundle\Entity\Badge $badge
     */
    public function removeBadge(\CF\BadgeBundle\Entity\Badge $badge)
    {
        $this->badges->removeElement($badge);
    }

    /**
     * Get badges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * Remove message
     *
     * @param \CF\MessageBundle\Entity\Message $message
     */
    public function removeMessage(\CF\MessageBundle\Entity\Message $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add projetsSuivi
     *
     * @param \CF\MainBundle\Entity\Projet $projetsSuivi
     *
     * @return User
     */
    public function addProjetsSuivi(\CF\MainBundle\Entity\Projet $projetsSuivi)
    {
        $this->projetsSuivis[] = $projetsSuivi;
        return $this;
    }

    /**
     * Add conversation
     *
     * @param \CF\MessageBundle\Entity\Conversation $conversation
     *
     * @return User
     */
    public function addConversation(\CF\MessageBundle\Entity\Conversation $conversation)
    {
        $this->conversations[] = $conversation;

        return $this;
    }

    /**
     * Remove projetsSuivi
     *
     * @param \CF\MainBundle\Entity\Projet $projetsSuivi
     */
    public function removeProjetsSuivi(\CF\MainBundle\Entity\Projet $projetsSuivi)
    {
        $this->projetsSuivis->removeElement($projetsSuivi);
    }

    /**
     * Get projetsSuivis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjetsSuivis()
    {
        return $this->projetsSuivis;
    }

    public function hasProjetsSuivis($projet) {
        $bool = false;
        foreach($this->getProjetsSuivis() as $p) {
            if ($p === $projet) {
                $bool = true;
            }
        }

        return $bool;
    }

    /**
     * Add projetsSoutenus
     *
     * @param \CF\MainBundle\Entity\Projet $projetsSoutenus
     *
     * @return User
     */
    public function addProjetsSoutenus(\CF\MainBundle\Entity\Projet $projetsSoutenus)
    {
        $this->projetsSoutenus[] = $projetsSoutenus;

        return $this;
    }

    /**
     * Remove projetsSoutenus
     *
     * @param \CF\MainBundle\Entity\Projet $projetsSoutenus
     */
    public function removeProjetsSoutenus(\CF\MainBundle\Entity\Projet $projetsSoutenus)
    {
        $this->projetsSoutenus->removeElement($projetsSoutenus);
    }

    /**
     * Get projetsSoutenus
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjetsSoutenus()
    {
        return $this->projetsSoutenus;
    }

    public function hasProjetsSoutenus($projet) {
        $bool = false;
        foreach($this->getProjetsSuivis() as $p) {
            if ($p === $projet) {
                $bool = true;
            }
        }

        return $bool;
    }
    /**
     * Remove conversation
     *
     * @param \CF\MessageBundle\Entity\Conversation $conversation
     */
    public function removeConversation(\CF\MessageBundle\Entity\Conversation $conversation)
    {
        $this->conversations->removeElement($conversation);
    }

    /**
     * Get conversations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConversations()
    {
        return $this->conversations;
    }
}
