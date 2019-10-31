<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * ventes
 *
 * @ORM\Table("lotsfactures")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\LotsfacturesRepository")
 */
class Lotsfactures
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="lotsfactures")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Produits", mappedBy="lotsfactures", cascade={"all"})
     */

    protected $produits;




    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datevente", type="date", nullable=true)
     */
    private $datevente;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255,nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255,nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="reduction", type="string", length=255,nullable=true)
     */
    private $reduction;

    /**
     * @var string
     *
     * @ORM\Column(name="totalreduct", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $totalreduct;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=255,nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="qte", type="decimal",precision=10, scale=3, nullable=true)
     */
    private $qte;

    /**
     * @ORM\ManyToOne(targetEntity="Tva", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $tva;

    /**
     * @ORM\ManyToOne(targetEntity="Tva", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $tva2;

    /**
     * @var float
     *
     * @ORM\Column(name="puHT", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $puHT;

    /**
     * @var float
     *
     * @ORM\Column(name="puHTreduit", type="decimal",precision=9, scale=2, nullable=true)
     */
    private $puHTreduit;


    /**
     * @var float
     *
     * @ORM\Column(name="puTTC", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $puTTC;

    /**
     * @var float
     *
     * @ORM\Column(name="puTTCreduit", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $puTTCreduit;

    /**
     * @var float
     *
     * @ORM\Column(name="prixHT", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $prixHT;


    /**
     * @var float
     *
     * @ORM\Column(name="prixTTCvente", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $prixTTCvente;



    /**
     * @var float
     *
     * @ORM\Column(name="totalHT", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $totalHT;

    /**
     * @var float
     *
     * @ORM\Column(name="totalTTC", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $totalTTC;

    /**
     * @var float
     *
     * @ORM\Column(name="totalHTa", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $totalHTa;

    /**
     * @var float
     *
     * @ORM\Column(name="totalTTCa", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $totalTTCa;

    /**
     * @var float
     *
     * @ORM\Column(name="prixTTC", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $prixTTC;

    /**
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=255,nullable=true,)
     */
    private $unite;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255,nullable=true,)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Factures", inversedBy="lotsfactures", cascade={"all"})
     * @ORM\JoinColumn(name="factures_id", referencedColumnName="id")
     */
    private $factures;




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


    public function __toString()
    {
        return $this->name;

    }


    public function __construct()
    {
        $this->datevente= new \DateTime('now');
    }



    /**
     * Set produits
     *
     * @param \Commandes\CommandesBundle\Entity\Produits $produits
     *
     * @return Ventes
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
     * Set datevente
     *
     * @param \DateTime $datevente
     *
     * @return Ventes
     */
    public function setDatevente($datevente)
    {
        $this->datevente = $datevente;

        return $this;
    }

    /**
     * Get datevente
     *
     * @return \DateTime
     */
    public function getDatevente()
    {
        return $this->datevente;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Ventes
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Ventes
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Ventes
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
     * Set qte
     *
     * @param integer $qte
     *
     * @return Ventes
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return integer
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set puHT
     *
     * @param string $puHT
     *
     * @return Ventes
     */
    public function setPuHT($puHT)
    {

        $this->puHT = str_replace(' ', '',  $puHT);
        return $this;
    }

    /**
     * Get puHT
     *
     * @return string
     */
    public function getPuHT()
    {
        return $this->puHT;
    }

    /**
     * Set puTTC
     *
     * @param string $puTTC
     *
     * @return Ventes
     */
    public function setPuTTC($puTTC)
    {
        $this->puTTC =  str_replace(' ', '',  $puTTC);

        return $this;
    }

    /**
     * Get puTTC
     *
     * @return string
     */
    public function getPuTTC()
    {
        return $this->puTTC;
    }

    /**
     * Set prixHT
     *
     * @param string $prixHT
     *
     * @return Ventes
     */
    public function setPrixHT($prixHT)
    {
        $this->prixHT = str_replace(' ', '',  $prixHT);
        return $this;
    }

    /**
     * Get prixHT
     *
     * @return string
     */
    public function getPrixHT()
    {
        return $this->prixHT;
    }

    /**
     * Set prixTTCvente
     *
     * @param string $prixTTCvente
     *
     * @return Ventes
     */
    public function setPrixTTCvente($prixTTCvente)
    {
        $this->prixTTCvente = str_replace(' ', '',  $prixTTCvente);


        return $this;
    }

    /**
     * Get prixTTCvente
     *
     * @return string
     */
    public function getPrixTTCvente()
    {
        return $this->prixTTCvente;
    }

    /**
     * Set totalHT
     *
     * @param string $totalHT
     *
     * @return Ventes
     */
    public function setTotalHT($totalHT)
    {
        $this->totalHT = str_replace(' ', '',  $totalHT);


        return $this;
    }

    /**
     * Get totalHT
     *
     * @return string
     */
    public function getTotalHT()
    {
        return $this->totalHT;
    }

    /**
     * Set totalTTC
     *
     * @param string $totalTTC
     *
     * @return Ventes
     */
    public function setTotalTTC($totalTTC)
    {
        $this->totalTTC = str_replace(' ', '',  $totalTTC);

        return $this;
    }

    /**
     * Get totalTTC
     *
     * @return string
     */
    public function getTotalTTC()
    {
        return $this->totalTTC;
    }

    /**
     * Set totalHTa
     *
     * @param string $totalHTa
     *
     * @return Ventes
     */
    public function setTotalHTa($totalHTa)
    {
        $this->totalHTa = str_replace(' ', '',  $totalHTa);


        return $this;
    }

    /**
     * Get totalHTa
     *
     * @return string
     */
    public function getTotalHTa()
    {
        return $this->totalHTa;
    }

    /**
     * Set totalTTCa
     *
     * @param string $totalTTCa
     *
     * @return Ventes
     */
    public function setTotalTTCa($totalTTCa)
    {
        $this->totalTTCa = str_replace(' ', '',  $totalTTCa);

        return $this;
    }

    /**
     * Get totalTTCa
     *
     * @return string
     */
    public function getTotalTTCa()
    {
        return $this->totalTTCa;
    }

    /**
     * Set prixTTC
     *
     * @param string $prixTTC
     *
     * @return Ventes
     */
    public function setPrixTTC($prixTTC)
    {
        $this->prixTTC = str_replace(' ', '',  $prixTTC);


        return $this;
    }

    /**
     * Get prixTTC
     *
     * @return string
     */
    public function getPrixTTC()
    {
        return $this->prixTTC;
    }

    /**
     * Set unite
     *
     * @param string $unite
     *
     * @return Ventes
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * Get unite
     *
     * @return string
     */
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * Set tva
     *
     * @param \Commandes\CommandesBundle\Entity\Tva $tva
     *
     * @return Ventes
     */
    public function setTva(\Commandes\CommandesBundle\Entity\Tva $tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return \Commandes\CommandesBundle\Entity\Tva
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set tva2
     *
     * @param \Commandes\CommandesBundle\Entity\Tva $tva2
     *
     * @return Ventes
     */
    public function setTva2(\Commandes\CommandesBundle\Entity\Tva $tva2 = null)
    {
        $this->tva2 = $tva2;

        return $this;
    }

    /**
     * Get tva2
     *
     * @return \Commandes\CommandesBundle\Entity\Tva
     */
    public function getTva2()
    {
        return $this->tva2;
    }



    /**
     * Set type
     *
     * @param string $type
     *
     * @return Ventes
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }



    /**
     * Set reduction
     *
     * @param string $reduction
     *
     * @return Ventes
     */
    public function setReduction($reduction)
    {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * Get reduction
     *
     * @return string
     */
    public function getReduction()
    {
        return $this->reduction;
    }

    /**
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Ventes
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
     * Set totalreduct
     *
     * @param string $totalreduct
     *
     * @return Ventes
     */
    public function setTotalreduct($totalreduct)
    {
        $this->totalreduct = str_replace(' ', '',  $totalreduct);

        return $this;
    }

    /**
     * Get totalreduct
     *
     * @return string
     */
    public function getTotalreduct()
    {
        return $this->totalreduct;
    }

    /**
     * Set puHTreduit
     *
     * @param string $puHTreduit
     *
     * @return Ventes
     */
    public function setPuHTreduit($puHTreduit)
    {
        $this->puHTreduit = $puHTreduit;

        return $this;
    }

    /**
     * Get puHTreduit
     *
     * @return string
     */
    public function getPuHTreduit()
    {
        return $this->puHTreduit;
    }

    /**
     * Set puTTCreduit
     *
     * @param string $puTTCreduit
     *
     * @return Ventes
     */
    public function setPuTTCreduit($puTTCreduit)
    {
        $this->puTTCreduit = $puTTCreduit;

        return $this;
    }

    /**
     * Get puTTCreduit
     *
     * @return string
     */
    public function getPuTTCreduit()
    {
        return $this->puTTCreduit;
    }

    /**
     * Set factures
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $factures
     *
     * @return Ventes
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
