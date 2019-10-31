<?php

namespace Commandes\CommandesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * stocks
 *
 * @ORM\Table("stocks")
 * @ORM\Entity(repositoryClass="Commandes\CommandesBundle\Repository\StocksRepository")
 */
class Stocks
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;




}
