<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity
 */
class Projet
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
     * @ORM\Column(name="pourcentageTotal", type="decimal")
     */
    private $pourcentageTotal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=200)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="infoSup", type="text")
     */
    private $infoSup;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\MainBundle\Entity\Media", cascade={"persist","remove"})
     *  @ORM\JoinColumn(nullable=false)
     */
    protected $background;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\UserBundle\Entity\Association")
     *  @ORM\JoinColumn(name="idAsso", referencedColumnName="id")
     *  @ORM\JoinColumn(nullable=false)
     */
    protected $idAsso;

    /**
    * @ORM\OneToMany(targetEntity="CF\MainBundle\Entity\Besoins", cascade={"persist"}, mappedBy="projet")
    */
    private $besoins;

    /**
    * @ORM\ManyToMany(targetEntity="CF\MainBundle\Entity\Tags", cascade={"persist"})
    * @ORM\JoinTable(name="projet_tags")
    */
    private $tags;

    /**
    * @ORM\OneToMany(targetEntity="CF\MainBundle\Entity\Box", cascade={"persist"}, mappedBy="projet")
    */
    private $boxs;


    public function __construct()
    {
        $this->setDateCreation(new \DateTime());
        $date = new \DateTime();
        $this->setDateFin($date->add(new \DateInterval('P4M')));
        $this->setPourcentageTotal("0");
        $this->besoins = new \Doctrine\Common\Collections\ArrayCollection();
        $this->boxs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set pourcentageTotal
     *
     * @param string $pourcentageTotal
     * @return Projet
     */
    public function setPourcentageTotal($pourcentageTotal)
    {
        $this->pourcentageTotal = $pourcentageTotal;

        return $this;
    }

    /**
     * Get pourcentageTotal
     *
     * @return string 
     */
    public function getPourcentageTotal()
    {
        return $this->pourcentageTotal;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Projet
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Projet
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Projet
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
     * Set infoSup
     *
     * @param string $infoSup
     * @return Projet
     */
    public function setInfoSup($infoSup)
    {
        $this->infoSup = $infoSup;

        return $this;
    }

    /**
     * Get infoSup
     *
     * @return string 
     */
    public function getInfoSup()
    {
        return $this->infoSup;
    }

    /**
     * Set background
     *
     * @param \CF\MainBundle\Entity\Media $background
     * @return Projet
     */
    public function setBackground(\CF\MainBundle\Entity\Media $background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return \CF\MainBundle\Entity\Media 
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set idAsso
     *
     * @param \CF\UserBundle\Entity\Association $idAsso
     * @return Projet
     */
    public function setIdAsso(\CF\UserBundle\Entity\Association $idAsso)
    {
        $this->idAsso = $idAsso;

        return $this;
    }

    /**
     * Get idAsso
     *
     * @return \CF\UserBundle\Entity\Association 
     */
    public function getIdAsso()
    {
        return $this->idAsso;
    }

    /**
     * Add besoins
     *
     * @param \CF\MainBundle\Entity\Besoins $besoins
     * @return Projet
     */
    public function addBesoin(\CF\MainBundle\Entity\Besoins $besoins)
    {
        $this->besoins[] = $besoins;

        return $this;
    }

    /**
     * Remove besoins
     *
     * @param \CF\MainBundle\Entity\Besoins $besoins
     */
    public function removeBesoin(\CF\MainBundle\Entity\Besoins $besoins)
    {
        $this->besoins->removeElement($besoins);
    }

    /**
     * Get besoins
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBesoins()
    {
        return $this->besoins;
    }

    /**
     * Add tags
     *
     * @param \CF\MainBundle\Entity\Tags $tags
     * @return Projet
     */
    public function addTag(\CF\MainBundle\Entity\Tags $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \CF\MainBundle\Entity\Tags $tags
     */
    public function removeTag(\CF\MainBundle\Entity\Tags $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add boxs
     *
     * @param \CF\MainBundle\Entity\Box $boxs
     * @return Projet
     */
    public function addBox(\CF\MainBundle\Entity\Box $boxs)
    {
        $this->boxs[] = $boxs;

        return $this;
    }

    /**
     * Remove boxs
     *
     * @param \CF\MainBundle\Entity\Box $boxs
     */
    public function removeBox(\CF\MainBundle\Entity\Box $boxs)
    {
        $this->boxs->removeElement($boxs);
    }

    /**
     * Get boxs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBoxs()
    {
        return $this->boxs;
    }
}
