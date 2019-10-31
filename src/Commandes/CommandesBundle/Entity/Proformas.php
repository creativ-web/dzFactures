<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * stocks
 * @ORM\Table("proformas")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\ProformasRepository")
 */
class Proformas
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="proformas")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @ORM\OneToMany(targetEntity="SuiviFacts", mappedBy="proformas", cascade={"all"})
     */
    private $SuiviFacts;
    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Acheteurs", inversedBy="proformas",cascade={"persist"})
     * @ORM\JoinColumn(name="acheteurs_id", referencedColumnName="id")
     */
    private $acheteur;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Departements", inversedBy="proformas",cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $departements;


    /**
     * @ORM\ManyToOne(targetEntity="Zonnestocks", cascade={"persist"})
     * @ORM\JoinColumn(name="stocks_id", referencedColumnName="id")
     */
    private $zonnestocks;


    /**
     * @ORM\ManyToMany(targetEntity="Ventes", cascade={"all"})
     */
    private $ventes;



    /**
     * @ORM\ManyToMany(targetEntity="Lignes", inversedBy="proformas", cascade={"all"} )
     */
    private $lignes;
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
    private $montantpaye =0;

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
        $this->ventes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add suiviFact
     *
     * @param \Commandes\CommandesBundle\Entity\SuiviFacts $suiviFact
     *
     * @return Proformas
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
     * @return Proformas
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
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Proformas
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
     * Set totalHT
     *
     * @param string $totalHT
     *
     * @return Proformas
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
     * @return Proformas
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
     * @return Proformas
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
}
