<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Media
 * @ORM\Entity
 * @ORM\Table(name="cf_main_medias")
 * @ORM\HasLifecycleCallbacks
 */
class Media
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *  @var \DateTime
     *  @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updated_at;

    public function __toString() {
        return $this->path;
    }

    /**
     * @ORM\PostLoad()
     */
    public function postLoad()
    {
        $this->updateAt = new \DateTime();
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @Assert\File(maxSize="1M", mimeTypes = {"image/jpeg", "image/png"}, mimeTypesMessage = "Vous devez choisir un fichier valide (.jpeg, .png)")
     */
    public $file;

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads';
    }

    public function getAssetPath()
    {
        return 'uploads/'.$this->path;
    }

    /**
     *  @ORM\PrePersist()
     *  @ORM\PreUpdate()
     */
    public function preUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
        $this->oldFile = $this->getPath();
        $this->updated_at = new \DateTime();

        if (null !== $this->file)
            $this->path = sha1(uniqid(mt_rand(),true)).'.'.$this->file->guessExtension();
    }

    /**
     *  @ORM\PrePersist()
     *  @ORM\PreUpdate()
     */
    public function upload()
    {
        if (null !== $this->file) {
            $this->file->move($this->getUploadRootDir(),$this->path);
            unset($this->file);

            if($this->oldFile != null)
                unlink($this->tempFile);
        }
    }

    /**
     *  @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if(file_exists($this->tempFile))
            unlink($this->tempFile);
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

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }
}
