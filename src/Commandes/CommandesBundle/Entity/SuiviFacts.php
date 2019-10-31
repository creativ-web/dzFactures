<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SuiviFacts
 *
 * @ORM\Table(name="suivi_facts")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\SuiviFactsRepository")
 */
class SuiviFacts
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
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Factures", inversedBy="SuiviFacts",cascade={"persist"})
     * @ORM\JoinColumn(name="factures_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $factures;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Proformas", inversedBy="SuiviFacts",cascade={"all"})
     * @ORM\JoinColumn(name="proformas_id", referencedColumnName="id")
     */
    private $proformas;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Recus", inversedBy="SuiviFacts",cascade={"all"})
     * @ORM\JoinColumn(name="recus_id", referencedColumnName="id")
     */
    private $recus;


    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Devis", inversedBy="SuiviFacts",cascade={"all"})
     * @ORM\JoinColumn(name="devis_id", referencedColumnName="id")
     */
    private $devis;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Bonscommandes", inversedBy="SuiviFacts",cascade={"all"})
     * @ORM\JoinColumn(name="bonscommandes_id", referencedColumnName="id")
     */
    private $bonscommandes;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Commandescafes", inversedBy="SuiviFacts",cascade={"all"})
     * @ORM\JoinColumn(name="commandescafes_id", referencedColumnName="id")
     */
    private $commandescafes;

    /**
     * @ORM\ManyToOne(targetEntity="Commandes\CommandesBundle\Entity\Depenses", inversedBy="SuiviFacts",cascade={"persist"})
     * @ORM\JoinColumn(name="depenses_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $depenses;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     * @Assert\DateTime()
     * @ORM\Column(name="date", type="datetime",nullable=true)
     */

    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="par", type="string", length=255, nullable=true)
     */
    private $par;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text", nullable=true)
     */
    private $texte;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="text", nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal",precision=10, scale=2 ,nullable=true)
     */
    private $prix;
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
     * Set type
     *
     * @param string $type
     *
     * @return SuiviFacts
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
     * Set texte
     *
     * @param string $texte
     *
     * @return SuiviFacts
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set factures
     *
     * @param \Commandes\CommandesBundle\Entity\Factures $factures
     *
     * @return SuiviFacts
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
     * Set par
     *
     * @param string $par
     *
     * @return SuiviFacts
     */
    public function setPar($par)
    {
        $this->par = $par;

        return $this;
    }

    /**
     * Get par
     *
     * @return string
     */
    public function getPar()
    {
        return $this->par;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return SuiviFacts
     */
    public function setDate($date)
    {

        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return SuiviFacts
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
     * Set prix
     *
     * @param string $prix
     *
     * @return SuiviFacts
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set proformas
     *
     * @param \Commandes\CommandesBundle\Entity\Proformas $proformas
     *
     * @return SuiviFacts
     */
    public function setProformas(\Commandes\CommandesBundle\Entity\Proformas $proformas = null)
    {
        $this->proformas = $proformas;

        return $this;
    }

    /**
     * Get proformas
     *
     * @return \Commandes\CommandesBundle\Entity\Proformas
     */
    public function getProformas()
    {
        return $this->proformas;
    }

    /**
     * Set recus
     *
     * @param \Commandes\CommandesBundle\Entity\Recus $recus
     *
     * @return SuiviFacts
     */
    public function setRecus(\Commandes\CommandesBundle\Entity\Recus $recus = null)
    {
        $this->recus = $recus;

        return $this;
    }

    /**
     * Get recus
     *
     * @return \Commandes\CommandesBundle\Entity\Recus
     */
    public function getRecus()
    {
        return $this->recus;
    }

    /**
     * Set devis
     *
     * @param \Commandes\CommandesBundle\Entity\Devis $devis
     *
     * @return SuiviFacts
     */
    public function setDevis(\Commandes\CommandesBundle\Entity\Devis $devis = null)
    {
        $this->devis = $devis;

        return $this;
    }

    /**
     * Get devis
     *
     * @return \Commandes\CommandesBundle\Entity\Devis
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * Set bonscommandes
     *
     * @param \Commandes\CommandesBundle\Entity\Bonscommandes $bonscommandes
     *
     * @return SuiviFacts
     */
    public function setBonscommandes(\Commandes\CommandesBundle\Entity\Bonscommandes $bonscommandes = null)
    {
        $this->bonscommandes = $bonscommandes;

        return $this;
    }

    /**
     * Get bonscommandes
     *
     * @return \Commandes\CommandesBundle\Entity\Bonscommandes
     */
    public function getBonscommandes()
    {
        return $this->bonscommandes;
    }

    /**
     * Set depenses
     *
     * @param \Commandes\CommandesBundle\Entity\Depenses $depenses
     *
     * @return SuiviFacts
     */
    public function setDepenses(\Commandes\CommandesBundle\Entity\Depenses $depenses = null)
    {
        $this->depenses = $depenses;

        return $this;
    }

    /**
     * Get depenses
     *
     * @return \Commandes\CommandesBundle\Entity\Depenses
     */
    public function getDepenses()
    {
        return $this->depenses;
    }

    /**
     * Set commandescafes
     *
     * @param \Commandes\CommandesBundle\Entity\Commandescafes $commandescafes
     *
     * @return SuiviFacts
     */
    public function setCommandescafes(\Commandes\CommandesBundle\Entity\Commandescafes $commandescafes = null)
    {
        $this->commandescafes = $commandescafes;

        return $this;
    }

    /**
     * Get commandescafes
     *
     * @return \Commandes\CommandesBundle\Entity\Commandescafes
     */
    public function getCommandescafes()
    {
        return $this->commandescafes;
    }
}
