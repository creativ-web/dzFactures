<?php

namespace Commandes\CommandesBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();

        $this->roles = array('ROLE_ADMIN');

    }


    /**
     * @ORM\OneToMany(targetEntity="Paramettres", mappedBy="user", cascade={"persist"})
     */
    protected $parametres;
    /**
     * @ORM\OneToMany(targetEntity="Departements", mappedBy="user", cascade={"persist"})
     */
    protected $departements;


    /**
     * @ORM\OneToMany(targetEntity="Factures", mappedBy="user", cascade={"persist"})
     */
    protected $factures;


    /**
     * @ORM\OneToMany(targetEntity="Zonnestocks", mappedBy="user", cascade={"persist"})
     */
    protected $zonnes;

    /**
     * @ORM\OneToMany(targetEntity="Tables", mappedBy="user", cascade={"persist"})
     */
    protected $tables;

    /**
     * @ORM\OneToMany(targetEntity="Acheteurs", mappedBy="user", cascade={"persist"})
     */
    protected $acheteurs;

    /**
     * @ORM\OneToMany(targetEntity="Ventes", mappedBy="user", cascade={"persist"})
     */
    protected $ventes;


    /**
     * @ORM\OneToMany(targetEntity="Produits", mappedBy="user", cascade={"persist"})
     */
    protected $produits;


    /**
     * @ORM\OneToMany(targetEntity="Tva", mappedBy="user", cascade={"persist"})
     */
    protected $tva;


    /**
     * @ORM\OneToMany(targetEntity="Lotsfactures", mappedBy="user", cascade={"persist"})
     */
    protected $lotsfactures;


    /**
     * @ORM\OneToMany(targetEntity="Categories", mappedBy="user", cascade={"persist"})
     */
    protected $categories;

    /**
     * @ORM\OneToMany(targetEntity="Achats", mappedBy="user", cascade={"persist"})
     */
    protected $achats;


    /**
     * @ORM\OneToMany(targetEntity="Depenses", mappedBy="user", cascade={"persist"})
     */
    protected $depenses;


    /**
     * @ORM\OneToMany(targetEntity="Proformas", mappedBy="user", cascade={"persist"})
     */
    protected $proformas;


    /**
     * @ORM\OneToMany(targetEntity="Bes", mappedBy="user", cascade={"persist"})
     */
    protected $bes;



    /**
     * @ORM\OneToMany(targetEntity="Cis", mappedBy="user", cascade={"persist"})
     */
    protected $cis;


    /**
     * @ORM\OneToMany(targetEntity="Bls", mappedBy="user", cascade={"persist"})
     */
    protected $bls;



    /**
     * @ORM\OneToMany(targetEntity="Devis", mappedBy="user", cascade={"persist"})
     */
    protected $devis;


    /**
     * @ORM\OneToMany(targetEntity="Reservations", mappedBy="user", cascade={"persist"})
     */
    protected $reservations;


    /**
     * @ORM\OneToMany(targetEntity="Bcs", mappedBy="user", cascade={"persist"})
     */
    protected $bcs;

    /**
     * @ORM\OneToMany(targetEntity="Blcs", mappedBy="user", cascade={"persist"})
     */
    protected $blcs;

    /**
     * @ORM\OneToMany(targetEntity="Recus", mappedBy="user", cascade={"persist"})
     */
    protected $recus;

    /**
     * @ORM\OneToMany(targetEntity="Pis", mappedBy="user", cascade={"persist"})
     */
    protected $pis;



    /**
     * @ORM\OneToMany(targetEntity="Bts", mappedBy="user", cascade={"persist"})
     */
    protected $bts;


    /**
     * Add departement
     *
     * @param \Commandes\CommandesBundle\Entity\Departements $departement
     *
     * @return User
     */
    public function addDepartement(\Commandes\CommandesBundle\Entity\Departements $departement)
    {
        $this->departements[] = $departement;

        return $this;
    }

    /**
     * Remove departement
     *
     * @param \Commandes\CommandesBundle\Entity\Departements $departement
     */
    public function removeDepartement(\Commandes\CommandesBundle\Entity\Departements $departement)
    {
        $this->departements->removeElement($departement);
    }

    /**
     * Get departements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartements()
    {
        return $this->departements;
    }

    /**
     * Add parametres
     *
     * @param \Commandes\CommandesBundle\Entity\Paramettres $parametres
     * @return User
     */
    public function addParametre(\Commandes\CommandesBundle\Entity\Paramettres $parametres)
    {
        $this->parametres[] = $parametres;

        return $this;
    }

    /**
     * Remove parametres
     *
     * @param \Commandes\CommandesBundle\Entity\Paramettres $parametres
     */
    public function removeParametre(\Commandes\CommandesBundle\Entity\Paramettres $parametres)
    {
        $this->parametres->removeElement($parametres);
    }

    /**
     * Get parametres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParametres()
    {
        return $this->parametres;
    }

    /**
     * Add factures
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $factures
     * @return User
     */
    public function addFacture(\Commandes\CommandesBundle\Entity\Factures $factures)
    {
        $this->factures[] = $factures;

        return $this;
    }

    /**
     * Remove factures
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $factures
     */
    public function removeFacture(\Commandes\CommandesBundle\Entity\Factures $factures)
    {
        $this->factures->removeElement($factures);
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
     * Add zonnes
     *
     * @param \Commandes\CommandesBundle\Entity\Zonnestocks $zonnes
     * @return User
     */
    public function addZonne(\Commandes\CommandesBundle\Entity\Zonnestocks $zonnes)
    {
        $this->zonnes[] = $zonnes;

        return $this;
    }

    /**
     * Remove zonnes
     *
     * @param \Commandes\CommandesBundle\Entity\Zonnestocks $zonnes
     */
    public function removeZonne(\Commandes\CommandesBundle\Entity\Zonnestocks $zonnes)
    {
        $this->zonnes->removeElement($zonnes);
    }

    /**
     * Get zonnes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getZonnes()
    {
        return $this->zonnes;
    }

    /**
     * Add tables
     *
     * @param \Commandes\CommandesBundle\Entity\Tables $tables
     * @return User
     */
    public function addTable(\Commandes\CommandesBundle\Entity\Tables $tables)
    {
        $this->tables[] = $tables;

        return $this;
    }

    /**
     * Remove tables
     *
     * @param \Commandes\CommandesBundle\Entity\Tables $tables
     */
    public function removeTable(\Commandes\CommandesBundle\Entity\Tables $tables)
    {
        $this->tables->removeElement($tables);
    }

    /**
     * Get tables
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * Add acheteurs
     *
     * @param \Commandes\CommandesBundle\Entity\Acheteurs $acheteurs
     * @return User
     */
    public function addAcheteur(\Commandes\CommandesBundle\Entity\Acheteurs $acheteurs)
    {
        $this->acheteurs[] = $acheteurs;

        return $this;
    }

    /**
     * Remove acheteurs
     *
     * @param \Commandes\CommandesBundle\Entity\Acheteurs $acheteurs
     */
    public function removeAcheteur(\Commandes\CommandesBundle\Entity\Acheteurs $acheteurs)
    {
        $this->acheteurs->removeElement($acheteurs);
    }

    /**
     * Get acheteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAcheteurs()
    {
        return $this->acheteurs;
    }

    /**
     * Add ventes
     *
     * @param \Commandes\CommandesBundle\Entity\Ventes $ventes
     * @return User
     */
    public function addVente(\Commandes\CommandesBundle\Entity\Ventes $ventes)
    {
        $this->ventes[] = $ventes;

        return $this;
    }

    /**
     * Remove ventes
     *
     * @param \Commandes\CommandesBundle\Entity\Ventes $ventes
     */
    public function removeVente(\Commandes\CommandesBundle\Entity\Ventes $ventes)
    {
        $this->ventes->removeElement($ventes);
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
     * Add produits
     *
     * @param \Commandes\CommandesBundle\Entity\Produits $produits
     * @return User
     */
    public function addProduit(\Commandes\CommandesBundle\Entity\Produits $produits)
    {
        $this->produits[] = $produits;

        return $this;
    }

    /**
     * Remove produits
     *
     * @param \Commandes\CommandesBundle\Entity\Produits $produits
     */
    public function removeProduit(\Commandes\CommandesBundle\Entity\Produits $produits)
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
        return $this->produits;
    }

    /**
     * Add tva
     *
     * @param \Commandes\CommandesBundle\Entity\Tva $tva
     * @return User
     */
    public function addTva(\Commandes\CommandesBundle\Entity\Tva $tva)
    {
        $this->tva[] = $tva;

        return $this;
    }

    /**
     * Remove tva
     *
     * @param \Commandes\CommandesBundle\Entity\Tva $tva
     */
    public function removeTva(\Commandes\CommandesBundle\Entity\Tva $tva)
    {
        $this->tva->removeElement($tva);
    }

    /**
     * Get tva
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Add lotsfactures
     *
     * @param \Commandes\CommandesBundle\Entity\Lotsfactures $lotsfactures
     * @return User
     */
    public function addLotsfacture(\Commandes\CommandesBundle\Entity\Lotsfactures $lotsfactures)
    {
        $this->lotsfactures[] = $lotsfactures;

        return $this;
    }

    /**
     * Remove lotsfactures
     *
     * @param \Commandes\CommandesBundle\Entity\Lotsfactures $lotsfactures
     */
    public function removeLotsfacture(\Commandes\CommandesBundle\Entity\Lotsfactures $lotsfactures)
    {
        $this->lotsfactures->removeElement($lotsfactures);
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

    /**
     * Add categories
     *
     * @param \Commandes\CommandesBundle\Entity\Categories $categories
     * @return User
     */
    public function addCategory(\Commandes\CommandesBundle\Entity\Categories $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Commandes\CommandesBundle\Entity\Categories $categories
     */
    public function removeCategory(\Commandes\CommandesBundle\Entity\Categories $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add achats
     *
     * @param \Commandes\CommandesBundle\Entity\Achats $achats
     * @return User
     */
    public function addAchat(\Commandes\CommandesBundle\Entity\Achats $achats)
    {
        $this->achats[] = $achats;

        return $this;
    }

    /**
     * Remove achats
     *
     * @param \Commandes\CommandesBundle\Entity\Achats $achats
     */
    public function removeAchat(\Commandes\CommandesBundle\Entity\Achats $achats)
    {
        $this->achats->removeElement($achats);
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
     * Add depenses
     *
     * @param \Commandes\CommandesBundle\Entity\Depenses $depenses
     * @return User
     */
    public function addDepense(\Commandes\CommandesBundle\Entity\Depenses $depenses)
    {
        $this->depenses[] = $depenses;

        return $this;
    }

    /**
     * Remove depenses
     *
     * @param \Commandes\CommandesBundle\Entity\Depenses $depenses
     */
    public function removeDepense(\Commandes\CommandesBundle\Entity\Depenses $depenses)
    {
        $this->depenses->removeElement($depenses);
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
     * Add proformas
     *
     * @param \Commandes\CommandesBundle\Entity\Proformas $proformas
     * @return User
     */
    public function addProforma(\Commandes\CommandesBundle\Entity\Proformas $proformas)
    {
        $this->proformas[] = $proformas;

        return $this;
    }

    /**
     * Remove proformas
     *
     * @param \Commandes\CommandesBundle\Entity\Proformas $proformas
     */
    public function removeProforma(\Commandes\CommandesBundle\Entity\Proformas $proformas)
    {
        $this->proformas->removeElement($proformas);
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
     * Add bes
     *
     * @param \Commandes\CommandesBundle\Entity\Bes $bes
     * @return User
     */
    public function addBe(\Commandes\CommandesBundle\Entity\Bes $bes)
    {
        $this->bes[] = $bes;

        return $this;
    }

    /**
     * Remove bes
     *
     * @param \Commandes\CommandesBundle\Entity\Bes $bes
     */
    public function removeBe(\Commandes\CommandesBundle\Entity\Bes $bes)
    {
        $this->bes->removeElement($bes);
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
     * Add cis
     *
     * @param \Commandes\CommandesBundle\Entity\Cis $cis
     * @return User
     */
    public function addCi(\Commandes\CommandesBundle\Entity\Cis $cis)
    {
        $this->cis[] = $cis;

        return $this;
    }

    /**
     * Remove cis
     *
     * @param \Commandes\CommandesBundle\Entity\Cis $cis
     */
    public function removeCi(\Commandes\CommandesBundle\Entity\Cis $cis)
    {
        $this->cis->removeElement($cis);
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
     * Add bls
     *
     * @param \Commandes\CommandesBundle\Entity\Bls $bls
     * @return User
     */
    public function addBl(\Commandes\CommandesBundle\Entity\Bls $bls)
    {
        $this->bls[] = $bls;

        return $this;
    }

    /**
     * Remove bls
     *
     * @param \Commandes\CommandesBundle\Entity\Bls $bls
     */
    public function removeBl(\Commandes\CommandesBundle\Entity\Bls $bls)
    {
        $this->bls->removeElement($bls);
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
     * Add devis
     *
     * @param \Commandes\CommandesBundle\Entity\Devis $devis
     * @return User
     */
    public function addDevi(\Commandes\CommandesBundle\Entity\Devis $devis)
    {
        $this->devis[] = $devis;

        return $this;
    }

    /**
     * Remove devis
     *
     * @param \Commandes\CommandesBundle\Entity\Devis $devis
     */
    public function removeDevi(\Commandes\CommandesBundle\Entity\Devis $devis)
    {
        $this->devis->removeElement($devis);
    }

    /**
     * Get devis
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * Add reservations
     *
     * @param \Commandes\CommandesBundle\Entity\Reservations $reservations
     * @return User
     */
    public function addReservation(\Commandes\CommandesBundle\Entity\Reservations $reservations)
    {
        $this->reservations[] = $reservations;

        return $this;
    }

    /**
     * Remove reservations
     *
     * @param \Commandes\CommandesBundle\Entity\Reservations $reservations
     */
    public function removeReservation(\Commandes\CommandesBundle\Entity\Reservations $reservations)
    {
        $this->reservations->removeElement($reservations);
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
     * Add bcs
     *
     * @param \Commandes\CommandesBundle\Entity\Bcs $bcs
     * @return User
     */
    public function addBc(\Commandes\CommandesBundle\Entity\Bcs $bcs)
    {
        $this->bcs[] = $bcs;

        return $this;
    }

    /**
     * Remove bcs
     *
     * @param \Commandes\CommandesBundle\Entity\Bcs $bcs
     */
    public function removeBc(\Commandes\CommandesBundle\Entity\Bcs $bcs)
    {
        $this->bcs->removeElement($bcs);
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
     * Add blcs
     *
     * @param \Commandes\CommandesBundle\Entity\Blcs $blcs
     * @return User
     */
    public function addBlc(\Commandes\CommandesBundle\Entity\Blcs $blcs)
    {
        $this->blcs[] = $blcs;

        return $this;
    }

    /**
     * Remove blcs
     *
     * @param \Commandes\CommandesBundle\Entity\Blcs $blcs
     */
    public function removeBlc(\Commandes\CommandesBundle\Entity\Blcs $blcs)
    {
        $this->blcs->removeElement($blcs);
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
     * Add recus
     *
     * @param \Commandes\CommandesBundle\Entity\Recus $recus
     * @return User
     */
    public function addRecus(\Commandes\CommandesBundle\Entity\Recus $recus)
    {
        $this->recus[] = $recus;

        return $this;
    }

    /**
     * Remove recus
     *
     * @param \Commandes\CommandesBundle\Entity\Recus $recus
     */
    public function removeRecus(\Commandes\CommandesBundle\Entity\Recus $recus)
    {
        $this->recus->removeElement($recus);
    }

    /**
     * Get recus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecus()
    {
        return $this->recus;
    }

    /**
     * Add pis
     *
     * @param \Commandes\CommandesBundle\Entity\Pis $pis
     * @return User
     */
    public function addPi(\Commandes\CommandesBundle\Entity\Pis $pis)
    {
        $this->pis[] = $pis;

        return $this;
    }

    /**
     * Remove pis
     *
     * @param \Commandes\CommandesBundle\Entity\Pis $pis
     */
    public function removePi(\Commandes\CommandesBundle\Entity\Pis $pis)
    {
        $this->pis->removeElement($pis);
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
     * Add bts
     *
     * @param \Commandes\CommandesBundle\Entity\Bts $bts
     * @return User
     */
    public function addBt(\Commandes\CommandesBundle\Entity\Bts $bts)
    {
        $this->bts[] = $bts;

        return $this;
    }

    /**
     * Remove bts
     *
     * @param \Commandes\CommandesBundle\Entity\Bts $bts
     */
    public function removeBt(\Commandes\CommandesBundle\Entity\Bts $bts)
    {
        $this->bts->removeElement($bts);
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
}
