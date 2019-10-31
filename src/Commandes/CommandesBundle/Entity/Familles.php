<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Familles
 *
 * @ORM\Table("familles")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\FamillesRepository")
 */
class Familles
{

    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    private $id;


    /**
     * @ORM\OneToMany(targetEntity="Produits", mappedBy="familles", cascade={"persist"})
     */
    protected $produits;




    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    public function __toString()
    {
        return $this->name;
    }



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return String
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produits
     *
     * @param \Commandes\CommandesBundle\Entity\Produits $produits
     * @return Familles
     */
    public function addProduits(\Commandes\CommandesBundle\Entity\produits $produits)
    {
        $this->produits[] = $produits;

        return $this;
    }

    /**
     * Remove produits
     *
     * @param \Commandes\CommandesBundle\Entity\produits $produits
     */
    public function removeProduits(\Commandes\CommandesBundle\Entity\Produits $produits)
    {
        $this->produits->removeElement($produits);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->Produits;
    }



    /**
     * Add produit
     *
     * @param \Commandes\CommandesBundle\Entity\produits $produit
     *
     * @return Familles
     */
    public function addProduit(\Commandes\CommandesBundle\Entity\produits $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \Commandes\CommandesBundle\Entity\produits $produit
     */
    public function removeProduit(\Commandes\CommandesBundle\Entity\produits $produit)
    {
        $this->produits->removeElement($produit);
    }


}
