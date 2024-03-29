<?php

namespace Commandes\CommandesBundle\Repository;

/**
 * DepartementsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DepartementsRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByUser($user)
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')
            ->Where('u.user = :user')

            ->setParameter('user', $user);
        return $qb->getQuery()->getResult();
    }

    public function findByLastId($user)
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')
            ->Where('u.user = :user')
            ->orderBy('u.id', 'DESC')
            ->setMaxResults(1)
            ->setParameter('user', $user)
            ;

        return $qb->getQuery()->getResult();
    }
}
