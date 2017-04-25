<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrepreneur
 *
 * @ORM\Table(name="entrepreneur", uniqueConstraints={@ORM\UniqueConstraint(name="login", columns={"login"})}, indexes={@ORM\Index(name="FK_Entrepreneur_idSecteur", columns={"idSecteur"})})
 * @ORM\Entity(repositoryClass="BatiBundle\Entity\EntrepreneurRepository")
 */
class Entrepreneur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomSociete", type="string", length=25, nullable=false)
     */
    private $nomsociete;

    /**
     * @var string
     *
     * @ORM\Column(name="nomChef", type="string", length=25, nullable=false)
     */
    private $nomchef;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomChef", type="string", length=25, nullable=false)
     */
    private $prenomchef;

    /**
     * @var string
     *
     * @ORM\Column(name="telephoneSociete", type="string", length=25, nullable=false)
     */
    private $telephonesociete;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseSociete", type="string", length=50, nullable=false)
     */
    private $adressesociete;

    /**
     * @var string
     *
     * @ORM\Column(name="cpSociete", type="string", length=5, nullable=false)
     */
    private $cpsociete;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=50, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=50, nullable=false)
     */
    private $mdp;

    /**
     * @var \Secteur
     *
     * @ORM\ManyToOne(targetEntity="Secteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSecteur", referencedColumnName="id")
     * })
     */
    private $idsecteur;



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
     * Set nomsociete
     *
     * @param string $nomsociete
     * @return Entrepreneur
     */
    public function setNomsociete($nomsociete)
    {
        $this->nomsociete = $nomsociete;

        return $this;
    }

    /**
     * Get nomsociete
     *
     * @return string 
     */
    public function getNomsociete()
    {
        return $this->nomsociete;
    }

    /**
     * Set nomchef
     *
     * @param string $nomchef
     * @return Entrepreneur
     */
    public function setNomchef($nomchef)
    {
        $this->nomchef = $nomchef;

        return $this;
    }

    /**
     * Get nomchef
     *
     * @return string 
     */
    public function getNomchef()
    {
        return $this->nomchef;
    }

    /**
     * Set prenomchef
     *
     * @param string $prenomchef
     * @return Entrepreneur
     */
    public function setPrenomchef($prenomchef)
    {
        $this->prenomchef = $prenomchef;

        return $this;
    }

    /**
     * Get prenomchef
     *
     * @return string 
     */
    public function getPrenomchef()
    {
        return $this->prenomchef;
    }

    /**
     * Set telephonesociete
     *
     * @param string $telephonesociete
     * @return Entrepreneur
     */
    public function setTelephonesociete($telephonesociete)
    {
        $this->telephonesociete = $telephonesociete;

        return $this;
    }

    /**
     * Get telephonesociete
     *
     * @return string 
     */
    public function getTelephonesociete()
    {
        return $this->telephonesociete;
    }

    /**
     * Set adressesociete
     *
     * @param string $adressesociete
     * @return Entrepreneur
     */
    public function setAdressesociete($adressesociete)
    {
        $this->adressesociete = $adressesociete;

        return $this;
    }

    /**
     * Get adressesociete
     *
     * @return string 
     */
    public function getAdressesociete()
    {
        return $this->adressesociete;
    }

    /**
     * Set cpsociete
     *
     * @param string $cpsociete
     * @return Entrepreneur
     */
    public function setCpsociete($cpsociete)
    {
        $this->cpsociete = $cpsociete;

        return $this;
    }

    /**
     * Get cpsociete
     *
     * @return string 
     */
    public function getCpsociete()
    {
        return $this->cpsociete;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Entrepreneur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Entrepreneur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return Entrepreneur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set idsecteur
     *
     * @param \BatiBundle\Entity\Secteur $idsecteur
     * @return Entrepreneur
     */
    public function setIdsecteur(\BatiBundle\Entity\Secteur $idsecteur = null)
    {
        $this->idsecteur = $idsecteur;

        return $this;
    }

    /**
     * Get idsecteur
     *
     * @return \BatiBundle\Entity\Secteur 
     */
    public function getIdsecteur()
    {
        return $this->idsecteur;
    }
}
