<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aprodoc
 *
 * @ORM\Table(name="aprodoc")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\AprodocRepository")
 */
class Aprodoc
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
     * @ORM\ManyToOne(targetEntity="Produits", inversedBy="aprodoc", cascade={"persist"} )
     * @ORM\JoinColumn(name="produits_id", referencedColumnName="id",nullable=true, onDelete="SET NULL")
     */
    protected $produits;

    /**
     * @ORM\ManyToOne(targetEntity="Bes", inversedBy="aprodoc",cascade={"persist"})
     * @ORM\JoinColumn(name="bes_id", referencedColumnName="id",nullable=true, onDelete="SET NULL")
     */
    private $bes;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Bls", inversedBy="aprodoc",cascade={"all"})
     * @ORM\JoinColumn(name="bls_id", referencedColumnName="id")
     */
    private $bls;


    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Bts", inversedBy="aprodoc",cascade={"all"})
     * @ORM\JoinColumn(name="bts_id", referencedColumnName="id")
     */
    private $bts;



    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=255, nullable=true)
     */
    private $zone;

    /**
     * @var float
     *
     * @ORM\Column(name="qte", type="decimal",precision=10, scale=3, nullable=true)
     */
    private $qte;


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
     * Set zone
     *
     * @param string $zone
     *
     * @return Aprodoc
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set qte
     *
     * @param integer $qte
     *
     * @return Aprodoc
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return int
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set produits
     *
     * @param \Commandes\CommandesBundle\Entity\Produits $produits
     *
     * @return Aprodoc
     */
    public function setProduits(\Commandes\CommandesBundle\Entity\Produits $produits = null)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return \Commandes\CommandesBundle\Entity\Produits
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Set bes
     *
     * @param \Commandes\CommandesBundle\Entity\Bes $bes
     *
     * @return Aprodoc
     */
    public function setBes(\Commandes\CommandesBundle\Entity\Bes $bes = null)
    {
        $this->bes = $bes;

        return $this;
    }

    /**
     * Get bes
     *
     * @return \Commandes\CommandesBundle\Entity\Bes
     */
    public function getBes()
    {
        return $this->bes;
    }

    /**
     * Set bls
     *
     * @param \Commandes\CommandesBundle\Entity\Bls $bls
     *
     * @return Aprodoc
     */
    public function setBls(\Commandes\CommandesBundle\Entity\Bls $bls = null)
    {
        $this->bls = $bls;

        return $this;
    }

    /**
     * Get bls
     *
     * @return \Commandes\CommandesBundle\Entity\Bls
     */
    public function getBls()
    {
        return $this->bls;
    }

    /**
     * Set bts
     *
     * @param \Commandes\CommandesBundle\Entity\Bts $bts
     *
     * @return Aprodoc
     */
    public function setBts(\Commandes\CommandesBundle\Entity\Bts $bts = null)
    {
        $this->bts = $bts;

        return $this;
    }

    /**
     * Get bts
     *
     * @return \Commandes\CommandesBundle\Entity\Bts
     */
    public function getBts()
    {
        return $this->bts;
    }
}
