<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tva
 *
 * @ORM\Table(name="tva")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\TvaRepository")
 */
class Tva
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tva")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;




    /**
     * @var float
     *
     * @ORM\Column(name="multiplicate", type="float", nullable=true)
     */
    private $multiplicate;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=125, nullable=true)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="valeur", type="float", nullable=true)
     */
    private $valeur;


    public function __construct()
    {

        $this->valeur = '0';
        $this->nom = '0';
        $this->multiplicate = '0';
        $this->user = $this->getUser();
    }


    /**
     * Get id
     *
     * @return int
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



    /**
     * Set multiplicate
     *
     * @param float $multiplicate
     *
     * @return Tva
     */
    public function setMultiplicate($multiplicate)
    {
        $this->multiplicate = $multiplicate;

        return $this;
    }

    /**
     * Get multiplicate
     *
     * @return float
     */
    public function getMultiplicate()
    {
        return $this->multiplicate;
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

    /**
     * Set valeur
     *
     * @param float $valeur
     *
     * @return Tva
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return float
     */
    public function getValeur()
    {
        return $this->valeur;
    }
    public function __toString()
    {
        return $this->getNom();
    }

    /**
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Tva
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


}
