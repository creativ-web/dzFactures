<?php

namespace Commandes\CommandesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LogosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */

class LogosRepository extends EntityRepository
{
    public function findLast() {

        $qb = $this->createQueryBuilder('u')
            ->Select('u')
            ->orderBy('u.id', 'DESC')
            ->setMaxResults(1);
        return $qb->getQuery()->getResult();
    }
}
