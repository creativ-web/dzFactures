<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Achats;
use Commandes\CommandesBundle\Entity\Stocks;
use Commandes\CommandesBundle\Entity\Tva;
use Commandes\CommandesBundle\Entity\Fournisseurs;
use Commandes\CommandesBundle\Entity\Zonnestocks;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Achat controller.
 *
 */
class AchatsController extends Controller
{
    /**
     * Lists all achat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $achats = $em->getRepository('CommandesBundle:Achats')->findAll();

        return $this->render('achats/index.html.twig', array(
            'achats' => $achats,
        ));
    }

    /**
     * Creates a new achat entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $produitsList = $em->getRepository('CommandesBundle:Produits')->findAll();
        $achat = new Achats();
        $form = $this->createForm('Commandes\CommandesBundle\Form\AchatsType', $achat);
        $form->handleRequest($request);
        $produits = $em->getRepository('CommandesBundle:Produits')->findByName($achat->getName());
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();


            foreach($produits as $produit)
            {
                $achat->setFamilles($produit->getFamilles());
                $achat->setReference($produit->getReference());
                $achat->setBarcode($produit->getBarcode());

            }

            $stock = new Stocks();
            $stock->setName($achat->getName());
            $stock->setPrixHT($achat->getPrixHTachat());
            $stock->setQte($achat->getQte());
            $stock->setQtealert($achat->getQteLimite());
            $stock->setDatentrer($achat->getDateentrer());
            $stock->setDatexp($achat->getDateexpire());
            $stock->setDatexpAlert($achat->getDateexpireAlert());
            $stock->setTva($achat->getTva());
            $stock->setPrixHTachat($achat->getPrixHTachat());
            $stock->setPrixTTCachat($achat->getPrixTTCachat());
            $stock->setPrixHTvente($achat->getPrixHTvente());
            $stock->setPrixTTCvente($achat->getPrixHTvente());
            $stock->setFournisseurs($achat->getFournisseurs());
            $stock->setZonnestocks($achat->getZonnestocks());


            foreach($produits as $produit)
            {
                $stock->setFamilles($produit->getFamilles());
                $stock->setReference($produit->getReference());
                $stock->setBarcode($produit->getBarcode());

            }

            $em->persist($achat);
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('admin_achats_show', array(
                'id' => $achat->getId()
            ));
        }



        $tva = new Tva();
        $formTVA = $this->createForm('Commandes\CommandesBundle\Form\TvaType', $tva);
        $formTVA->handleRequest($request);
        if ($formTVA->isSubmitted() && $formTVA->isValid()) {


            $tva->setNom($tva->getValeur().'%');
            $tva->setMultiplicate($tva->getValeur());
            $tva->setValeur($tva->getValeur());
            $em = $this->getDoctrine()->getManager();
            $em->persist($tva);
            $em->flush();

            return $this->redirectToRoute('admin_achats_new');
        }
        $fournisseur = new Fournisseurs();
        $formFOURNISSEUR = $this->createForm('Commandes\CommandesBundle\Form\FournisseursType', $fournisseur);
        $formFOURNISSEUR->handleRequest($request);
        if ($formFOURNISSEUR->isSubmitted() && $formFOURNISSEUR->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($fournisseur);
            $em->flush();

            return $this->redirectToRoute('admin_achats_new');
        }



        $zone = new Zonnestocks();
        $formZONE = $this->createForm('Commandes\CommandesBundle\Form\ZonesType', $zone);
        $formZONE->handleRequest($request);
        if ($formZONE->isSubmitted() && $formZONE->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($zone);
            $em->flush();

            return $this->redirectToRoute('admin_achats_new');
        }

        return $this->render('achats/new.html.twig', array(
            'achat' => $achat,
            'produitsList' => $produitsList,

            'form' => $form->createView(),
            'formTVA' => $formTVA->createView(),
            'formFOURNISSEUR' => $formFOURNISSEUR->createView(),
            'formZONE' => $formZONE->createView(),
        ));
    }

    /**
     * Finds and displays a achat entity.
     *
     */
    public function showAction(Achats $achat)
    {
        $deleteForm = $this->createDeleteForm($achat);

        return $this->render('achats/show.html.twig', array(
            'achat' => $achat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing achat entity.
     *
     */
    public function editAction(Request $request, Achats $achat)
    {
        $deleteForm = $this->createDeleteForm($achat);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\AchatsType', $achat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_achats_edit', array('id' => $achat->getId()));
        }

        return $this->render('achats/edit.html.twig', array(
            'achat' => $achat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a achat entity.
     *
     */
    public function deleteAction(Request $request, Achats $achat)
    {
        $form = $this->createDeleteForm($achat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($achat);
            $em->flush();
        }

        return $this->redirectToRoute('admin_achats_index');
    }

    /**
     * Creates a form to delete a achat entity.
     *
     * @param Achats $achat The achat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Achats $achat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_achats_delete', array('id' => $achat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }




    public function cttcAction($tvaid, $ht)
    {
        if($tvaid && $ht){
            $em = $this->getDoctrine()->getManager();
            $tva  = $em->getRepository('CommandesBundle:Tva')->findById($tvaid);
            foreach($tva as $tva)
            {
              $val= $tva->getValeur();
            }
            $TVA = $val / 100;
            $TTC =  $ht * $TVA + $ht;

            $response = new JsonResponse();
            $response->setContent(json_encode($TTC));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array('TTC'=>$TTC));
        }else{
            return $this->redirectToRoute('admin_achats_new');
        }


    }
    public function chtAction($tvaid, $ttc)
    {
        if($tvaid && $ttc){
            $em = $this->getDoctrine()->getManager();
            $tva  = $em->getRepository('CommandesBundle:Tva')->findById($tvaid);
            foreach($tva as $tva)
            {
                $val= $tva->getValeur();
            }
            $TVA = $val / 100 + 1;
            $HT =  $ttc / $TVA;

            $response = new JsonResponse();
            $response->setContent(json_encode($HT));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array('HT'=>$HT));
        }else{
            return $this->redirectToRoute('admin_achats_new');
        }


    }
}
