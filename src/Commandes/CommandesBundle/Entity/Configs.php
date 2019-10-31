<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configs
 *
 * @ORM\Table(name="configs")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\ConfigsRepository")
 */
class Configs
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
     * @var string
     *
     * @ORM\Column(name="configname", type="string", length=255, nullable=true)
     */
    private $configname;



    /**
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     *
     * @ORM\OneToOne(targetEntity="Sectiondocs")
     * @ORM\JoinColumn(name="sectiondoc_id", referencedColumnName="id")
     */
    private $sectionDocuments;

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
     * Set configname
     *
     * @param string $configname
     *
     * @return Configs
     */
    public function setConfigname($configname)
    {
        $this->configname = $configname;

        return $this;
    }

    /**
     * Get configname
     *
     * @return string
     */
    public function getConfigname()
    {
        return $this->configname;
    }



    /**
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Configs
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
     * @param \Commandes\CommandesBundle\Entity\Sectiondocs $sectionDocuments
     *
     * @return Configs
     */
    public function setSectionDocuments(\Commandes\CommandesBundle\Entity\Sectiondocs $sectionDocuments = null)
    {
        $this->sectionDocuments = $sectionDocuments;

        return $this;
    }

    /**
     * Get sectionDocuments
     *
     * @return \Commandes\CommandesBundle\Entity\Sectiondocs
     */
    public function getSectionDocuments()
    {
        return $this->sectionDocuments;
    }
}
