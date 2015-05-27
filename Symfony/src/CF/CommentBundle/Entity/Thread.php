<?php

namespace CF\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thread
 *
 * @ORM\Table(name="cf_comment_threads")
 * @ORM\Entity
 */
class Thread
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
     * @ORM\Column(name="nbComment", type="integer")
     */
    private $nbComment;

    /**
     *  @ORM\OneToOne(targetEntity="CF\MainBundle\Entity\Projet")
     *  @ORM\JoinColumn(nullable=false)
     */
    protected $projet;

    /**
     *  @ORM\OneToMany(targetEntity="CF\CommentBundle\Entity\Comment", mappedBy="thread")
     */
    protected $comments;

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
     * Set nbComment
     *
     * @param integer $nbComment
     *
     * @return Thread
     */
    public function setNbComment($nbComment)
    {
        $this->nbComment = $nbComment;

        return $this;
    }

    /**
     * Get nbComment
     *
     * @return integer
     */
    public function getNbComment()
    {
        return $this->nbComment;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set projet
     *
     * @param \CF\MainBundle\Entity\Projet $projet
     *
     * @return Thread
     */
    public function setProjet(\CF\MainBundle\Entity\Projet $projet)
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
     * Add comment
     *
     * @param \CF\CommentBundle\Entity\Comment $comment
     *
     * @return Thread
     */
    public function addComment(\CF\CommentBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \CF\CommentBundle\Entity\Comment $comment
     */
    public function removeComment(\CF\CommentBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
