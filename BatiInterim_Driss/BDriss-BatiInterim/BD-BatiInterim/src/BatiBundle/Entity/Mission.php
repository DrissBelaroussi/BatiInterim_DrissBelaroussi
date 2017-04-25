<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mission
 *
 * @ORM\Table(name="mission", indexes={@ORM\Index(name="FK_Mission_idCorpsMetier", columns={"idCorpsMetier"}), @ORM\Index(name="FK_Mission_idChantier", columns={"idChantier"})})
 * @ORM\Entity(repositoryClass="BatiBundle\Entity\MissionRepository")
 */
class Mission
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
     * @ORM\Column(name="intitule", type="string", length=50, nullable=false)
     */
    private $intitule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbArtisans", type="integer", nullable=false)
     */
    private $nbartisans;

    /**
     * @var float
     *
     * @ORM\Column(name="prixJournalier", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixjournalier;

    /**
     * @var \Chantier
     *
     * @ORM\ManyToOne(targetEntity="Chantier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idChantier", referencedColumnName="id")
     * })
     */
    private $idchantier;

    /**
     * @var \Corpsmetier
     *
     * @ORM\ManyToOne(targetEntity="Corpsmetier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCorpsMetier", referencedColumnName="id")
     * })
     */
    private $idcorpsmetier;



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
     * Set intitule
     *
     * @param string $intitule
     * @return Mission
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Mission
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime 
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Mission
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set nbartisans
     *
     * @param integer $nbartisans
     * @return Mission
     */
    public function setNbartisans($nbartisans)
    {
        $this->nbartisans = $nbartisans;

        return $this;
    }

    /**
     * Get nbartisans
     *
     * @return integer 
     */
    public function getNbartisans()
    {
        return $this->nbartisans;
    }

    /**
     * Set prixjournalier
     *
     * @param float $prixjournalier
     * @return Mission
     */
    public function setPrixjournalier($prixjournalier)
    {
        $this->prixjournalier = $prixjournalier;

        return $this;
    }

    /**
     * Get prixjournalier
     *
     * @return float 
     */
    public function getPrixjournalier()
    {
        return $this->prixjournalier;
    }

    /**
     * Set idchantier
     *
     * @param \BatiBundle\Entity\Chantier $idchantier
     * @return Mission
     */
    public function setIdchantier(\BatiBundle\Entity\Chantier $idchantier = null)
    {
        $this->idchantier = $idchantier;

        return $this;
    }

    /**
     * Get idchantier
     *
     * @return \BatiBundle\Entity\Chantier 
     */
    public function getIdchantier()
    {
        return $this->idchantier;
    }

    /**
     * Set idcorpsmetier
     *
     * @param \BatiBundle\Entity\Corpsmetier $idcorpsmetier
     * @return Mission
     */
    public function setIdcorpsmetier(\BatiBundle\Entity\Corpsmetier $idcorpsmetier = null)
    {
        $this->idcorpsmetier = $idcorpsmetier;

        return $this;
    }

    /**
     * Get idcorpsmetier
     *
     * @return \BatiBundle\Entity\Corpsmetier 
     */
    public function getIdcorpsmetier()
    {
        return $this->idcorpsmetier;
    }
}
