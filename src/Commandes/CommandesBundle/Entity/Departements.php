<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departements
 *
 * @ORM\Table(name="departements")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\DepartementsRepository")
 */
class Departements
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="departements")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Factures", mappedBy="departements", cascade={"all"})
     */
    protected $factures;


    /**
     * @ORM\OneToMany(targetEntity="Bes", mappedBy="departements", cascade={"all"})
     */
    protected $bes;

    /**
     * @ORM\OneToMany(targetEntity="Bls", mappedBy="departements", cascade={"all"})
     */
    protected $bls;


    /**
     * @ORM\OneToMany(targetEntity="Depenses", mappedBy="departements", cascade={"all"})
     */
    protected $depenses;


    /**
     * @ORM\OneToMany(targetEntity="Cis", mappedBy="departements", cascade={"all"})
     */
    protected $cis;

    /**
     * @ORM\OneToMany(targetEntity="Reservations", mappedBy="departements", cascade={"all"})
     */
    protected $reservations;

    /**
     * @ORM\OneToMany(targetEntity="Bcs", mappedBy="departements", cascade={"all"})
     */
    protected $bcs;

    /**
     * @ORM\OneToMany(targetEntity="Pis", mappedBy="departements", cascade={"all"})
     */
    protected $pis;


    /**
     * @ORM\OneToMany(targetEntity="Bts", mappedBy="departements", cascade={"all"})
     */
    protected $bts;

    /**
     * @ORM\OneToMany(targetEntity="Inventaires", mappedBy="departements", cascade={"all"})
     */
    protected $inventaires;

    /**
     * @ORM\OneToMany(targetEntity="Blcs", mappedBy="departements", cascade={"all"})
     */
    protected $blcs;

    /**
     * @ORM\OneToMany(targetEntity="Becs", mappedBy="departements", cascade={"all"})
     */
    protected $becs;

    /**
     * @ORM\OneToMany(targetEntity="Proformas", mappedBy="departements", cascade={"all"})
     */
    protected $proformas;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nifselect", type="string", length=255, nullable=true)
     */
    private $nifselect;

    /**
     * @var string
     *
     * @ORM\Column(name="nrcselect", type="string", length=255, nullable=true)
     */
    private $nrcselect;

    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=255, nullable=true)
     */
    private $nif;

    /**
     * @var string
     *
     * @ORM\Column(name="nrc", type="string", length=255, nullable=true)
     */
    private $nrc;
    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=255, nullable=true)
     */
    private $iban;

    /**
     * @var string
     *
     * @ORM\Column(name="banque", type="string", length=255, nullable=true)
     */
    private $banque;

    /**
     * @var string
     *
     * @ORM\Column(name="bic", type="string", length=255, nullable=true)
     */
    private $bic;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="codepostal", type="string", length=255, nullable=true)
     */
    private $codepostal;

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
     * @ORM\Column(name="deff", type="string", length=255, nullable=true)
     */
    private $deff;

    /**
     * @var string
     *
     * @ORM\Column(name="datemodif", type="datetime",  nullable=true)
     */
    private $datemodif;

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
    public function __toString()
    {
        return $this->getnom();
    }
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Departements
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
     * @return Departements
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
     * Set nif
     *
     * @param string $nif
     *
     * @return Departements
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Departements
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
     * Set codepostal
     *
     * @param string $codepostal
     *
     * @return Departements
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
     * Set ville
     *
     * @param string $ville
     *
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * Set iban
     *
     * @param string $iban
     *
     * @return Departements
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set banque
     *
     * @param string $banque
     *
     * @return Departements
     */
    public function setBanque($banque)
    {
        $this->banque = $banque;

        return $this;
    }

    /**
     * Get banque
     *
     * @return string
     */
    public function getBanque()
    {
        return $this->banque;
    }

    /**
     * Set bic
     *
     * @param string $bic
     *
     * @return Departements
     */
    public function setBic($bic)
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * Get bic
     *
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
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
     * @return Departements
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
     * Add proforma
     *
     * @param \Commandes\CommandesBundle\Entity\Proformas $proforma
     *
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * @return Departements
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
     * Set nrcselect
     *
     * @param string $nrcselect
     *
     * @return Departements
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
     * @return Departements
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
     * Set deff
     *
     * @param string $deff
     *
     * @return Departements
     */
    public function setDeff($deff)
    {
        $this->deff = $deff;

        return $this;
    }

    /**
     * Get deff
     *
     * @return string
     */
    public function getDeff()
    {
        return $this->deff;
    }

    /**
     * Set datemodif
     *
     * @param \DateTime $datemodif
     *
     * @return Departements
     */
    public function setDatemodif($datemodif)
    {
        $this->datemodif = $datemodif;

        return $this;
    }

    /**
     * Get datemodif
     *
     * @return \DateTime
     */
    public function getDatemodif()
    {
        return $this->datemodif;
    }

    /**
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Departements
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
