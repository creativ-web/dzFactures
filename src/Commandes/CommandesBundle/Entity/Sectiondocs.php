<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sectiondocs
 *
 * @ORM\Table(name="sectiondocs")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\SectiondocsRepository")
 */
class Sectiondocs
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
     * @var string
     *
     * @ORM\Column(name="default_tax", type="string", length=255, nullable=true)
     */
    private $defaultTax;

    /**
     * @var string
     *
     * @ORM\Column(name="invoice_tax_name", type="string", length=255, nullable=true)
     */
    private $invoiceTaxName;

    /**
     * @var string
     *
     * @ORM\Column(name="default_tax2", type="string", length=255, nullable=true)
     */
    private $defaultTax2;

    /**
     * @var string
     *
     * @ORM\Column(name="invoice_tax2_name", type="string", length=255, nullable=true)
     */
    private $invoiceTax2Name;

    /**
     * @var bool
     *
     * @ORM\Column(name="invoice_tax2_visible", type="boolean", nullable=true)
     */
    private $invoiceTax2Visible;

    /**
     * @var bool
     *
     * @ORM\Column(name="invoice_tax3_visible", type="boolean", nullable=true)
     */
    private $invoiceTax3Visible;

    /**
     * @var string
     *
     * @ORM\Column(name="default_tax3", type="string", length=255, nullable=true)
     */
    private $defaultTax3;

    /**
     * @var string
     *
     * @ORM\Column(name="invoice_tax3_name", type="string", length=255, nullable=true)
     */
    private $invoiceTax3Name;


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
     * Set defaultTax
     *
     * @param string $defaultTax
     *
     * @return Sectiondocs
     */
    public function setDefaultTax($defaultTax)
    {
        $this->defaultTax = $defaultTax;

        return $this;
    }

    /**
     * Get defaultTax
     *
     * @return string
     */
    public function getDefaultTax()
    {
        return $this->defaultTax;
    }

    /**
     * Set invoiceTaxName
     *
     * @param string $invoiceTaxName
     *
     * @return Sectiondocs
     */
    public function setInvoiceTaxName($invoiceTaxName)
    {
        $this->invoiceTaxName = $invoiceTaxName;

        return $this;
    }

    /**
     * Get invoiceTaxName
     *
     * @return string
     */
    public function getInvoiceTaxName()
    {
        return $this->invoiceTaxName;
    }

    /**
     * Set defaultTax2
     *
     * @param string $defaultTax2
     *
     * @return Sectiondocs
     */
    public function setDefaultTax2($defaultTax2)
    {
        $this->defaultTax2 = $defaultTax2;

        return $this;
    }

    /**
     * Get defaultTax2
     *
     * @return string
     */
    public function getDefaultTax2()
    {
        return $this->defaultTax2;
    }

    /**
     * Set invoiceTax2Name
     *
     * @param string $invoiceTax2Name
     *
     * @return Sectiondocs
     */
    public function setInvoiceTax2Name($invoiceTax2Name)
    {
        $this->invoiceTax2Name = $invoiceTax2Name;

        return $this;
    }

    /**
     * Get invoiceTax2Name
     *
     * @return string
     */
    public function getInvoiceTax2Name()
    {
        return $this->invoiceTax2Name;
    }

    /**
     * Set invoiceTax2Visible
     *
     * @param boolean $invoiceTax2Visible
     *
     * @return Sectiondocs
     */
    public function setInvoiceTax2Visible($invoiceTax2Visible)
    {
        $this->invoiceTax2Visible = $invoiceTax2Visible;

        return $this;
    }

    /**
     * Get invoiceTax2Visible
     *
     * @return bool
     */
    public function getInvoiceTax2Visible()
    {
        return $this->invoiceTax2Visible;
    }

    /**
     * Set invoiceTax3Visible
     *
     * @param boolean $invoiceTax3Visible
     *
     * @return Sectiondocs
     */
    public function setInvoiceTax3Visible($invoiceTax3Visible)
    {
        $this->invoiceTax3Visible = $invoiceTax3Visible;

        return $this;
    }

    /**
     * Get invoiceTax3Visible
     *
     * @return bool
     */
    public function getInvoiceTax3Visible()
    {
        return $this->invoiceTax3Visible;
    }

    /**
     * Set defaultTax3
     *
     * @param string $defaultTax3
     *
     * @return Sectiondocs
     */
    public function setDefaultTax3($defaultTax3)
    {
        $this->defaultTax3 = $defaultTax3;

        return $this;
    }

    /**
     * Get defaultTax3
     *
     * @return string
     */
    public function getDefaultTax3()
    {
        return $this->defaultTax3;
    }

    /**
     * Set invoiceTax3Name
     *
     * @param string $invoiceTax3Name
     *
     * @return Sectiondocs
     */
    public function setInvoiceTax3Name($invoiceTax3Name)
    {
        $this->invoiceTax3Name = $invoiceTax3Name;

        return $this;
    }

    /**
     * Get invoiceTax3Name
     *
     * @return string
     */
    public function getInvoiceTax3Name()
    {
        return $this->invoiceTax3Name;
    }

    /**
     * Set user
     *
     * @param \Commandes\CommandesBundle\Entity\User $user
     *
     * @return Sectiondocs
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
