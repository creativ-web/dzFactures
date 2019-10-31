<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignes
 *
 * @ORM\Table(name="lignes")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\LignesRepository")
 */
class Lignes
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
     * @ORM\ManyToMany(targetEntity="Factures", mappedBy="lignes", cascade={"all"} )
     */
    protected $factures;

    /**
     * @ORM\ManyToMany(targetEntity="Depenses", mappedBy="lignes", cascade={"all"} )
     */
    protected $depenses;

    /**
     * @ORM\ManyToMany(targetEntity="Proformas", mappedBy="lignes", cascade={"all"} )
     */
    protected $proformas;

    /**
     * @ORM\ManyToMany(targetEntity="Recus", mappedBy="lignes", cascade={"all"} )
     */
    protected $recus;

    /**
     * @ORM\ManyToMany(targetEntity="Devis", mappedBy="lignes", cascade={"all"} )
     */
    protected $devis;

    /**
     * @ORM\OneToMany(targetEntity="Bonscommandes", mappedBy="lignes", cascade={"persist"})
     */
    protected $bonscommandes;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;


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
     * Set text
     *
     * @param string $text
     *
     * @return Lignes
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->devis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add devi
     *
     * @param \Commandes\CommandesBundle\Entity\Devis $devi
     *
     * @return Lignes
     */
    public function addDevi(\Commandes\CommandesBundle\Entity\Devis $devi)
    {
        $this->devis[] = $devi;

        return $this;
    }

    /**
     * Remove devi
     *
     * @param \Commandes\CommandesBundle\Entity\Devis $devi
     */
    public function removeDevi(\Commandes\CommandesBundle\Entity\Devis $devi)
    {
        $this->devis->removeElement($devi);
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
     * Add facture
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $facture
     *
     * @return Lignes
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
     * @return Lignes
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
     * Add recus
     *
     * @param \Commandes\CommandesBundle\Entity\Recus $recus
     *
     * @return Lignes
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
     * Add bonscommande
     *
     * @param \Commandes\CommandesBundle\Entity\Bonscommandes $bonscommande
     *
     * @return Lignes
     */
    public function addBonscommande(\Commandes\CommandesBundle\Entity\Bonscommandes $bonscommande)
    {
        $this->bonscommandes[] = $bonscommande;

        return $this;
    }

    /**
     * Remove bonscommande
     *
     * @param \Commandes\CommandesBundle\Entity\Bonscommandes $bonscommande
     */
    public function removeBonscommande(\Commandes\CommandesBundle\Entity\Bonscommandes $bonscommande)
    {
        $this->bonscommandes->removeElement($bonscommande);
    }

    /**
     * Get bonscommandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBonscommandes()
    {
        return $this->bonscommandes;
    }
}
