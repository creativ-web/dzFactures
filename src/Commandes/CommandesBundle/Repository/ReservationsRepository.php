<?php

namespace Commandes\CommandesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ReservationsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */

class ReservationsRepository extends EntityRepository
{
    public function idfact()
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')
            ->orderBy('u.id', 'DESC')
            ->setMaxResults(1);

        return $qb->getQuery()->getResult();
    }
}