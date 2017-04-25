<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affecter
 *
 * @ORM\Table(name="affecter", indexes={@ORM\Index(name="FK_Affecter_idArtisan", columns={"idArtisan"}), @ORM\Index(name="FK_Affecter_idMission", columns={"idMission"})})
 * @ORM\Entity(repositoryClass="BatiBundle\Entity\AffecterRepository")
 */
class Affecter
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
     * @ORM\Column(name="etatAffectation", type="string", length=1, nullable=false)
     */
    private $etataffectation;

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
     * @var \Mission
     *
     * @ORM\ManyToOne(targetEntity="Mission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMission", referencedColumnName="id")
     * })
     */
    private $idmission;



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
     * Set etataffectation
     *
     * @param string $etataffectation
     * @return Affecter
     */
    public function setEtataffectation($etataffectation)
    {
        $this->etataffectation = $etataffectation;

        return $this;
    }

    /**
     * Get etataffectation
     *
     * @return string 
     */
    public function getEtataffectation()
    {
        return $this->etataffectation;
    }

    /**
     * Set idartisan
     *
     * @param \BatiBundle\Entity\Artisan $idartisan
     * @return Affecter
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

    /**
     * Set idmission
     *
     * @param \BatiBundle\Entity\Mission $idmission
     * @return Affecter
     */
    public function setIdmission(\BatiBundle\Entity\Mission $idmission = null)
    {
        $this->idmission = $idmission;

        return $this;
    }

    /**
     * Get idmission
     *
     * @return \BatiBundle\Entity\Mission 
     */
    public function getIdmission()
    {
        return $this->idmission;
    }
}
