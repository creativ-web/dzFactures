<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParamGestions
 *
 * @ORM\Table(name="paramettres")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\ParamettresRepository")
 */
class Paramettres
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
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Sectiondocs", inversedBy="parametres", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $sectionDocuments;

    /**
     * @ORM\OneToOne(targetEntity="Logos", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $logos;


    /**
     * @ORM\OneToOne(targetEntity="Cachets", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $cachets;


    /**
     * @ORM\ManyToOne(targetEntity="Paramgestions", inversedBy="parametres", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $paramGestion;

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
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     * @return Paramettres
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
     * Set sectionDocuments
     *
     * @param \Commandes\CommandesBundle\Entity\sectiondocuments $sectionDocuments
     * @return Paramettres
     */
    public function setSectionDocuments(\Commandes\CommandesBundle\Entity\Sectiondocs $sectionDocuments = null)
    {
        $this->sectionDocuments = $sectionDocuments;

        return $this;
    }

    /**
     * Get sectionDocuments
     *
     * @return \Commandes\CommandesBundle\Entity\sectiondocuments 
     */
    public function getSectionDocuments()
    {
        return $this->sectionDocuments;
    }

    /**
     * Set logos
     *
     * @param \Commandes\CommandesBundle\Entity\Logos $logos
     * @return Paramettres
     */
    public function setLogos(\Commandes\CommandesBundle\Entity\Logos $logos = null)
    {
        $this->logos = $logos;

        return $this;
    }

    /**
     * Get logos
     *
     * @return \Commandes\CommandesBundle\Entity\Logos
     */
    public function getLogos()
    {
        return $this->logos;
    }

    /**
     * Set cachets
     *
     * @param \Commandes\CommandesBundle\Entity\Cachets $cachets
     * @return Paramettres
     */
    public function setCachets(\Commandes\CommandesBundle\Entity\Cachets $cachets = null)
    {
        $this->cachets = $cachets;

        return $this;
    }

    /**
     * Get cachets
     *
     * @return \Commandes\CommandesBundle\Entity\Cachets
     */
    public function getCachets()
    {
        return $this->cachets;
    }

    /**
     * Set paramGestion
     *
     * @param \Commandes\CommandesBundle\Entity\paramgestion $paramGestion
     * @return Paramettres
     */
    public function setParamGestion(\Commandes\CommandesBundle\Entity\Paramgestions $paramGestion = null)
    {
        $this->paramGestion = $paramGestion;

        return $this;
    }

    /**
     * Get paramGestion
     *
     * @return \Commandes\CommandesBundle\Entity\paramgestion 
     */
    public function getParamGestion()
    {
        return $this->paramGestion;
    }
}
