<?php

namespace Commandes\CommandesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Commandes\CommandesBundle\Entity\Commandes;
use Commandes\CommandesBundle\Entity\Produits;

class CommandesController extends Controller
{
    public function facture()
    {
        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();

        $panier = $session->get('panierAdmin');
        $commande = array();

        $produits = $em->getRepository('CommandesBundle:Stocks')->findArray(array_keys($session->get('panierAdmin')));

        foreach($produits as $produit)
        {

            $commande['produit'][$produit->getId()] = array('reference' => $produit->getName(),
                'quantite' => $panier[$produit->getId()],

               );
        }

        $commande['token'] = bin2hex($generator->nextBytes(20));

        return $commande;
    }

    public function prepareCommandeAction()
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        if (!$session->has('commande'))
            $commande = new Commandes();
        else
            $commande = $em->getRepository('CommandesBundle:Commandes')->find($session->get('commande'));

        $commande->setDate(new \DateTime());
        $commande->setUtilisateur($this->container->get('security.context')->getToken()->getUser());
        $commande->setValider(0);
        $commande->setReference(0);
        $commande->setCommande($this->facture());

        if (!$session->has('commande')) {
            $em->persist($commande);
            $session->set('commande',$commande);
        }

        $em->flush();

        return new Response($commande->getId());
    }

    /*
     * Cette methode remplace l'api banque.
     */
    public function validationCommandeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('CommandesBundle:Commandes')->find($id);

        if (!$commande || $commande->getValider() == 1)
            throw $this->createNotFoundException('La commande n\'existe pas');

        $commande->setValider(1);
        $commande->setReference($this->container->get('setNewReference')->reference()); //Service
        $em->flush();

        $session = $this->getRequest()->getSession();
        $session->remove('panier');
        $session->remove('commande');

        //Ici le mail de validation
        $message = \Swift_Message::newInstance()
            ->setSubject('Validation de votre commande')
            ->setFrom(array('contact@creativ-dz.com' => "Creativ Web"))
            ->setTo($commande->getUtilisateur()->getEmailCanonical())
            ->setCharset('utf-8')
            ->setContentType('text/html')
            ->setBody($this->renderView('CommandesBundle:Default:SwiftLayout/validationCommande.html.twig',array('utilisateur' => $commande->getUtilisateur())));

        $this->get('mailer')->send($message);

        $this->get('session')->getFlashBag()->add('success','Votre commande est validé avec succès');
        return $this->redirect($this->generateUrl('commandes_homepage'));
    }
}
