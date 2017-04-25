<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chantier
 *
 * @ORM\Table(name="chantier", indexes={@ORM\Index(name="FK_chantier_idEntrepreneur", columns={"idEntrepreneur"})})
 * @ORM\Entity(repositoryClass="BatiBundle\Entity\ChantierRepository")
 */
class Chantier
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
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

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
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=50, nullable=false)
     */
    private $lieu;

    /**
     * @var \Entrepreneur
     *
     * @ORM\ManyToOne(targetEntity="Entrepreneur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEntrepreneur", referencedColumnName="id")
     * })
     */
    private $identrepreneur;



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
     * Set libelle
     *
     * @param string $libelle
     * @return Chantier
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Chantier
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
     * @return Chantier
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
     * Set lieu
     *
     * @param string $lieu
     * @return Chantier
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set identrepreneur
     *
     * @param \BatiBundle\Entity\Entrepreneur $identrepreneur
     * @return Chantier
     */
    public function setIdentrepreneur(\BatiBundle\Entity\Entrepreneur $identrepreneur = null)
    {
        $this->identrepreneur = $identrepreneur;

        return $this;
    }

    /**
     * Get identrepreneur
     *
     * @return \BatiBundle\Entity\Entrepreneur 
     */
    public function getIdentrepreneur()
    {
        return $this->identrepreneur;
    }
}
