<?php

namespace CF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Selecteur
 *
 * @ORM\Table(name="cf_main_selecteurs")
 * @ORM\Entity(repositoryClass="CF\MainBundle\Entity\SelecteurRepository")
 */
class Selecteur
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
     * @ORM\Column(name="texte", type="string", length=50)
     */
    private $texte;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255)
     */
    private $couleur;

    /**
     * @var integer
     *
     * @ORM\Column(name="colonne", type="integer")
     */
    private $colonne;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    public function __construct() {
        $this->couleur = 'black';
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
     * Set texte
     *
     * @param string $texte
     *
     * @return Selecteur
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Selecteur
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set colonne
     *
     * @param integer $colonne
     *
     * @return Selecteur
     */
    public function setColonne($colonne)
    {
        $this->colonne = $colonne;

        return $this;
    }

    /**
     * Get colonne
     *
     * @return integer
     */
    public function getColonne()
    {
        return $this->colonne;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return Selecteur
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Selecteur
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
