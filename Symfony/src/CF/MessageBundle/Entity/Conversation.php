<?php

namespace CF\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversation
 *
 * @ORM\Table()
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
     * @ORM\OneToMany(targetEntity="Message", mappedBy="conversation")
     */
    private $messages;

    /**
     * @ORM\ManyToMany(targetEntity="CF\UserBundle\Entity\User", cascade={"persist"})
     */
    private $utilisateurs;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

