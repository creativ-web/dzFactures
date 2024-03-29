<?php

namespace Commandes\CommandesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;


class PanierController extends Controller
{
    public function menuAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier'))
            $articles = 0;
        else
            $articles = count($session->get('panier'));

        return $this->render('CommandesBundle:Default:panier.html.twig', array('articles' => $articles));
    }

    public function supprimerAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }

        return $this->redirect($this->generateUrl('panier'));
    }

    public function ajouterAction($id)
    {
        $session = $this->getRequest()->getSession();

        if (!$session->has('panier')) $session->set('panier',array());
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier)) {
            if ($this->getRequest()->query->get('qte') != null) $panier[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
        } else {
            if ($this->getRequest()->query->get('qte') != null)
                $panier[$id] = $this->getRequest()->query->get('qte');
            else
                $panier[$id] = 1;

            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');
        }

        $session->set('panier',$panier);


        return $this->redirect($this->generateUrl('panier'));
    }

    public function panierAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier')) $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();

        $prepareCommande = $this->forward('CommandesBundle:Commandes:prepareCommande');
        $commande = $em->getRepository('CommandesBundle:Commandes')->find($prepareCommande->getContent());

        $produits = $em->getRepository('CommandesBundle:Produits')->findArray(array_keys($session->get('panier')));
        $familles  = $em->getRepository('CommandesBundle:Familles')->findAll();
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier'))
            $articles = 0;
        else
            $articles = count($session->get('panier'));
        return $this->render('CommandesBundle:Default:panier.html.twig', array(
            'produits' => $produits,
            'familles' => $familles,
            'articles' => $articles,
            'commande' => $commande,
            'panier' => $session->get('panier')));
    }


    public function validationAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier')) $session->set('panier', array());
        $em = $this->getDoctrine()->getManager();

        $prepareCommande = $this->forward('CommandesBundle:Commandes:prepareCommande');
        $commande = $em->getRepository('CommandesBundle:Commandes')->find($prepareCommande->getContent());


        $familles  = $em->getRepository('CommandesBundle:Familles')->findAll();

        $session = $this->getRequest()->getSession();
        if (!$session->has('panier'))
            $articles = 0;
        else
            $articles = count($session->get('panier'));
        return $this->render('CommandesBundle:Default:validation.html.twig', array(
            'commande' => $commande,
            'familles' => $familles,
            'articles' => $articles,

        ));
    }



}
