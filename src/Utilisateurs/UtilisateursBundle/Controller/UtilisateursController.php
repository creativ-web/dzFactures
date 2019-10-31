<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UtilisateursController extends Controller
{
    public function villesAction(Request $request,$cp) 
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $villeCodePostal = $em->getRepository('CommandesBundle:Villes')->findBy(array('villeCodePostal' => $cp));

            if ($villeCodePostal) {
                $villes = array();
                foreach($villeCodePostal as $ville) {
                    $villes[] = $ville->getVilleNom();
                }
            } else {
                $ville = null;
            }

            $response = new JsonResponse();
            return $response->setData(array('ville' => $villes));
        } else {
            throw new \Exception('Erreur');
        }
    }
    
    public function facturesAction()
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $factures = $em->getRepository('CommandesBundle:Commandes')->byFacture($this->getUser());

        $familles  = $em->getRepository('CommandesBundle:Familles')->findAll();

        if ($session->has('achats'))
            $panier = $session->get('achats');
        else
            $panier = false;


        if (!$session->has('achats'))
            $articles = 0;
        else
            $articles = count($session->get('achats'));
        return $this->render('UtilisateursBundle:Default:layout/facture.html.twig', array(
            'factures' => $factures,
            'familles' => $familles,
            'achats' =>  $panier,
            'articles' =>  $articles

        ));
    }
    
    public function facturesPDFAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('CommandesBundle:Commandes')->findOneBy(array('utilisateur' => $this->getUser(),
                                                                                     'valider' => 1,
                                                                                     'id' => $id));
        
        if (!$facture) {
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirect($this->generateUrl('facutres'));
        }
        
        $this->container->get('setNewFacture')->facture($facture)->Output('commande.pdf');
         
        $response = new Response();
        $response->headers->set('Content-type' , 'application/pdf');
        
        return $response;
    }
}
