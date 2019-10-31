<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diffprix
 *
 * @ORM\Table(name="diffprix")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\DiffprixRepository")
 */
class Diffprix
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
     * @ORM\ManyToOne(targetEntity="Zonnestocks", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $zonnestocks;

    /**
     * @var float
     *
     * @ORM\Column(name="puHT", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $puHT;


    /**
     * @var float
     *
     * @ORM\Column(name="puTTC", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $puTTC;




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
     * Set puHT
     *
     * @param string $puHT
     *
     * @return Diffprix
     */
    public function setPuHT($puHT)
    {
        $this->puHT = $puHT;

        return $this;
    }

    /**
     * Get puHT
     *
     * @return string
     */
    public function getPuHT()
    {
        return $this->puHT;
    }

    /**
     * Set puTTC
     *
     * @param string $puTTC
     *
     * @return Diffprix
     */
    public function setPuTTC($puTTC)
    {
        $this->puTTC = $puTTC;

        return $this;
    }

    /**
     * Get puTTC
     *
     * @return string
     */
    public function getPuTTC()
    {
        return $this->puTTC;
    }




    /**
     * Set zonnestocks
     *
     * @param \Commandes\CommandesBundle\Entity\Zonnestocks $zonnestocks
     *
     * @return Diffprix
     */
    public function setZonnestocks(\Commandes\CommandesBundle\Entity\Zonnestocks $zonnestocks)
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


}
