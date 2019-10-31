<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acheteurs
 *
 * @ORM\Table(name="acheteurs")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\AcheteursRepository")
 */
class Acheteurs
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="acheteurs")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="supp", type="boolean", nullable=false)
     */
    private $supp = '0';

    /**
     * @ORM\OneToMany(targetEntity="Depenses", mappedBy="acheteur", orphanRemoval=false)
     */
    protected $depenses;

    /**
     * @ORM\OneToMany(targetEntity="Documents", mappedBy="acheteur", orphanRemoval=false)
     */
    protected $documents;




    /**
     * @ORM\OneToMany(targetEntity="Factures", mappedBy="acheteur", orphanRemoval=false)
     */
    private $factures;

    /**
     * @ORM\OneToMany(targetEntity="Proformas", mappedBy="acheteur", cascade={"persist"})
     */
    protected $proformas;


    /**
     * @ORM\OneToMany(targetEntity="Bes", mappedBy="acheteur", cascade={"persist"})
     */
    protected $bes;

    /**
     * @ORM\OneToMany(targetEntity="Cis", mappedBy="acheteur", cascade={"persist"})
     */
    protected $cis;

    /**
     * @ORM\OneToMany(targetEntity="Bls", mappedBy="acheteur", cascade={"persist"})
     */
    protected $bls;

    /**
     * @ORM\OneToMany(targetEntity="Reservations", mappedBy="acheteur", cascade={"persist"})
     */
    protected $reservations;

    /**
     * @ORM\OneToMany(targetEntity="Bcs", mappedBy="acheteur", cascade={"persist"})
     */
    protected $bcs;

    /**
     * @ORM\OneToMany(targetEntity="Pis", mappedBy="acheteur", cascade={"persist"})
     */
    protected $pis;


    /**
     * @ORM\OneToMany(targetEntity="Bts", mappedBy="acheteur", cascade={"persist"})
     */
    protected $bts;

    /**
     * @ORM\OneToMany(targetEntity="Inventaires", mappedBy="acheteur", cascade={"persist"})
     */
    protected $inventaires;

    /**
     * @ORM\OneToMany(targetEntity="Blcs", mappedBy="acheteur", cascade={"persist"})
     */
    protected $blcs;

    /**
     * @ORM\OneToMany(targetEntity="Becs", mappedBy="acheteur", cascade={"persist"})
     */
    protected $becs;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;


    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255, nullable=true)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="nomusage", type="string", length=255, nullable=true)
     */
    private $nomusage;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="reduction", type="string", length=255, nullable=true)
     */
    private $reduction;

    /**
     * @var string
     *
     * @ORM\Column(name="taxe", type="string", length=255, nullable=true)
     */
    private $taxe;

    /**
     * @var string
     *
     * @ORM\Column(name="limitereglement", type="string", length=255, nullable=true)
     */
    private $limitereglement;

    /**
     * @var string
     *
     * @ORM\Column(name="modereglement", type="string", length=255, nullable=true)
     */
    private $modereglement;

    /**
     * @var string
     *
     * @ORM\Column(name="immatriculation", type="string", length=255, nullable=true)
     */
    private $immatriculation;


    /**
     * @var string
     *
     * @ORM\Column(name="personne", type="string", length=255, nullable=true)
     */
    private $personne;

    /**
     * @var string
     *
     * @ORM\Column(name="codeclient", type="string", length=255, nullable=true)
     */
    private $codeclient;


    /**
     * @var string
     *
     * @ORM\Column(name="relances", type="boolean", length=255, nullable=true)
     */
    private $relances;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=255, nullable=true)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="cb", type="string", length=255, nullable=true)
     */
    private $cb;

    /**
     * @var string
     *
     * @ORM\Column(name="ncb", type="string", length=255, nullable=true)
     */
    private $ncb;

    /**
     * @var string
     *
     * @ORM\Column(name="nrcselect", type="string", length=255, nullable=true)
     */
    private $nrcselect;

    /**
     * @var string
     *
     * @ORM\Column(name="nrc", type="string", length=255, nullable=true)
     */
    private $nrc;

    /**
     * @var string
     *
     * @ORM\Column(name="nifselect", type="string", length=255, nullable=true)
     */
    private $nifselect;
    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=255, nullable=true)
     */
    private $nif;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="adressesupp", type="text", length=255, nullable=true)
     */
    private $adressesupp;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="codepostal", type="string", length=255, nullable=true)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=true)
     */
    private $pays;


    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;



    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=255, nullable=true)
     */
    private $siteweb;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="telmobile", type="string", length=255, nullable=true)
     */
    private $telmobile;

    /**
     * @var string
     *
     * @ORM\Column(name="pro", type="boolean", nullable=true)
     */
    private $pro;
    /**
     * @var string
     *
     * @ORM\Column(name="particulier", type="boolean", nullable=true)
     */
    private $particulier;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Acheteurs
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
     * Set nifselect
     *
     * @param string $nifselect
     *
     * @return Acheteurs
     */
    public function setNifselect($nifselect)
    {
        $this->nifselect = $nifselect;

        return $this;
    }

    /**
     * Get nifselect
     *
     * @return string
     */
    public function getNifselect()
    {
        return $this->nifselect;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Acheteurs
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Acheteurs
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Acheteurs
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set siteweb
     *
     * @param string $siteweb
     *
     * @return Acheteurs
     */
    public function setSiteweb($siteweb)
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    /**
     * Get siteweb
     *
     * @return string
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Acheteurs
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Acheteurs
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set nif
     *
     * @param string $nif
     *
     * @return Acheteurs
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set codepostal
     *
     * @param string $codepostal
     *
     * @return Acheteurs
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return string
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->depenses = new \Doctrine\Common\Collections\ArrayCollection();
    }



    /**
     * Add document
     *
     * @param \Commandes\CommandesBundle\Entity\Documents $document
     *
     * @return Acheteurs
     */
    public function addDocument(\Commandes\CommandesBundle\Entity\Documents $document)
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param \Commandes\CommandesBundle\Entity\Documents $document
     */
    public function removeDocument(\Commandes\CommandesBundle\Entity\Documents $document)
    {
        $this->documents->removeElement($document);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Set nomusage
     *
     * @param string $nomusage
     *
     * @return Acheteurs
     */
    public function setNomusage($nomusage)
    {
        $this->nomusage = $nomusage;

        return $this;
    }

    /**
     * Get nomusage
     *
     * @return string
     */
    public function getNomusage()
    {
        return $this->nomusage;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Acheteurs
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
     * @return Acheteurs
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
     * Set taxe
     *
     * @param string $taxe
     *
     * @return Acheteurs
     */
    public function setTaxe($taxe)
    {
        $this->taxe = $taxe;

        return $this;
    }

    /**
     * Get taxe
     *
     * @return string
     */
    public function getTaxe()
    {
        return $this->taxe;
    }

    /**
     * Set limitereglement
     *
     * @param string $limitereglement
     *
     * @return Acheteurs
     */
    public function setLimitereglement($limitereglement)
    {
        $this->limitereglement = $limitereglement;

        return $this;
    }

    /**
     * Get limitereglement
     *
     * @return string
     */
    public function getLimitereglement()
    {
        return $this->limitereglement;
    }

    /**
     * Set modereglement
     *
     * @param string $modereglement
     *
     * @return Acheteurs
     */
    public function setModereglement($modereglement)
    {
        $this->modereglement = $modereglement;

        return $this;
    }

    /**
     * Get modereglement
     *
     * @return string
     */
    public function getModereglement()
    {
        return $this->modereglement;
    }

    /**
     * Set immatriculation
     *
     * @param string $immatriculation
     *
     * @return Acheteurs
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * Get immatriculation
     *
     * @return string
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * Set personne
     *
     * @param string $personne
     *
     * @return Acheteurs
     */
    public function setPersonne($personne)
    {
        $this->personne = $personne;

        return $this;
    }

    /**
     * Get personne
     *
     * @return string
     */
    public function getPersonne()
    {
        return $this->personne;
    }

    /**
     * Set codeclient
     *
     * @param string $codeclient
     *
     * @return Acheteurs
     */
    public function setCodeclient($codeclient)
    {
        $this->codeclient = $codeclient;

        return $this;
    }

    /**
     * Get codeclient
     *
     * @return string
     */
    public function getCodeclient()
    {
        return $this->codeclient;
    }

    /**
     * Set relances
     *
     * @param boolean $relances
     *
     * @return Acheteurs
     */
    public function setRelances($relances)
    {
        $this->relances = $relances;

        return $this;
    }

    /**
     * Get relances
     *
     * @return boolean
     */
    public function getRelances()
    {
        return $this->relances;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     *
     * @return Acheteurs
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set cb
     *
     * @param string $cb
     *
     * @return Acheteurs
     */
    public function setCb($cb)
    {
        $this->cb = $cb;

        return $this;
    }

    /**
     * Get cb
     *
     * @return string
     */
    public function getCb()
    {
        return $this->cb;
    }

    /**
     * Set ncb
     *
     * @param string $ncb
     *
     * @return Acheteurs
     */
    public function setNcb($ncb)
    {
        $this->ncb = $ncb;

        return $this;
    }

    /**
     * Get ncb
     *
     * @return string
     */
    public function getNcb()
    {
        return $this->ncb;
    }

    /**
     * Set adressesupp
     *
     * @param string $adressesupp
     *
     * @return Acheteurs
     */
    public function setAdressesupp($adressesupp)
    {
        $this->adressesupp = $adressesupp;

        return $this;
    }

    /**
     * Get adressesupp
     *
     * @return string
     */
    public function getAdressesupp()
    {
        return $this->adressesupp;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Acheteurs
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
     * Set pays
     *
     * @param string $pays
     *
     * @return Acheteurs
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set telmobile
     *
     * @param string $telmobile
     *
     * @return Acheteurs
     */
    public function setTelmobile($telmobile)
    {
        $this->telmobile = $telmobile;

        return $this;
    }

    /**
     * Get telmobile
     *
     * @return string
     */
    public function getTelmobile()
    {
        return $this->telmobile;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Acheteurs
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return Acheteurs
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Add proforma
     *
     * @param \Commandes\CommandesBundle\Entity\Proformas $proforma
     *
     * @return Acheteurs
     */
    public function addProforma(\Commandes\CommandesBundle\Entity\Proformas $proforma)
    {
        $this->proformas[] = $proforma;

        return $this;
    }

    /**
     * Remove proforma
     *
     * @param \Commandes\CommandesBundle\Entity\Proformas $proforma
     */
    public function removeProforma(\Commandes\CommandesBundle\Entity\Proformas $proforma)
    {
        $this->proformas->removeElement($proforma);
    }

    /**
     * Get proformas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProformas()
    {
        return $this->proformas;
    }

    /**
     * Add be
     *
     * @param \Commandes\CommandesBundle\Entity\Bes $be
     *
     * @return Acheteurs
     */
    public function addBe(\Commandes\CommandesBundle\Entity\Bes $be)
    {
        $this->bes[] = $be;

        return $this;
    }

    /**
     * Remove be
     *
     * @param \Commandes\CommandesBundle\Entity\Bes $be
     */
    public function removeBe(\Commandes\CommandesBundle\Entity\Bes $be)
    {
        $this->bes->removeElement($be);
    }

    /**
     * Get bes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBes()
    {
        return $this->bes;
    }

    /**
     * Add bl
     *
     * @param \Commandes\CommandesBundle\Entity\Bls $bl
     *
     * @return Acheteurs
     */
    public function addBl(\Commandes\CommandesBundle\Entity\Bls $bl)
    {
        $this->bls[] = $bl;

        return $this;
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
     * Add reservation
     *
     * @param \Commandes\CommandesBundle\Entity\Reservations $reservation
     *
     * @return Acheteurs
     */
    public function addReservation(\Commandes\CommandesBundle\Entity\Reservations $reservation)
    {
        $this->reservations[] = $reservation;

        return $this;
    }

    /**
     * Remove reservation
     *
     * @param \Commandes\CommandesBundle\Entity\Reservations $reservation
     */
    public function removeReservation(\Commandes\CommandesBundle\Entity\Reservations $reservation)
    {
        $this->reservations->removeElement($reservation);
    }

    /**
     * Get reservations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Add bc
     *
     * @param \Commandes\CommandesBundle\Entity\Bcs $bc
     *
     * @return Acheteurs
     */
    public function addBc(\Commandes\CommandesBundle\Entity\Bcs $bc)
    {
        $this->bcs[] = $bc;

        return $this;
    }

    /**
     * Remove bc
     *
     * @param \Commandes\CommandesBundle\Entity\Bcs $bc
     */
    public function removeBc(\Commandes\CommandesBundle\Entity\Bcs $bc)
    {
        $this->bcs->removeElement($bc);
    }

    /**
     * Get bcs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBcs()
    {
        return $this->bcs;
    }

    /**
     * Add pi
     *
     * @param \Commandes\CommandesBundle\Entity\Pis $pi
     *
     * @return Acheteurs
     */
    public function addPi(\Commandes\CommandesBundle\Entity\Pis $pi)
    {
        $this->pis[] = $pi;

        return $this;
    }

    /**
     * Remove pi
     *
     * @param \Commandes\CommandesBundle\Entity\Pis $pi
     */
    public function removePi(\Commandes\CommandesBundle\Entity\Pis $pi)
    {
        $this->pis->removeElement($pi);
    }

    /**
     * Get pis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPis()
    {
        return $this->pis;
    }

    /**
     * Add bt
     *
     * @param \Commandes\CommandesBundle\Entity\Bts $bt
     *
     * @return Acheteurs
     */
    public function addBt(\Commandes\CommandesBundle\Entity\Bts $bt)
    {
        $this->bts[] = $bt;

        return $this;
    }

    /**
     * Remove bt
     *
     * @param \Commandes\CommandesBundle\Entity\Bts $bt
     */
    public function removeBt(\Commandes\CommandesBundle\Entity\Bts $bt)
    {
        $this->bts->removeElement($bt);
    }

    /**
     * Get bts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBts()
    {
        return $this->bts;
    }

    /**
     * Add inventaire
     *
     * @param \Commandes\CommandesBundle\Entity\Inventaires $inventaire
     *
     * @return Acheteurs
     */
    public function addInventaire(\Commandes\CommandesBundle\Entity\Inventaires $inventaire)
    {
        $this->inventaires[] = $inventaire;

        return $this;
    }

    /**
     * Remove inventaire
     *
     * @param \Commandes\CommandesBundle\Entity\Inventaires $inventaire
     */
    public function removeInventaire(\Commandes\CommandesBundle\Entity\Inventaires $inventaire)
    {
        $this->inventaires->removeElement($inventaire);
    }

    /**
     * Get inventaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInventaires()
    {
        return $this->inventaires;
    }

    /**
     * Add blc
     *
     * @param \Commandes\CommandesBundle\Entity\Blcs $blc
     *
     * @return Acheteurs
     */
    public function addBlc(\Commandes\CommandesBundle\Entity\Blcs $blc)
    {
        $this->blcs[] = $blc;

        return $this;
    }

    /**
     * Remove blc
     *
     * @param \Commandes\CommandesBundle\Entity\Blcs $blc
     */
    public function removeBlc(\Commandes\CommandesBundle\Entity\Blcs $blc)
    {
        $this->blcs->removeElement($blc);
    }

    /**
     * Get blcs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlcs()
    {
        return $this->blcs;
    }

    /**
     * Add bec
     *
     * @param \Commandes\CommandesBundle\Entity\Becs $bec
     *
     * @return Acheteurs
     */
    public function addBec(\Commandes\CommandesBundle\Entity\Becs $bec)
    {
        $this->becs[] = $bec;

        return $this;
    }

    /**
     * Remove bec
     *
     * @param \Commandes\CommandesBundle\Entity\Becs $bec
     */
    public function removeBec(\Commandes\CommandesBundle\Entity\Becs $bec)
    {
        $this->becs->removeElement($bec);
    }

    /**
     * Get becs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBecs()
    {
        return $this->becs;
    }

    /**
     * Add ci
     *
     * @param \Commandes\CommandesBundle\Entity\Cis $ci
     *
     * @return Acheteurs
     */
    public function addCi(\Commandes\CommandesBundle\Entity\Cis $ci)
    {
        $this->cis[] = $ci;

        return $this;
    }

    /**
     * Remove ci
     *
     * @param \Commandes\CommandesBundle\Entity\Cis $ci
     */
    public function removeCi(\Commandes\CommandesBundle\Entity\Cis $ci)
    {
        $this->cis->removeElement($ci);
    }

    /**
     * Get cis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCis()
    {
        return $this->cis;
    }

    /**
     * Set pro
     *
     * @param boolean $pro
     *
     * @return Acheteurs
     */
    public function setPro($pro)
    {
        $this->pro = $pro;

        return $this;
    }

    /**
     * Get pro
     *
     * @return boolean
     */
    public function getPro()
    {
        return $this->pro;
    }

    /**
     * Set particulier
     *
     * @param boolean $particulier
     *
     * @return Acheteurs
     */
    public function setParticulier($particulier)
    {
        $this->particulier = $particulier;

        return $this;
    }

    /**
     * Get particulier
     *
     * @return boolean
     */
    public function getParticulier()
    {
        return $this->particulier;
    }

    /**
     * Add depense
     *
     * @param \Commandes\CommandesBundle\Entity\Depenses $depense
     *
     * @return Acheteurs
     */
    public function addDepense(\Commandes\CommandesBundle\Entity\Depenses $depense)
    {
        $this->depenses[] = $depense;

        return $this;
    }

    /**
     * Remove depense
     *
     * @param \Commandes\CommandesBundle\Entity\Depenses $depense
     */
    public function removeDepense(\Commandes\CommandesBundle\Entity\Depenses $depense)
    {
        $this->depenses->removeElement($depense);
    }

    /**
     * Get depenses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepenses()
    {
        return $this->depenses;
    }

    /**
     * Set nrcselect
     *
     * @param string $nrcselect
     *
     * @return Acheteurs
     */
    public function setNrcselect($nrcselect)
    {
        $this->nrcselect = $nrcselect;

        return $this;
    }

    /**
     * Get nrcselect
     *
     * @return string
     */
    public function getNrcselect()
    {
        return $this->nrcselect;
    }

    /**
     * Set nrc
     *
     * @param string $nrc
     *
     * @return Acheteurs
     */
    public function setNrc($nrc)
    {
        $this->nrc = $nrc;

        return $this;
    }

    /**
     * Get nrc
     *
     * @return string
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
     * @return Acheteurs
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
     * Add facture
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $facture
     *
     * @return Acheteurs
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

    /**
     * Set supp
     *
     * @param boolean $supp
     *
     * @return Acheteurs
     */
    public function setSupp($supp)
    {
        $this->supp = $supp;

        return $this;
    }

    /**
     * Get supp
     *
     * @return boolean
     */
    public function getSupp()
    {
        return $this->supp;
    }
}
