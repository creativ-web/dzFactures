<?php

namespace Commandes\CommandesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Commandes\CommandesBundle\Entity\Commandes;


class PanierAdminController extends Controller
{
    public function menuAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panierAdmin'))
            $articles = 0;
        else
            $articles = count($session->get('panier'));

        return $this->render('panier/panier.html.twig', array('articles' => $articles));
    }

    public function supprimerAdminAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panierAdmin');

        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panierAdmin',$panier);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }

        return $this->redirect($this->generateUrl('panierAdmin'));
    }

    public function ajouterAdminAction($id)
    {
        $session = $this->getRequest()->getSession();

        if (!$session->has('panierAdmin')) $session->set('panierAdmin',array());
        $panier = $session->get('panierAdmin');

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

        $session->set('panierAdmin',$panier);


        return $this->redirect($this->generateUrl('panierAdmin'));
    }

    public function panierAdminAction(Request $request)
    {
        $formPanier = $this->createForm('Commandes\CommandesBundle\Form\PanierType');
        $formPanier->handleRequest($request);

        if ($formPanier->isSubmitted() && $formPanier->isValid()) {


            return $this->redirectToRoute('adminPanier');
        }

        $formFacture = $this->createForm('Commandes\CommandesBundle\Form\FacturesType');
        $formFacture->handleRequest($request);

        if ($formFacture->isSubmitted() && $formFacture->isValid()) {


            return $this->redirectToRoute('adminPanier');
        }
        $formVendeur = $this->createForm('Commandes\CommandesBundle\Form\VendeurType');
        $formVendeur->handleRequest($request);

        if ($formVendeur->isSubmitted() && $formVendeur->isValid()) {


            return $this->redirectToRoute('adminPanier');
        }

        $formProfessionnel = $this->createForm('Commandes\CommandesBundle\Form\ProfessionnelType');
        $formProfessionnel->handleRequest($request);

        if ($formProfessionnel->isSubmitted() && $formProfessionnel->isValid()) {


            return $this->redirectToRoute('adminPanier');
        }

        $session = $this->getRequest()->getSession();
        if (!$session->has('panierAdmin')) $session->set('panierAdmin', array());

        $em = $this->getDoctrine()->getManager();

        $prepareCommande = $this->forward('CommandesBundle:Commandes:prepareCommande');
        $commande = $em->getRepository('CommandesBundle:Commandes')->find($prepareCommande->getContent());

        $listprods  = $em->getRepository('CommandesBundle:Stocks')->findBy(array(), array('id' => 'desc'));
        $produits = $em->getRepository('CommandesBundle:Stocks')->findArray(array_keys($session->get('panierAdmin')));
        $familles  = $em->getRepository('CommandesBundle:Familles')->findAll();
        $session = $this->getRequest()->getSession();
        if (!$session->has('panierAdmin'))
            $articles = 0;
        else
            $articles = count($session->get('panierAdmin'));
        return $this->render('panier/panier.html.twig', array(
            'formPanier' => $formPanier->createView(),
            'formFacture' => $formFacture->createView(),
            'formVendeur' => $formVendeur->createView(),
            'formProfessionnel' => $formProfessionnel->createView(),
            'produits' => $produits,
            'listprods' => $listprods,
            'familles' => $familles,
            'articles' => $articles,
            'commande' => $commande,
            'panier' => $session->get('panierAdmin')));
    }


    public function validationAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panierAdmin')) $session->set('panierAdmin', array());
        $em = $this->getDoctrine()->getManager();

        $prepareCommande = $this->forward('CommandesBundle:Commandes:prepareCommande');
        $commande = $em->getRepository('CommandesBundle:Commandes')->find($prepareCommande->getContent());


        $familles  = $em->getRepository('CommandesBundle:Familles')->findAll();

        $session = $this->getRequest()->getSession();
        if (!$session->has('panierAdmin'))
            $articles = 0;
        else
            $articles = count($session->get('panierAdmin'));
        return $this->render('panier/validation.html.twig', array(
            'commande' => $commande,
            'familles' => $familles,
            'articles' => $articles,

        ));
    }



}
