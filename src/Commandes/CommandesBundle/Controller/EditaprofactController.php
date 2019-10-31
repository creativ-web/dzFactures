<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Departements;
use Commandes\CommandesBundle\Entity\Factures;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Facture controller.
 *
 */
class EditaprofactController extends Controller
{
    /**
     * Lists all facture entities by type.
     *
     */
    public function editaprofactAction(Request $request, $prod, $qte, $facture)
    {

        $em = $this->getDoctrine()->getManager();
        $apros = $em->getRepository('CommandesBundle:Aprofact')->findOneBy(array('produits'=>$prod, 'factures'=>$facture));

        if($apros){
            $qb = $em->createQueryBuilder();
            $q = $qb->update('CommandesBundle:AproFact', 'u')
                ->set('u.qte', '?1')
                ->where('u.produits = ?14')
                ->andWhere('u.zone = ?3')

                ->setParameter(1,$qte)
                ->setParameter(14,$prod)
                ->getQuery();
            $p = $q->execute();

        }
        else{
            $aprodoc = new Aprofact();
            $aprodoc->setProduits($prod);
            $aprodoc->setQte($qte );
            $aprodoc->setFactures($facture);
            $em->persist($aprodoc);
            $em->flush();

        }

    }



}
