<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tva
 *
 * @ORM\Table(name="zonnestocks")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\ZonnestocksRepository")
 */
class Zonnestocks
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="zonnes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @ORM\OneToMany(targetEntity="Factures", mappedBy="zonnestocks", cascade={"persist"})
     */
    protected $factures;

    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=125)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=125, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="types", type="string", length=125)
     */
    private $types;




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
     * Set nom
     *
     * @param string $nom
     *
     * @return Tva
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    public function __toString()
    {
        return $this->getNom();
    }


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Zonnestocks
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set types
     *
     * @param string $types
     *
     * @return Zonnestocks
     */
    public function setTypes($types)
    {
        $this->types = $types;

        return $this;
    }

    /**
     * Get types
     *
     * @return string
     */
    public function getTypes()
    {
        return $this->types;
    }






    /**
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Zonnestocks
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
     * Constructor
     */
    public function __construct()
    {
        $this->factures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add facture
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $facture
     *
     * @return Zonnestocks
     */
    public function addFacture(\Commandes\CommandesBundle\Entity\Factures $facture)
    {
        $this->factures[] = $facture;

        return $this;
    }

    /**
     * Remove facture
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $facture
     */
    public function removeFacture(\Commandes\CommandesBundle\Entity\Factures $facture)
    {
        $this->factures->removeElement($facture);
    }

    /**
     * Get factures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFactures()
    {
        return $this->factures;
    }
}
