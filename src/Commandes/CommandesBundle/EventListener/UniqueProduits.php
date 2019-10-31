<?php

namespace Commandes\CommandesBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;

use Commandes\CommandesBundle\Entity\Produits;
use Commandes\CommandesBundle\Entity\Factures;

class UniqueProduits
{

    /**
     * This will be called on newly created entities
     */
    public function prePersist(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();

        // we're interested in Dishes only
        if ($entity instanceof Factures) {

            $entityManager = $args->getEntityManager();
            $ingredients = $entity->getProds();

            foreach($ingredients as $key => $ingredient){

                // let's check for existance of this ingredient
                $results = $entityManager->getRepository('Commandes\CommandesBundle\Entity\Produits')->findBy(array('name' => $ingredient->getName()), array('id' => 'ASC') );

                // if ingredient exists use the existing ingredient
                if (count($results) > 0){

                    $ingredients[$key] = $results[0];


                }

            }

        }

    }

    /**
     * Called on updates of existent entities
     *
     * New ingredients were already created and persisted (although not flushed)
     * so we decide now wether to add them to Dishes or delete the duplicated ones
     */
    public function preUpdate(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();

        // we're interested in Dishes only
        if ($entity instanceof Factures) {

            $entityManager = $args->getEntityManager();
            $ingredients = $entity->getProds();

            foreach($ingredients as $ingredient){

                // let's check for existance of this ingredient
                // find by name and sort by id keep the older ingredient first
                $results = $entityManager->getRepository('Commandes\CommandesBundle\Entity\Produits')->findBy(array('name' => $ingredient->getName()), array('id' => 'ASC') );

                // if ingredient exists at least two rows will be returned
                // keep the first and discard the second
                if (count($results) > 1){

                    $knownIngredient = $results[0];
                    $entity->addProd($knownIngredient);

                    // remove the duplicated ingredient
                    $duplicatedIngredient = $results[1];
                    $entityManager->remove($duplicatedIngredient);

                }else{

                    // ingredient doesn't exist yet, add relation
                    $entity->addProd($ingredient);

                }

            }

        }

    }

}