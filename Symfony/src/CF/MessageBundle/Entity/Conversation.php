<?php

namespace CF\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversation
 *
 * @ORM\Table(name="conversations")
 * @ORM\Entity(repositoryClass="CF\MessageBundle\Entity\ConversationRepository")
 */
class Conversation
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add message
     *
     * @param \CF\MessageBundle\Entity\Message $message
     *
     * @return Conversation
     */
    public function addMessage(\CF\MessageBundle\Entity\Message $message)
    {
        $this->messages[] = $message;

        return $this;
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
     * Add utilisateur
     *
     * @param \CF\UserBundle\Entity\User $utilisateur
     *
     * @return Conversation
     */
    public function addUtilisateur(\CF\UserBundle\Entity\User $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \CF\UserBundle\Entity\User $utilisateur
     */
    public function removeUtilisateur(\CF\UserBundle\Entity\User $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}
