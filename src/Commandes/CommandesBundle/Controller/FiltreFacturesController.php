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
class FiltreFacturesController extends Controller
{
    /**
     * Lists all facture entities by type.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $factures = $em->getRepository('CommandesBundle:Factures')->findAll();

        return $this->render('filtrefactures/index.html.twig', array(
            'factures' => $factures,
        ));
    }



}
