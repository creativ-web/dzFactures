<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParamGestions
 *
 * @ORM\Table(name="paramgestions")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\ParamgestionRepository")
 */
class Paramgestions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="autobl", type="string", length=255, nullable=true)
     */
    private $autobl;

    /**
     * @var string
     *
     * @ORM\Column(name="autobe", type="string", length=255, nullable=true)
     */
    private $autobe;


    /**
     * @var string
     *
     * @ORM\Column(name="galeriephotos", type="string", length=255, nullable=true)
     */
    private $galeriephotos;

    /**
     * @var string
     *
     * @ORM\Column(name="tablesystem", type="string", length=255, nullable=true)
     */
    private $tablesystem;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set autobl
     *
     * @param string $autobl
     *
     * @return Paramgestion
     */
    public function setAutobl($autobl)
    {
        $this->autobl = $autobl;

        return $this;
    }

    /**
     * Get autobl
     *
     * @return string
     */
    public function getAutobl()
    {
        return $this->autobl;
    }

    /**
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Paramgestion
     */
    public function setUser(\Commandes\CommandesBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Commandes\CommandesBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set autobe
     *
     * @param string $autobe
     *
     * @return Paramgestion
     */
    public function setAutobe($autobe)
    {
        $this->autobe = $autobe;

        return $this;
    }

    /**
     * Get autobe
     *
     * @return string
     */
    public function getAutobe()
    {
        return $this->autobe;
    }

    /**
     * Set galeriephotos
     *
     * @param string $galeriephotos
     * @return Paramgestions
     */
    public function setGaleriephotos($galeriephotos)
    {
        $this->galeriephotos = $galeriephotos;

        return $this;
    }

    /**
     * Get galeriephotos
     *
     * @return string 
     */
    public function getGaleriephotos()
    {
        return $this->galeriephotos;
    }

    /**
     * Set tablesystem
     *
     * @param string $tablesystem
     * @return Paramgestions
     */
    public function setTablesystem($tablesystem)
    {
        $this->tablesystem = $tablesystem;

        return $this;
    }

    /**
     * Get tablesystem
     *
     * @return string 
     */
    public function getTablesystem()
    {
        return $this->tablesystem;
    }
}
