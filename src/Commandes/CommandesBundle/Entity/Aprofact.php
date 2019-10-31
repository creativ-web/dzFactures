<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aprofact
 *
 * @ORM\Table(name="aprofact")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\AprofactRepository")
 */
class Aprofact
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
     * @ORM\ManyToOne(targetEntity="Produits", inversedBy="aprofact", cascade={"persist"} )
     * @ORM\JoinColumn(name="produits_id", referencedColumnName="id",nullable=true, onDelete="SET NULL")
     */
    protected $produits;

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
     * @ORM\ManyToOne(targetEntity="Factures", inversedBy="aprofact",cascade={"persist"})
     * @ORM\JoinColumn(name="factures_id", referencedColumnName="id",nullable=true, onDelete="SET NULL")
     */
    private $factures;

    /**
     * @ORM\ManyToOne(targetEntity="Bls", inversedBy="aprofact",cascade={"persist"})
     * @ORM\JoinColumn(name="bls_id", referencedColumnName="id",nullable=true, onDelete="SET NULL")
     */
    private $bls;


    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Recus", inversedBy="aprofact",cascade={"all"})
     * @ORM\JoinColumn(name="recus_id", referencedColumnName="id")
     */
    private $recus;

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
     * @return Aprofact
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
     * @return Aprofact
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
     * @return Aprofact
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
     * Set factures
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $factures
     *
     * @return Aprofact
     */
    public function setFactures(\Commandes\CommandesBundle\Entity\Factures $factures = null)
    {
        $this->factures = $factures;

        return $this;
    }

    /**
     * Get factures
     *
     * @return \Commandes\CommandesBundle\Entity\Factures
     */
    public function getFactures()
    {
        return $this->factures;
    }

    /**
     * Set recus
     *
     * @param \Commandes\CommandesBundle\Entity\Recus $recus
     *
     * @return Aprofact
     */
    public function setRecus(\Commandes\CommandesBundle\Entity\Recus $recus = null)
    {
        $this->recus = $recus;

        return $this;
    }

    /**
     * Get recus
     *
     * @return \Commandes\CommandesBundle\Entity\Recus
     */
    public function getRecus()
    {
        return $this->recus;
    }

    /**
     * Set bls
     *
     * @param \Commandes\CommandesBundle\Entity\Bls $bls
     *
     * @return Aprofact
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
}
