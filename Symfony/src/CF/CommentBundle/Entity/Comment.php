<?php

namespace CF\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Comment as BaseComment;
use FOS\CommentBundle\Model\SignedCommentInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 */
class Comment extends BaseComment implements SignedCommentInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Thread du commentaire
     *
     * @var Thread
     * @ORM\ManyToOne(targetEntity="CF\CommentBundle\Entity\Thread")
     */
    protected $thread;

     /**
     * Author of the comment
     *
     * @ORM\ManyToOne(targetEntity="CF\UserBundle\Entity\User")
     * @var User
     */
    protected $author;

    public function setAuthor(UserInterface $author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        if($this->author === null)
        {
            return null;
        }
        return $this->author;
    }

    public function getAuthorName()
    {
        if (null === $this->getAuthor()) {
            return 'Anonyme';
        }
        if( $this->getAuthor()->getTypeUser() === 'Association') {
            return $this->getAuthor()->getNomAsso();
        }
        else if( $this->getAuthor()->getTypeUser() === 'Entreprise') {
            return $this->getAuthor()->getNomEntreprise();
        }
        else if( $this->getAuthor()->getTypeUser() === 'Particulier') {
            return $this->getAuthor()->getPseudo();
        }
        else if( $this->getAuthor()->getTypeUser() === 'Bénévole') {
            return $this->getAuthor()->getPseudo();
        }
        return 'Anonyme';
    }
}