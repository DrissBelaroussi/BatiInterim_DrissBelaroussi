<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gestionnaire
 *
 * @ORM\Table(name="gestionnaire")
 * @ORM\Entity(repositoryClass="BatiBundle\Entity\GestionnaireRepository")
 */
class Gestionnaire
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
     * @ORM\Column(name="loginG", type="string", length=25, nullable=false)
     */
    private $loging;

    /**
     * @var string
     *
     * @ORM\Column(name="mdpG", type="string", length=50, nullable=false)
     */
    private $mdpg;

    /**
     * @var string
     *
     * @ORM\Column(name="nomG", type="string", length=25, nullable=false)
     */
    private $nomg;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomG", type="string", length=25, nullable=false)
     */
    private $prenomg;



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
     * Set loging
     *
     * @param string $loging
     * @return Gestionnaire
     */
    public function setLoging($loging)
    {
        $this->loging = $loging;

        return $this;
    }

    /**
     * Get loging
     *
     * @return string 
     */
    public function getLoging()
    {
        return $this->loging;
    }

    /**
     * Set mdpg
     *
     * @param string $mdpg
     * @return Gestionnaire
     */
    public function setMdpg($mdpg)
    {
        $this->mdpg = $mdpg;

        return $this;
    }

    /**
     * Get mdpg
     *
     * @return string 
     */
    public function getMdpg()
    {
        return $this->mdpg;
    }

    /**
     * Set nomg
     *
     * @param string $nomg
     * @return Gestionnaire
     */
    public function setNomg($nomg)
    {
        $this->nomg = $nomg;

        return $this;
    }

    /**
     * Get nomg
     *
     * @return string 
     */
    public function getNomg()
    {
        return $this->nomg;
    }

    /**
     * Set prenomg
     *
     * @param string $prenomg
     * @return Gestionnaire
     */
    public function setPrenomg($prenomg)
    {
        $this->prenomg = $prenomg;

        return $this;
    }

    /**
     * Get prenomg
     *
     * @return string 
     */
    public function getPrenomg()
    {
        return $this->prenomg;
    }
}
