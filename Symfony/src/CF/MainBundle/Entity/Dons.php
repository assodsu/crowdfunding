<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dons
 *
 * @ORM\Table(name="cf_main_dons")
 * @ORM\Entity
 */
class Dons
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
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;
    
    /**
    * @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Besoins", inversedBy="dons")
    * @ORM\JoinColumn(nullable=false)
    */
    private $besoin;

    /**
    * @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Participation", inversedBy="dons")
    * @ORM\JoinColumn(nullable=false)
    */
    private $participation;

    /**
     * @ORM\ManyToOne(targetEntity="CF\MessageBundle\Entity\Conversation", inversedBy="dons")
     */
    private $conversation;

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
     * Set quantite
     *
     * @param integer $quantite
     * @return Dons
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set besoin
     *
     * @param \CF\MainBundle\Entity\Besoins $besoin
     * @return Dons
     */
    public function setBesoin(\CF\MainBundle\Entity\Besoins $besoin)
    {
        $this->besoin = $besoin;

        return $this;
    }

    /**
     * Get besoin
     *
     * @return \CF\MainBundle\Entity\Besoins 
     */
    public function getBesoin()
    {
        return $this->besoin;
    }

    /**
     * Set participation
     *
     * @param \CF\MainBundle\Entity\Participation $participation
     * @return Dons
     */
    public function setParticipation(\CF\MainBundle\Entity\Participation $participation)
    {
        $this->participation = $participation;

        return $this;
    }

    /**
     * Get participation
     *
     * @return \CF\MainBundle\Entity\Participation 
     */
    public function getParticipation()
    {
        return $this->participation;
    }

    /**
     * Set conversation
     *
     * @param \CF\MessageBundle\Entity\Conversation $conversation
     *
     * @return Dons
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
}
