<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Projet
 *
 * @ORM\Table(name="cf_main_projets")
 * @ORM\Entity(repositoryClass="CF\MainBundle\Entity\ProjetRepository")
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
     * @var integer
     *
     * @ORM\Column(name="nbRessources", type="integer")
     */
    private $nbRessources;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbActuMateriel", type="integer")
     */
    private $nbActuMateriel;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbActuHumain", type="integer")
     */
    private $nbActuHumain;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbActuComm", type="integer")
     */
    private $nbActuComm;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbActuFinancier", type="integer")
     */
    private $nbActuFinancier;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbDemandeMateriel", type="integer")
     */
    private $nbDemandeMateriel;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbDemandeHumain", type="integer")
     */
    private $nbDemandeHumain;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbDemandeComm", type="integer")
     */
    private $nbDemandeComm;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbDemandeFinancier", type="integer")
     */
    private $nbDemandeFinancier;

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
     * @var integer
     *
     * @ORM\Column(name="nbDonateur", type="integer")
     */
    private $nbDonateur;

    /**
     *  @ORM\ManyToOne(targetEntity="CF\UserBundle\Entity\Association")
     *  @ORM\JoinColumn(name="association", referencedColumnName="id")
     *  @ORM\JoinColumn(nullable=false)
     */
    protected $association;

    /**
    * @ORM\OneToMany(targetEntity="CF\MainBundle\Entity\Besoins", cascade={"persist"}, mappedBy="projet")
    */
    private $besoins;

    /**
    * @ORM\ManyToMany(targetEntity="CF\MainBundle\Entity\Tags", cascade={"persist"})
    * @ORM\JoinTable(name="cf_projet_tags")
    */
    private $tags;

    /**
    * @ORM\OneToMany(targetEntity="CF\MainBundle\Entity\Box", cascade={"persist"}, mappedBy="projet")
    */
    private $boxs;

    /**
     * @Gedmo\Slug(fields={"nom"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @var valider
     *
     * @ORM\Column(name="valider", type="boolean")
     */
    protected $valider;

    /**
    * @ORM\OneToMany(targetEntity="CF\MainBundle\Entity\Actualite", cascade={"persist"}, mappedBy="projet")
    */
    private $actualites;


    public function __construct()
    {
        $this->setValider(false);

        $this->setNbDonateur(0);

        $this->setDateCreation(new \DateTime());
        $date = new \DateTime();
        $this->setDateFin($date->add(new \DateInterval('P4M')));

        $this->setNbActuMateriel(0);
        $this->setNbActuFinancier(0);
        $this->setNbActuHumain(0);
        $this->setNbActuComm(0);

        $this->setNbDemandeMateriel(0);
        $this->setNbDemandeFinancier(0);
        $this->setNbDemandeHumain(0);
        $this->setNbDemandeComm(0);

        $this->besoins = new \Doctrine\Common\Collections\ArrayCollection();
        $this->boxs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->nom;
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
     * Set nbDonateur
     *
     * @param string $nbDonateur
     * @return Projet
     */
    public function setNbDonateur($nbDonateur)
    {
        $this->nbDonateur = $nbDonateur;

        return $this;
    }

    /**
     * Get nbDonateur
     *
     * @return string 
     */
    public function getNbDonateur()
    {
        return $this->nbDonateur;
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

    /**
     * Set nbRessources
     *
     * @param integer $nbRessources
     *
     * @return Projet
     */
    public function setNbRessources($nbRessources)
    {
        $this->nbRessources = $nbRessources;

        return $this;
    }

    /**
     * Get nbRessources
     *
     * @return integer
     */
    public function getNbRessources()
    {
        return $this->nbRessources;
    }

    /**
     * Set nbActuMateriel
     *
     * @param integer $nbActuMateriel
     *
     * @return Projet
     */
    public function setNbActuMateriel($nbActuMateriel)
    {
        $this->nbActuMateriel = $nbActuMateriel;

        return $this;
    }

    /**
     * Get nbActuMateriel
     *
     * @return integer
     */
    public function getNbActuMateriel()
    {
        return $this->nbActuMateriel;
    }

    /**
     * Set nbActuHumain
     *
     * @param integer $nbActuHumain
     *
     * @return Projet
     */
    public function setNbActuHumain($nbActuHumain)
    {
        $this->nbActuHumain = $nbActuHumain;

        return $this;
    }

    /**
     * Get nbActuHumain
     *
     * @return integer
     */
    public function getNbActuHumain()
    {
        return $this->nbActuHumain;
    }

    /**
     * Set nbActuComm
     *
     * @param integer $nbActuComm
     *
     * @return Projet
     */
    public function setNbActuComm($nbActuComm)
    {
        $this->nbActuComm = $nbActuComm;

        return $this;
    }

    /**
     * Get nbActuComm
     *
     * @return integer
     */
    public function getNbActuComm()
    {
        return $this->nbActuComm;
    }

    /**
     * Set nbActuFinancier
     *
     * @param integer $nbActuFinancier
     *
     * @return Projet
     */
    public function setNbActuFinancier($nbActuFinancier)
    {
        $this->nbActuFinancier = $nbActuFinancier;

        return $this;
    }

    /**
     * Get nbActuFinancier
     *
     * @return integer
     */
    public function getNbActuFinancier()
    {
        return $this->nbActuFinancier;
    }

    /**
     * Set nbDemandeMateriel
     *
     * @param integer $nbDemandeMateriel
     *
     * @return Projet
     */
    public function setNbDemandeMateriel($nbDemandeMateriel)
    {
        $this->nbDemandeMateriel = $nbDemandeMateriel;

        return $this;
    }

    /**
     * Get nbDemandeMateriel
     *
     * @return integer
     */
    public function getNbDemandeMateriel()
    {
        return $this->nbDemandeMateriel;
    }

    /**
     * Set nbDemandeHumain
     *
     * @param integer $nbDemandeHumain
     *
     * @return Projet
     */
    public function setNbDemandeHumain($nbDemandeHumain)
    {
        $this->nbDemandeHumain = $nbDemandeHumain;

        return $this;
    }

    /**
     * Get nbDemandeHumain
     *
     * @return integer
     */
    public function getNbDemandeHumain()
    {
        return $this->nbDemandeHumain;
    }

    /**
     * Set nbDemandeComm
     *
     * @param integer $nbDemandeComm
     *
     * @return Projet
     */
    public function setNbDemandeComm($nbDemandeComm)
    {
        $this->nbDemandeComm = $nbDemandeComm;

        return $this;
    }

    /**
     * Get nbDemandeComm
     *
     * @return integer
     */
    public function getNbDemandeComm()
    {
        return $this->nbDemandeComm;
    }

    /**
     * Set nbDemandeFinancier
     *
     * @param integer $nbDemandeFinancier
     *
     * @return Projet
     */
    public function setNbDemandeFinancier($nbDemandeFinancier)
    {
        $this->nbDemandeFinancier = $nbDemandeFinancier;

        return $this;
    }

    /**
     * Get nbDemandeFinancier
     *
     * @return integer
     */
    public function getNbDemandeFinancier()
    {
        return $this->nbDemandeFinancier;
    }

    /**
     * Set association
     *
     * @param \CF\UserBundle\Entity\Association $association
     *
     * @return Projet
     */
    public function setAssociation(\CF\UserBundle\Entity\Association $association = null)
    {
        $this->association = $association;

        return $this;
    }

    /**
     * Get association
     *
     * @return \CF\UserBundle\Entity\Association
     */
    public function getAssociation()
    {
        return $this->association;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Projet
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set valider
     *
     * @param boolean $valider
     *
     * @return Projet
     */
    public function setValider($valider)
    {
        $this->valider = $valider;

        return $this;
    }

    /**
     * Get valider
     *
     * @return boolean
     */
    public function getValider()
    {
        return $this->valider;
    }

    /**
     * Add actualite
     *
     * @param \CF\MainBundle\Entity\Actualite $actualite
     *
     * @return Projet
     */
    public function addActualite(\CF\MainBundle\Entity\Actualite $actualite)
    {
        $this->actualites[] = $actualite;

        return $this;
    }

    /**
     * Remove actualite
     *
     * @param \CF\MainBundle\Entity\Actualite $actualite
     */
    public function removeActualite(\CF\MainBundle\Entity\Actualite $actualite)
    {
        $this->actualites->removeElement($actualite);
    }

    /**
     * Get actualites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActualites()
    {
        return $this->actualites;
    }
}
