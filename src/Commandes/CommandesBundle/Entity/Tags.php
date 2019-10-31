<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 *
 * @ORM\Table("tags")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\TagsRepository")
 */
class Tags
{

    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    private $id;


    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    public function __toString()
    {
        return $this->nom;
    }



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

}
