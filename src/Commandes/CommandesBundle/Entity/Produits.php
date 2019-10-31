<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * produits
 * @ORM\Table("produits")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\ProduitsRepository")
 */
class Produits
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="produits")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Familles", inversedBy="produits", cascade={"persist"} )
     * @ORM\JoinColumn(name="familles_id", referencedColumnName="id")
     */
    private $familles;



    /**
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="produits", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $categories;


    /**
     * @ORM\OneToMany(targetEntity="Ventes", mappedBy="produits", cascade={"all"})
     */
    protected $ventes;



    /**
     * @ORM\ManyToOne(targetEntity="Lotsfactures", inversedBy="produits", cascade={"persist"} )
     * @ORM\JoinColumn(name="produits_id", referencedColumnName="id",nullable=true, onDelete="SET NULL")
     */
    protected $lotsfactures;



    /**
     *
     * @ORM\ManyToOne(targetEntity="Fournisseurs", inversedBy="produits", cascade={"persist"} )
     * @ORM\JoinColumn(name="fournisseurs_id", referencedColumnName="id")
     */
    private $fournisseurs;



    /**
     * @ORM\OneToMany(targetEntity="Achats", mappedBy="produits", cascade={"persist"})
     */
    private $achats;

    /**
     * @ORM\OneToMany(targetEntity="Aprodoc", mappedBy="produits", cascade={"all"}, orphanRemoval=true)
     */
    private $aprodoc;

    /**
     * @ORM\OneToMany(targetEntity="Aprofact", mappedBy="produits", cascade={"all"}, orphanRemoval=true)
     */
    private $aprofact;





    /**
     * @var string
     *
     * @ORM\Column(name="activlot", type="boolean",nullable=true,)
     */
    private $activlot = false ;

    /**
     * @var string
     *
     * @ORM\Column(name="afterjoin", type="string",nullable=true,)
     */
    private $afterjoint = 0 ;

    /**
     * @var string
     *
     * @ORM\Column(name="affichage", type="boolean",nullable=true,)
     */
    private $affichage ;




    /**
     * @ORM\ManyToMany(targetEntity="Lots", inversedBy="produits", cascade={"all"} )
     */
    private $lots;



    /**
     * @ORM\ManyToOne(targetEntity="Tva", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true,onDelete="SET NULL")
     */
    private $tva;

    /**
     * @var string
     *
     * @ORM\Column(name="moretva", type="string",nullable=true,)
     */
    private $moretva;

    /**
     * @ORM\ManyToOne(targetEntity="Tva", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true,onDelete="SET NULL")
     */
    private $tva2;
    /**
     * @var string
     *
     * @ORM\Column(name="moretva2", type="string",nullable=true,)
     */
    private $moretva2;


    /**
     * @var string
     *
     * @ORM\Column(name="dp", type="boolean",nullable=true,)
     */
    private $dp ;

    /**
     * @var string
     *
     * @ORM\Column(name="aff", type="text",nullable=true,)
     */
    private $aff ;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",nullable=true)
     */
    private $description;


    /**
     * @ORM\OneToOne(targetEntity="Medias", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected  $images;


    /**
     * @var float
     *
     * @ORM\Column(name="puHT", type="decimal",precision=10, scale=2)
     */
    private $puHT;


    /**
     * @var float
     *
     * @ORM\Column(name="puTTC", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $puTTC;

    /**
     * @var float
     *
     * @ORM\Column(name="prixTTC", type="float", nullable=true)
     */
    private $prixTTC;



    /**
     * @var float
     *
     * @ORM\Column(name="prixHt", type="float", nullable=true)
     */
    private $prixHt;



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
     * @ORM\Column(name="qte", type="decimal",precision=10, scale=3, nullable=true)
     */
    private $qte;


    /**
     * @var string
     *
     * @ORM\Column(name="qtedefault", type="integer", length=255, nullable=false)
     */
    private $qtedefault;

    /**
     * @var string
     *
     * @ORM\Column(name="qtealert", type="string", length=255, nullable=true)
     */
    private $qtealert;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255,nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=255,nullable=true,)
     */
    private $unite;
    /**
     * @var string
     *
     * @ORM\Column(name="moreunite", type="string", length=255,nullable=true,)
     */
    private $moreunite;
    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255,nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="barecode", type="string", nullable=true)
     */
    private $barcode;


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



    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produits
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
     * Set puHT
     *
     * @param string $puHT
     *
     * @return Produits
     */
    public function setPuHT($puHT)
    {
        $this->puHT = $puHT;

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
     * @return Produits
     */
    public function setPuTTC($puTTC)
    {
        $this->puTTC = $puTTC;

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
     * Set prixTTC
     *
     * @param float $prixTTC
     *
     * @return Produits
     */
    public function setPrixTTC($prixTTC)
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    /**
     * Get prixTTC
     *
     * @return float
     */
    public function getPrixTTC()
    {
        return $this->prixTTC;
    }

    /**
     * Set prixHt
     *
     * @param float $prixHt
     *
     * @return Produits
     */
    public function setPrixHt($prixHt)
    {
        $this->prixHt = $prixHt;

        return $this;
    }

    /**
     * Get prixHt
     *
     * @return float
     */
    public function getPrixHt()
    {
        return $this->prixHt;
    }



    /**
     * Set totalHT
     *
     * @param string $totalHT
     *
     * @return Produits
     */
    public function setTotalHT($totalHT)
    {
        $this->totalHT = $totalHT;

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
     * @return Produits
     */
    public function setTotalTTC($totalTTC)
    {
        $this->totalTTC = $totalTTC;

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
     * Set qte
     *
     * @param integer $qte
     *
     * @return Produits
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
     * Set qtealert
     *
     * @param string $qtealert
     *
     * @return Produits
     */
    public function setQtealert($qtealert)
    {
        $this->qtealert = $qtealert;

        return $this;
    }

    /**
     * Get qtealert
     *
     * @return string
     */
    public function getQtealert()
    {
        return $this->qtealert;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Produits
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
     * @return Produits
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
     * Set barcode
     *
     * @param string $barcode
     *
     * @return Produits
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * Get barcode
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Set familles
     *
     * @param \Commandes\CommandesBundle\Entity\Familles $familles
     *
     * @return Produits
     */
    public function setFamilles(\Commandes\CommandesBundle\Entity\Familles $familles = null)
    {
        $this->familles = $familles;

        return $this;
    }

    /**
     * Get familles
     *
     * @return \Commandes\CommandesBundle\Entity\Familles
     */
    public function getFamilles()
    {
        return $this->familles;
    }

    /**
     * Set fournisseurs
     *
     * @param \Commandes\CommandesBundle\Entity\Fournisseurs $fournisseurs
     *
     * @return Produits
     */
    public function setFournisseurs(\Commandes\CommandesBundle\Entity\Fournisseurs $fournisseurs = null)
    {
        $this->fournisseurs = $fournisseurs;

        return $this;
    }

    /**
     * Get fournisseurs
     *
     * @return \Commandes\CommandesBundle\Entity\Fournisseurs
     */
    public function getFournisseurs()
    {
        return $this->fournisseurs;
    }




    /**
     * Set tva
     *
     * @param \Commandes\CommandesBundle\Entity\Tva $tva
     *
     * @return Produits
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
     * Set images
     *
     * @param \Commandes\CommandesBundle\Entity\Medias $images
     *
     * @return Produits
     */
    public function setImages(\Commandes\CommandesBundle\Entity\Medias $images = null)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return \Commandes\CommandesBundle\Entity\Medias
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set qtedefault
     *
     * @param integer $qtedefault
     *
     * @return Produits
     */
    public function setQtedefault($qtedefault)
    {
        $this->qtedefault = $qtedefault;

        return $this;
    }

    /**
     * Get qtedefault
     *
     * @return integer
     */
    public function getQtedefault()
    {
        return $this->qtedefault;
    }

    /**
     * Set unite
     *
     * @param string $unite
     *
     * @return Produits
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
     * Set tva2
     *
     * @param \Commandes\CommandesBundle\Entity\Tva $tva2
     *
     * @return Produits
     */
    public function setTva2(\Commandes\CommandesBundle\Entity\Tva $tva2)
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
     * Constructor
     */
    public function __construct()
    {
        $this->ventes = new \Doctrine\Common\Collections\ArrayCollection();

    }

    /**
     * Add vente
     *
     * @param \Commandes\CommandesBundle\Entity\Ventes $vente
     *
     * @return Produits
     */
    public function addVente(\Commandes\CommandesBundle\Entity\Ventes $vente)
    {
        $this->ventes[] = $vente;

        return $this;
    }

    /**
     * Remove vente
     *
     * @param \Commandes\CommandesBundle\Entity\Ventes $vente
     */
    public function removeVente(\Commandes\CommandesBundle\Entity\Ventes $vente)
    {
        $this->ventes->removeElement($vente);
        $vente->setProduits(null);
    }

    /**
     * Get ventes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVentes()
    {
        return $this->ventes;
    }

    /**
     * Add achat
     *
     * @param \Commandes\CommandesBundle\Entity\Achats $achat
     *
     * @return Produits
     */
    public function addAchat(\Commandes\CommandesBundle\Entity\Achats $achat)
    {
        $this->achats[] = $achat;

        return $this;
    }

    /**
     * Remove achat
     *
     * @param \Commandes\CommandesBundle\Entity\Achats $achat
     */
    public function removeAchat(\Commandes\CommandesBundle\Entity\Achats $achat)
    {
        $this->achats->removeElement($achat);
        $achat->setProduits(null);
    }

    /**
     * Get achats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAchats()
    {
        return $this->achats;
    }

    /**
     * Add aprodoc
     *
     * @param \Commandes\CommandesBundle\Entity\Aprodoc $aprodoc
     *
     * @return Produits
     */
    public function addAprodoc(\Commandes\CommandesBundle\Entity\Aprodoc $aprodoc)
    {
        $this->aprodoc[] = $aprodoc;

        return $this;
    }

    /**
     * Remove aprodoc
     *
     * @param \Commandes\CommandesBundle\Entity\Aprodoc $aprodoc
     */
    public function removeAprodoc(\Commandes\CommandesBundle\Entity\Aprodoc $aprodoc)
    {
        $this->aprodoc->removeElement($aprodoc);
        $aprodoc->setProduits(null);
    }

    /**
     * Get aprodoc
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAprodoc()
    {
        return $this->aprodoc;
    }

    /**
     * Add aprofact
     *
     * @param \Commandes\CommandesBundle\Entity\Aprofact $aprofact
     *
     * @return Produits
     */
    public function addAprofact(\Commandes\CommandesBundle\Entity\Aprofact $aprofact)
    {
        $this->aprofact[] = $aprofact;

        return $this;
    }

    /**
     * Remove aprofact
     *
     * @param \Commandes\CommandesBundle\Entity\Aprofact $aprofact
     */
    public function removeAprofact(\Commandes\CommandesBundle\Entity\Aprofact $aprofact)
    {
        $this->aprofact->removeElement($aprofact);
        $aprofact->setProduits(null);

    }

    /**
     * Get aprofact
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAprofact()
    {
        return $this->aprofact;
    }

    /**
     * Set moretva
     *
     * @param integer $moretva
     *
     * @return Produits
     */
    public function setMoretva($moretva)
    {
        $this->moretva = $moretva;

        return $this;
    }

    /**
     * Get moretva
     *
     * @return integer
     */
    public function getMoretva()
    {
        return $this->moretva;
    }

    /**
     * Set moretva2
     *
     * @param integer $moretva2
     *
     * @return Produits
     */
    public function setMoretva2($moretva2)
    {
        $this->moretva2 = $moretva2;

        return $this;
    }

    /**
     * Get moretva2
     *
     * @return integer
     */
    public function getMoretva2()
    {
        return $this->moretva2;
    }

    /**
     * Set dp
     *
     * @param boolean $dp
     *
     * @return Produits
     */
    public function setDp($dp)
    {
        $this->dp = $dp;

        return $this;
    }

    /**
     * Get dp
     *
     * @return boolean
     */
    public function getDp()
    {
        return $this->dp;
    }

    /**
     * Set moreunite
     *
     * @param string $moreunite
     *
     * @return Produits
     */
    public function setMoreunite($moreunite)
    {
        $this->moreunite = $moreunite;

        return $this;
    }

    /**
     * Get moreunite
     *
     * @return string
     */
    public function getMoreunite()
    {
        return $this->moreunite;
    }



    /**
     * Set aff
     *
     * @param string $aff
     *
     * @return Produits
     */
    public function setAff($aff)
    {
        $this->aff = $aff;

        return $this;
    }

    /**
     * Get aff
     *
     * @return string
     */
    public function getAff()
    {
        return $this->aff;
    }

    /**
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Produits
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
     * Set categories
     *
     * @param \Commandes\CommandesBundle\Entity\Categories $categories
     *
     * @return Produits
     */
    public function setCategories(\Commandes\CommandesBundle\Entity\Categories $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \Commandes\CommandesBundle\Entity\Categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set activlot
     *
     * @param boolean $activlot
     *
     * @return Produits
     */
    public function setActivlot($activlot)
    {
        $this->activlot = $activlot;

        return $this;
    }

    /**
     * Get activlot
     *
     * @return boolean
     */
    public function getActivlot()
    {
        return $this->activlot;
    }


    /**
     * Set affichage
     *
     * @param boolean $affichage
     *
     * @return Produits
     */
    public function setAffichage($affichage)
    {
        $this->affichage = $affichage;

        return $this;
    }


    /**
     * Get affichage
     *
     * @return boolean
     */
    public function getAffichage()
    {
        return $this->affichage;
    }






    /**
     * Set afterjoint
     *
     * @param boolean $afterjoint
     *
     * @return Produits
     */
    public function setAfterjoint($afterjoint)
    {
        $this->afterjoint = $afterjoint;

        return $this;
    }

    /**
     * Get afterjoint
     *
     * @return boolean
     */
    public function getAfterjoint()
    {
        return $this->afterjoint;
    }

    /**
     * Set lotsfactures
     *
     * @param \Commandes\CommandesBundle\Entity\Lotsfactures $lotsfactures
     * @return Produits
     */
    public function setLotsfactures(\Commandes\CommandesBundle\Entity\Lotsfactures $lotsfactures = null)
    {
        $this->lotsfactures = $lotsfactures;

        return $this;
    }

    /**
     * Get lotsfactures
     *
     * @return \Commandes\CommandesBundle\Entity\Lotsfactures 
     */
    public function getLotsfactures()
    {
        return $this->lotsfactures;
    }

    /**
     * Add lots
     *
     * @param \Commandes\CommandesBundle\Entity\Lots $lots
     * @return Produits
     */
    public function addLot(\Commandes\CommandesBundle\Entity\Lots $lots)
    {
        $this->lots[] = $lots;

        return $this;
    }

    /**
     * Remove lots
     *
     * @param \Commandes\CommandesBundle\Entity\Lots $lots
     */
    public function removeLot(\Commandes\CommandesBundle\Entity\Lots $lots)
    {
        $this->lots->removeElement($lots);
    }

    /**
     * Get lots
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLots()
    {
        return $this->lots;
    }
}
