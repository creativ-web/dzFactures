<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * stocks
 * @ORM\Table("factures")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\FacturesRepository")
 */
class Factures
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
     * @ORM\Column(name="totalReduction", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $totalReduction;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="factures", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @ORM\OneToMany(targetEntity="SuiviFacts", mappedBy="factures", cascade={"all"})
     */
    private $SuiviFacts;

    /**
     * @ORM\OneToMany(targetEntity="Aprofact", mappedBy="factures", cascade={"all"})
     */
    private $aprofact;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Acheteurs", inversedBy="factures",cascade={"persist"})
     * @ORM\JoinColumn(name="acheteurs_id", referencedColumnName="id", nullable=true,onDelete="SET NULL")
     */
    private $acheteur;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Departements", inversedBy="factures",cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $departements;


    /**
     * @ORM\ManyToOne(targetEntity="Zonnestocks", inversedBy="factures", cascade={"persist"})
     * @ORM\JoinColumn(name="stocks_id", referencedColumnName="id")
     */
    private $zonnestocks;

    /**
     * @ORM\ManyToOne(targetEntity="Tables", inversedBy="factures", cascade={"persist"})
     * @ORM\JoinColumn(name="table_id", referencedColumnName="id")
     */
    private $tables;




    /**
     * @ORM\OneToMany(targetEntity="Ventes", mappedBy="factures", cascade={"all"}, orphanRemoval=true)
     */

    private $ventes;

    /**
     * @ORM\OneToMany(targetEntity="Lotsfactures", mappedBy="factures", cascade={"all"})
     */
    private $lotsfactures;

    /**
     * @ORM\ManyToMany(targetEntity="Lignes", inversedBy="factures", cascade={"all"} )
     */
    private $lignes;

    /**
     * @ORM\OneToMany(targetEntity="Lots", mappedBy="factures", cascade={"all"})
     */
    private $lots;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255,nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="nf", type="string", length=255,nullable=false)
     */
    private $nf;


    /**
     * @var string
     *
     * @ORM\Column(name="datecreation", type="datetime",nullable=false)
     */
    private $datecreation;


    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255,nullable=true)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="additionnelle", type="string", length=255,nullable=true)
     */
    private $additionnelle;


    /**
     * @var string
     *
     * @ORM\Column(name="dateadd", type="datetime",nullable=true)
     */
    private $dateadd;


    /**
     * @var string
     *
     * @ORM\Column(name="moderegle", type="string", length=255,nullable=true)
     */
    private $moderegle;


    /**
     * @var string
     *
     * @ORM\Column(name="dateregle", type="string", length=255,nullable=true)
     */
    private $dateregle;


    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=255,nullable=true)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255,nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="montantpaye", type="decimal",precision=10, scale=2 ,nullable=true)
     */
    private $montantpaye = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="paiementrecu", type="datetime",nullable=true)
     */
    private $paiementrecu;

    /**
     * @var string
     *
     * @ORM\Column(name="dateenvois", type="datetime",nullable=true)
     */
    private $dateenvois;

    /**
     * @var string
     *
     * @ORM\Column(name="nc", type="integer",nullable=true)
     */
    private $nc;

    /**
     * @var string
     *
     * @ORM\Column(name="nrc", type="integer",nullable=true)
     */
    private $nrc;

    /**
     * @var string
     *
     * @ORM\Column(name="nomvendeur", type="string", length=255,nullable=true)
     */
    private $nomvendeur;

    /**
     * @var string
     *
     * @ORM\Column(name="informations", type="text",nullable=true)
     */
    private $informations;


    /**
     * @ORM\OneToMany(targetEntity="Bls", mappedBy="factures", cascade={"persist"})
     * @ORM\JoinColumn(name="bls_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $bls;


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






    /**
     * Set type
     *
     * @param string $type
     *
     * @return Factures
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
     * Set nf
     *
     * @param string $nf
     *
     * @return Factures
     */
    public function setNf($nf)
    {
        $this->nf = $nf;

        return $this;
    }

    /**
     * Get nf
     *
     * @return string
     */
    public function getNf()
    {
        return $this->nf;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     *
     * @return Factures
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Factures
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set additionnelle
     *
     * @param string $additionnelle
     *
     * @return Factures
     */
    public function setAdditionnelle($additionnelle)
    {
        $this->additionnelle = $additionnelle;

        return $this;
    }

    /**
     * Get additionnelle
     *
     * @return string
     */
    public function getAdditionnelle()
    {
        return $this->additionnelle;
    }

    /**
     * Set dateadd
     *
     * @param \DateTime $dateadd
     *
     * @return Factures
     */
    public function setDateadd($dateadd)
    {
        $this->dateadd = $dateadd;

        return $this;
    }

    /**
     * Get dateadd
     *
     * @return \DateTime
     */
    public function getDateadd()
    {
        return $this->dateadd;
    }

    /**
     * Set moderegle
     *
     * @param string $moderegle
     *
     * @return Factures
     */
    public function setModeregle($moderegle)
    {
        $this->moderegle = $moderegle;

        return $this;
    }

    /**
     * Get moderegle
     *
     * @return string
     */
    public function getModeregle()
    {
        return $this->moderegle;
    }

    /**
     * Set dateregle
     *
     * @param string $dateregle
     *
     * @return Factures
     */
    public function setDateregle($dateregle)
    {
        $this->dateregle = $dateregle;

        return $this;
    }

    /**
     * Get dateregle
     *
     * @return string
     */
    public function getDateregle()
    {
        return $this->dateregle;
    }

    /**
     * Set objet
     *
     * @param string $objet
     *
     * @return Factures
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Factures
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set montantpaye
     *
     * @param string $montantpaye
     *
     * @return Factures
     */
    public function setMontantpaye($montantpaye)
    {
        $this->montantpaye = $montantpaye;

        return $this;
    }

    /**
     * Get montantpaye
     *
     * @return string
     */
    public function getMontantpaye()
    {
        return $this->montantpaye;
    }

    /**
     * Set paiementrecu
     *
     * @param \DateTime $paiementrecu
     *
     * @return Factures
     */
    public function setPaiementrecu($paiementrecu)
    {
        $this->paiementrecu = $paiementrecu;

        return $this;
    }

    /**
     * Get paiementrecu
     *
     * @return \DateTime
     */
    public function getPaiementrecu()
    {
        return $this->paiementrecu;
    }

    /**
     * Set dateenvois
     *
     * @param \DateTime $dateenvois
     *
     * @return Factures
     */
    public function setDateenvois($dateenvois)
    {
        $this->dateenvois = $dateenvois;

        return $this;
    }

    /**
     * Get dateenvois
     *
     * @return \DateTime
     */
    public function getDateenvois()
    {
        return $this->dateenvois;
    }

    /**
     * Set nc
     *
     * @param integer $nc
     *
     * @return Factures
     */
    public function setNc($nc)
    {
        $this->nc = $nc;

        return $this;
    }

    /**
     * Get nc
     *
     * @return integer
     */
    public function getNc()
    {
        return $this->nc;
    }



    /**
     * Set utilisateur
     *
     * @param \Commandes\CommandesBundle\Entity\User $utilisateur
     *
     * @return Factures
     */
    public function setUtilisateur(\Commandes\CommandesBundle\Entity\User $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Commandes\CommandesBundle\Entity\User
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set acheteur
     *
     * @param \Commandes\CommandesBundle\Entity\Acheteurs $acheteur
     *
     * @return Factures
     */
    public function setAcheteur(\Commandes\CommandesBundle\Entity\Acheteurs $acheteur = null)
    {
        $this->acheteur = $acheteur;

        return $this;
    }

    /**
     * Get acheteur
     *
     * @return \Commandes\CommandesBundle\Entity\Acheteurs
     */
    public function getAcheteur()
    {
        return $this->acheteur;
    }

    /**
     * Set departements
     *
     * @param \Commandes\CommandesBundle\Entity\Departements $departements
     *
     * @return Factures
     */
    public function setDepartements(\Commandes\CommandesBundle\Entity\Departements $departements = null)
    {
        $this->departements = $departements;

        return $this;
    }

    /**
     * Get departements
     *
     * @return \Commandes\CommandesBundle\Entity\Departements
     */
    public function getDepartements()
    {
        return $this->departements;
    }



    /**
     * Set nomvendeur
     *
     * @param string $nomvendeur
     *
     * @return Factures
     */
    public function setNomvendeur($nomvendeur)
    {
        $this->nomvendeur = $nomvendeur;

        return $this;
    }

    /**
     * Get nomvendeur
     *
     * @return string
     */
    public function getNomvendeur()
    {
        return $this->nomvendeur;
    }

    /**
     * Set informations
     *
     * @param string $informations
     *
     * @return Factures
     */
    public function setInformations($informations)
    {
        $this->informations = $informations;

        return $this;
    }

    /**
     * Get informations
     *
     * @return string
     */
    public function getInformations()
    {
        return $this->informations;
    }



    /**
     * Constructor
     */
    public function __construct()
    {

        $this->datecreation = new \DateTime();
    }




    /**
     * Add suiviFact
     *
     * @param \Commandes\CommandesBundle\Entity\SuiviFacts $suiviFact
     *
     * @return Factures
     */
    public function addSuiviFact(\Commandes\CommandesBundle\Entity\SuiviFacts $suiviFact)
    {
        $this->SuiviFacts[] = $suiviFact;

        return $this;
    }

    /**
     * Remove suiviFact
     *
     * @param \Commandes\CommandesBundle\Entity\SuiviFacts $suiviFact
     */
    public function removeSuiviFact(\Commandes\CommandesBundle\Entity\SuiviFacts $suiviFact)
    {
        $this->SuiviFacts->removeElement($suiviFact);
    }

    /**
     * Get suiviFacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuiviFacts()
    {
        return $this->SuiviFacts;
    }

    /**
     * Add ligne
     *
     * @param \Commandes\CommandesBundle\Entity\Lignes $ligne
     *
     * @return Factures
     */
    public function addLigne(\Commandes\CommandesBundle\Entity\Lignes $ligne)
    {
        $this->lignes[] = $ligne;

        return $this;
    }

    /**
     * Remove ligne
     *
     * @param \Commandes\CommandesBundle\Entity\Lignes $ligne
     */
    public function removeLigne(\Commandes\CommandesBundle\Entity\Lignes $ligne)
    {
        $this->lignes->removeElement($ligne);
    }

    /**
     * Get lignes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLignes()
    {
        return $this->lignes;
    }

    /**
     * Set nrc
     *
     * @param integer $nrc
     *
     * @return Factures
     */
    public function setNrc($nrc)
    {
        $this->nrc = $nrc;

        return $this;
    }

    /**
     * Get nrc
     *
     * @return integer
     */
    public function getNrc()
    {
        return $this->nrc;
    }

    /**
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Factures
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
     * Set zonnestocks
     *
     * @param \Commandes\CommandesBundle\Entity\Zonnestocks $zonnestocks
     *
     * @return Factures
     */
    public function setZonnestocks(\Commandes\CommandesBundle\Entity\Zonnestocks $zonnestocks = null)
    {
        $this->zonnestocks = $zonnestocks;

        return $this;
    }

    /**
     * Get zonnestocks
     *
     * @return \Commandes\CommandesBundle\Entity\Zonnestocks
     */
    public function getZonnestocks()
    {
        return $this->zonnestocks;
    }



    /**
     * Add aprofact
     *
     * @param \Commandes\CommandesBundle\Entity\Aprofact $aprofact
     *
     * @return Factures
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
     * Set totalHT
     *
     * @param string $totalHT
     *
     * @return Factures
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
     * @return Factures
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
     * Set totalReduction
     *
     * @param string $totalReduction
     *
     * @return Factures
     */
    public function setTotalReduction($totalReduction)
    {
        $this->totalReduction = $totalReduction;

        return $this;
    }

    /**
     * Get totalReduction
     *
     * @return string
     */
    public function getTotalReduction()
    {
        return $this->totalReduction;
    }




    /**
     * Add vente
     *
     * @param \Commandes\CommandesBundle\Entity\Ventes $vente
     *
     * @return Factures
     */
    public function addVente(\Commandes\CommandesBundle\Entity\Ventes $vente)
    {
        $this->ventes[] = $vente;
        $vente->setFactures($this);

    }

    /**
     * Remove vente
     *
     * @param \Commandes\CommandesBundle\Entity\Ventes $vente
     */
    public function removeVente(\Commandes\CommandesBundle\Entity\Ventes $vente)
    {
        $this->ventes->removeElement($vente);
        $vente->setFactures(null);
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
     * Add bl
     *
     * @param \Commandes\CommandesBundle\Entity\Bls $bl
     *
     * @return Factures
     */
    public function addBl(\Commandes\CommandesBundle\Entity\Bls $bl)
    {

        $this->bls[] = $bl;
        $bl->setFactures($this);
    }

    /**
     * Remove bl
     *
     * @param \Commandes\CommandesBundle\Entity\Bls $bl
     */
    public function removeBl(\Commandes\CommandesBundle\Entity\Bls $bl)
    {
        $this->bls->removeElement($bl);
    }

    /**
     * Get bls
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBls()
    {
        return $this->bls;
    }

    /**
     * Set tables
     *
     * @param \Commandes\CommandesBundle\Entity\Tables $tables
     *
     * @return Factures
     */
    public function setTables(\Commandes\CommandesBundle\Entity\Tables $tables = null)
    {
        $this->tables = $tables;

        return $this;
    }

    /**
     * Get tables
     *
     * @return \Commandes\CommandesBundle\Entity\Tables
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * Add lotsfacture
     *
     * @param \Commandes\CommandesBundle\Entity\Lotsfactures $lotsfacture
     *
     * @return Factures
     */
    public function addLotsfacture(\Commandes\CommandesBundle\Entity\Lotsfactures $lotsfacture)
    {
        $this->lotsfactures[] = $lotsfacture;

        return $this;
    }

    /**
     * Remove lotsfacture
     *
     * @param \Commandes\CommandesBundle\Entity\Lotsfactures $lotsfacture
     */
    public function removeLotsfacture(\Commandes\CommandesBundle\Entity\Lotsfactures $lotsfacture)
    {
        $this->lotsfactures->removeElement($lotsfacture);
    }

    /**
     * Get lotsfactures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLotsfactures()
    {
        return $this->lotsfactures;
    }
}
