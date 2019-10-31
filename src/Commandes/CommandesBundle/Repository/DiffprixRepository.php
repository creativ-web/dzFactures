<?php

namespace Commandes\CommandesBundle\Repository;

/**
 * DiffprixRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DiffprixRepository extends \Doctrine\ORM\EntityRepository
{
    public function byproduit($produit)
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')
            ->where('u.produits = :prod')
            ->setParameter('prod', $produit);
        ;

        return $qb->getQuery()->getResult();
    }
}
