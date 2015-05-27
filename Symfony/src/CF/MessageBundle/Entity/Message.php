<?php

namespace CF\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="cf_message_messages")
 * @ORM\Entity
 */
class Message
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
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Conversation", inversedBy="messages")
     */
    private $conversation;

    /**
     * @ORM\ManyToOne(targetEntity="CF\UserBundle\Entity\User", inversedBy="messages")
     */
    private $user;

    public function __construct()
    {
        $this->setDate(new \DateTime());
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
     * Set content
     *
     * @param string $content
     *
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set conversation
     *
     * @param \CF\MessageBundle\Entity\Conversation $conversation
     *
     * @return Message
     */
    public function setConversation(\CF\MessageBundle\Entity\Conversation $conversation = null)
    {
        $this->conversation = $conversation;

        return $this;
    }

    /**
     * Get conversation
     *
     * @return \CF\MessageBundle\Entity\Conversation
     */
    public function getConversation()
    {
        return $this->conversation;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Message
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
     * Set user
     *
     * @param \CF\UserBundle\Entity\User $user
     *
     * @return Message
     */
    public function setUser(\CF\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CF\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
