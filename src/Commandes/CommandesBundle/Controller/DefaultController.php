<?php

namespace Commandes\CommandesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction( )
    {
        $user = $this->getUser();

        $dj = new \DateTime('today');
        $fj = new \DateTime('today');


        $ds = new \DateTime('today -7 day');
        $fs = new \DateTime('today');

        $dm = new \DateTime('first day of this month');
        $fm = new \DateTime('last day of this month');

        $da = new \DateTime('first day of this year');
        $fa = new \DateTime('last day of this year');
        $em = $this->getDoctrine()->getManager();
        $jours = $em->getRepository('CommandesBundle:Ventes')->findByJours($dj,$fj,$user);
        $semaines = $em->getRepository('CommandesBundle:Ventes')->findBySemaines($ds,$fs,$user);
        $mois = $em->getRepository('CommandesBundle:Ventes')->findByMois($dm,$fm,$user);
        $annees = $em->getRepository('CommandesBundle:Ventes')->findByAnnees($da,$fa,$user);
        $em = $this->getDoctrine()->getManager();



        $parametre = $em->getRepository('CommandesBundle:Paramettres')->findOneBy(array('user' => $this->getUser()));

        return $this->render('dashbord/index.html.twig', array(
            'parametre' => $parametre,
            'jours' => $jours,
            'semaines' => $semaines,
            'mois' => $mois,
            'annees' => $annees,
        ));

    }

}
