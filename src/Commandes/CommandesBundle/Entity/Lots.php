<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diffprix
 *
 * @ORM\Table(name="lots")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\LotsRepository")
 */
class Lots
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
     * @ORM\ManyToOne(targetEntity="Produits", inversedBy="lots", cascade={"all"} )
     * @ORM\JoinColumn(name="produit_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $produits;


    /**
     *
     * @ORM\ManyToOne(targetEntity="Factures", inversedBy="lots", cascade={"persist"} )
     * @ORM\JoinColumn(name="factures_id", referencedColumnName="id",onDelete="SET NULL")
     */

    protected $factures;


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
     * Set qte
     *
     * @param string $qte
     *
     * @return Lots
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return string
     */
    public function getQte()
    {
        return $this->qte;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }



    /**
     * Set produits
     *
     * @param \Commandes\CommandesBundle\Entity\Produits $produits
     *
     * @return Lots
     */
    public function setProduits(\Commandes\CommandesBundle\Entity\Produits $produits = null)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     *
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
     * @return Lots
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
}
