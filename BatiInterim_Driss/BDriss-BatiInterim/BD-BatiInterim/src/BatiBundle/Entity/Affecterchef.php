<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affecterchef
 *
 * @ORM\Table(name="affecterChef", indexes={@ORM\Index(name="FK_AffecterChef_idChef", columns={"idChef"}), @ORM\Index(name="FK_AffecterChef_idChantier", columns={"idChantier"})})
 * @ORM\Entity(repositoryClass="BatiBundle\Entity\AffecterchefRepository")
 */
class Affecterchef
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
     * @var \Chefchantier
     *
     * @ORM\ManyToOne(targetEntity="Chefchantier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idChef", referencedColumnName="id")
     * })
     */
    private $idchef;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idchef
     *
     * @param \BatiBundle\Entity\Chefchantier $idchef
     * @return Affecterchef
     */
    public function setIdchef(\BatiBundle\Entity\Chefchantier $idchef = null)
    {
        $this->idchef = $idchef;

        return $this;
    }

    /**
     * Get idchef
     *
     * @return \BatiBundle\Entity\Chefchantier 
     */
    public function getIdchef()
    {
        return $this->idchef;
    }

    /**
     * Set idchantier
     *
     * @param \BatiBundle\Entity\Chantier $idchantier
     * @return Affecterchef
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
}
