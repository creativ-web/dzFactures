<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * stocks
 * @ORM\Table("bls")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\BlsRepository")
 */
class Bls
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bls", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="creele", type="datetime",nullable=true)
     */
    private $creele;

    /**
     * @ORM\ManyToOne(targetEntity="Acheteurs", inversedBy="bls",cascade={"persist"})
     * @ORM\JoinColumn(name="acheteurs_id", referencedColumnName="id")
     */
    private $acheteur;


    /**
     * @ORM\OneToMany(targetEntity="Aprodoc", mappedBy="bls", cascade={"all"}, orphanRemoval=true)
     */
    private $aprodoc;

    /**
     * @ORM\OneToMany(targetEntity="Aprofact", mappedBy="bls", cascade={"all"}, orphanRemoval=true)
     */
    private $aprofact;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Departements", inversedBy="bls",cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $departements;


    /**
     * @ORM\ManyToOne(targetEntity="Zonnestocks", cascade={"persist"})
     * @ORM\JoinColumn(name="stocks_id", referencedColumnName="id")
     */
    private $zonnestocks;



    /**
     * @ORM\OneToMany(targetEntity="Ventes", mappedBy="bls", cascade={"all"}, orphanRemoval=true)
     */
    private $ventes;


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
     * @ORM\Column(name="datecreation", type="date",nullable=false)
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
     * @ORM\Column(name="dateadd", type="date",nullable=true)
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
    private $montantpaye;

    /**
     * @var string
     *
     * @ORM\Column(name="paiementrecu", type="date",nullable=true)
     */
    private $paiementrecu;

    /**
     * @var string
     *
     * @ORM\Column(name="dateenvois", type="date",nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="editerpar", type="string", length=255,nullable=true)
     */
    private $editerpar;
    /**
     * @var string
     *
     * @ORM\Column(name="expedierpar", type="string", length=255,nullable=true)
     */
    private $expedierpar;
    /**
     * @var string
     *
     * @ORM\Column(name="receptionnerpar", type="string", length=255,nullable=true)
     */
    private $receptionnerpar;
    /**
     * @var string
     *
     * @ORM\Column(name="ncommande", type="string", length=255,nullable=true)
     */
    private $ncommande;



    /**
     * @ORM\ManyToOne(targetEntity="Factures", inversedBy="bls", cascade={"all"})
     * @ORM\JoinColumn(name="factures_id", referencedColumnName="id",onDelete="SET NULL")
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

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * @return Documents
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
     * Set nomvendeur
     *
     * @param string $nomvendeur
     *
     * @return Documents
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
     * @return Documents
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
     * Set acheteur
     *
     * @param \Commandes\CommandesBundle\Entity\Acheteurs $acheteur
     *
     * @return Documents
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
     * @return Documents
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
     * Set zonnestocks
     *
     * @param \Commandes\CommandesBundle\Entity\Zonnestocks $zonnestocks
     *
     * @return Documents
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
     * Set editerpar
     *
     * @param string $editerpar
     *
     * @return Documents
     */
    public function setEditerpar($editerpar)
    {
        $this->editerpar = $editerpar;

        return $this;
    }

    /**
     * Get editerpar
     *
     * @return string
     */
    public function getEditerpar()
    {
        return $this->editerpar;
    }

    /**
     * Set expedierpar
     *
     * @param string $expedierpar
     *
     * @return Documents
     */
    public function setExpedierpar($expedierpar)
    {
        $this->expedierpar = $expedierpar;

        return $this;
    }

    /**
     * Get expedierpar
     *
     * @return string
     */
    public function getExpedierpar()
    {
        return $this->expedierpar;
    }

    /**
     * Set receptionnerpar
     *
     * @param string $receptionnerpar
     *
     * @return Documents
     */
    public function setReceptionnerpar($receptionnerpar)
    {
        $this->receptionnerpar = $receptionnerpar;

        return $this;
    }

    /**
     * Get receptionnerpar
     *
     * @return string
     */
    public function getReceptionnerpar()
    {
        return $this->receptionnerpar;
    }

    /**
     * Set ncommande
     *
     * @param string $ncommande
     *
     * @return Documents
     */
    public function setNcommande($ncommande)
    {
        $this->ncommande = $ncommande;

        return $this;
    }

    /**
     * Get ncommande
     *
     * @return string
     */
    public function getNcommande()
    {
        return $this->ncommande;
    }



    /**
     * Add aprodoc
     *
     * @param \Commandes\CommandesBundle\Entity\Aprodoc $aprodoc
     *
     * @return Bls
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
     * Set creele
     *
     * @param \DateTime $creele
     *
     * @return Bls
     */
    public function setCreele($creele)
    {
        $this->creele = $creele;

        return $this;
    }

    /**
     * Get creele
     *
     * @return \DateTime
     */
    public function getCreele()
    {
        return $this->creele;
    }





    /**
     * Set factures
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $factures
     *
     * @return Bls
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
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Bls
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
     * Add aprofact
     *
     * @param \Commandes\CommandesBundle\Entity\Aprofact $aprofact
     *
     * @return Bls
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
        $aprofact->setBls(null);


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
     * Constructor
     */
    public function __construct()
    {
        $this->aprodoc = new \Doctrine\Common\Collections\ArrayCollection();
        $this->aprofact = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ventes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vente
     *
     * @param \Commandes\CommandesBundle\Entity\Ventes $vente
     *
     * @return Bls
     */
    public function addVente(\Commandes\CommandesBundle\Entity\Ventes $vente)
    {
        $this->ventes[] = $vente;

        $vente->setBls($this);
    }

    /**
     * Remove vente
     *
     * @param \Commandes\CommandesBundle\Entity\Ventes $vente
     */
    public function removeVente(\Commandes\CommandesBundle\Entity\Ventes $vente)
    {
        $this->ventes->removeElement($vente);
        $vente->setBls(null);
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
}
