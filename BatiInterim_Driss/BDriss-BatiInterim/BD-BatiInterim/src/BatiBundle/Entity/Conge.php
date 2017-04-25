<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conge
 *
 * @ORM\Table(name="conge", indexes={@ORM\Index(name="FK_conge_artisan", columns={"idArtisan"})})
 * @ORM\Entity(repositoryClass="BatiBundle\Entity\CongeRepository")
 */
class Conge
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
     * @ORM\Column(name="etatConge", type="string", length=1, nullable=false)
     */
    private $etatconge;

    /**
     * @var \Artisan
     *
     * @ORM\ManyToOne(targetEntity="Artisan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idArtisan", referencedColumnName="id")
     * })
     */
    private $idartisan;



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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Conge
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
     * @return Conge
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
     * Set etatconge
     *
     * @param string $etatconge
     * @return Conge
     */
    public function setEtatconge($etatconge)
    {
        $this->etatconge = $etatconge;

        return $this;
    }

    /**
     * Get etatconge
     *
     * @return string 
     */
    public function getEtatconge()
    {
        return $this->etatconge;
    }

    /**
     * Set idartisan
     *
     * @param \BatiBundle\Entity\Artisan $idartisan
     * @return Conge
     */
    public function setIdartisan(\BatiBundle\Entity\Artisan $idartisan = null)
    {
        $this->idartisan = $idartisan;

        return $this;
    }

    /**
     * Get idartisan
     *
     * @return \BatiBundle\Entity\Artisan 
     */
    public function getIdartisan()
    {
        return $this->idartisan;
    }
}
