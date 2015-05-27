<?php

namespace CF\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="cf_comment_comments")
 * @ORM\Entity
 */
class Comment
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="moderate", type="boolean")
     */
    private $moderate;

    /**
     * @var integer
     *
     * @ORM\Column(name="report", type="integer")
     */
    private $report;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\CommentBundle\Entity\Thread", inversedBy="comments")
     *  @ORM\JoinColumn(nullable=false)
     */
    protected $thread;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\UserBundle\Entity\User")
     *  @ORM\JoinColumn(nullable=false)
     */
    protected $user;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\CommentBundle\Entity\Comment", inversedBy="childrens")
     */
    protected $parent;

    /**
     *  @ORM\OneToMany(targetEntity="CF\CommentBundle\Entity\Comment", mappedBy="parent")
     */
    protected $childrens;

    public function __construct()
    {
        $this->setModerate(false);
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
     * @return Comment
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
     * Set moderate
     *
     * @param boolean $moderate
     *
     * @return Comment
     */
    public function setModerate($moderate)
    {
        $this->moderate = $moderate;

        return $this;
    }

    /**
     * Get moderate
     *
     * @return boolean
     */
    public function getModerate()
    {
        return $this->moderate;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
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
     * Set thread
     *
     * @param \CF\CommentBundle\Entity\Thread $thread
     *
     * @return Comment
     */
    public function setThread(\CF\CommentBundle\Entity\Thread $thread)
    {
        $this->thread = $thread;

        return $this;
    }

    /**
     * Get thread
     *
     * @return \CF\CommentBundle\Entity\Thread
     */
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * Set user
     *
     * @param \CF\UserBundle\Entity\User $user
     *
     * @return Comment
     */
    public function setUser(\CF\UserBundle\Entity\User $user)
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

    /**
     * Set parent
     *
     * @param \CF\CommentBundle\Entity\Comment $parent
     *
     * @return Comment
     */
    public function setParent(\CF\CommentBundle\Entity\Comment $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \CF\CommentBundle\Entity\Comment
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param \CF\CommentBundle\Entity\Comment $children
     *
     * @return Comment
     */
    public function addChildren(\CF\CommentBundle\Entity\Comment $children)
    {
        $this->childrens[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \CF\CommentBundle\Entity\Comment $children
     */
    public function removeChildren(\CF\CommentBundle\Entity\Comment $children)
    {
        $this->childrens->removeElement($children);
    }

    /**
     * Get childrens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildrens()
    {
        return $this->childrens;
    }

    /**
     * Set report
     *
     * @param integer $report
     *
     * @return Comment
     */
    public function setReport($report)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Get report
     *
     * @return integer
     */
    public function getReport()
    {
        return $this->report;
    }
}
