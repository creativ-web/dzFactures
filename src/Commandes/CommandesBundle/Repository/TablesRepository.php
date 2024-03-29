<?php

namespace Commandes\CommandesBundle\Repository;

/**
 * TablesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TablesRepository extends \Doctrine\ORM\EntityRepository
{
    public function search($mot,$zone)
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')
            ->where('u.name LIKE :value')
            ->andWhere('u.aff = 1 ')
            ->innerJoin('u.diffprix','p')

            ->andWhere('p.zonnestocks = :zone ')


            ->setParameter('value', '%'.$mot.'%')

            ->setParameter('zone',$zone)

        ;
        return $qb->getQuery()->getResult();
    }

    public function search2($mot)
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')
            ->where('u.name LIKE :value')
            ->andWhere('u.aff = 1 ')


            ->setParameter('value', '%'.$mot.'%')


        ;
        return $qb->getQuery()->getResult();
    }

    public function delete($id)
    {
        $qb = $this->createQueryBuilder('u')
            ->update()
            ->set('u.aff', '?1')
            ->where('u.id = :id')


            ->setParameter('1', 0)
            ->setParameter('id', $id)


        ;
        return $qb->getQuery()->getResult();
    }

    public function Name($nom)
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')
            ->where('u.name LIKE :value')


            ->setParameter('value', '%'.$nom.'%')



        ;
        return $qb->getQuery()->getArrayResult();
    }
}
