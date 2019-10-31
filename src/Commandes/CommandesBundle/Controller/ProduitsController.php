<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Produits;
use Commandes\CommandesBundle\Entity\Diffprix;
use Commandes\CommandesBundle\Entity\Lots;
use Commandes\CommandesBundle\Entity\Tva;
use Commandes\CommandesBundle\Entity\Aprodoc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Port\Csv\CsvReader;
use Port\Doctrine\DoctrineWriter;
use Port\Steps\StepAggregator;
use Port\Steps\Step\ValueConverterStep;
use Port\ValueConverter\DateTimeValueConverter;
use Port\Steps\Step\ConverterStep;
use Port\Excel\ExcelReader;

/**
 * Produit controller.
 */
class ProduitsController extends Controller
{
    /**
     * Lists all produit entities.
     *
     */
    public function indexAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('CommandesBundle:Produits')->findBy(array('activlot'=>1,'aff'=>1,'user'=>$this->getUser()));
        $produitsSanslots = $em->getRepository('CommandesBundle:Produits')->findBy(array('activlot'=>0,'aff'=>1,'user'=>$this->getUser()));


        $form = $this->createForm('Commandes\CommandesBundle\Form\SearchsProduitsType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $type = $form->get('type')->getData();
            $nature = $form->get('nature')->getData();
            $zone = $form->get('zone')->getData();
            $mot = $form->get('mot')->getData();


            if($zone == null){
                $user= $this->getUser();
                $produits = $em->getRepository('CommandesBundle:Produits')->search2($mot,$user);
                $produitsSanslots = $em->getRepository('CommandesBundle:Produits')->findBy(array('activlot'=>55,'user'=>$this->getUser()));

                return $this->render('produits/index.html.twig', array(
                    'produits' => $produits,
                    'produitsSanslots' => $produitsSanslots,
                    'form' => $form->createView(),
                ));
            }


            $produits = $em->getRepository('CommandesBundle:Produits')->search($mot,$zone);

        }
        return $this->render('produits/index.html.twig', array(
            'produits' => $produits,
            'produitsSanslots' => $produitsSanslots,

            'lot' => $produits,
            'form' => $form->createView(),

        ));
    }



    /**
     * Creates a new produit entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $zones= $em->getRepository('CommandesBundle:Zonnestocks')->findBy(array('user'=>$this->getUser()));

        $produit = new Produits();
        $form = $this->createForm('Commandes\CommandesBundle\Form\ProduitsType', $produit);
        $form->handleRequest($request);
        $file = $produit->getImages();


        if ($form->isSubmitted() && $form->isValid()) {


            $questionForms3 = $produit->getLots();
            if($form->get('activlot')->getData()){
                foreach ($questionForms3 as $questionForm3)
                {
                    $lot = new Lots();

                    $prod = $questionForm3->getProduits();
                    $qtelot = $questionForm3->getQte();



                    $em->persist(
                        $lot->setProduits($prod),
                        $lot->setQte($qtelot)


                    );
                    $em->flush();

                }


            }
            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $produit->setImages($file);

            $em = $this->getDoctrine()->getManager();
            $produit->setName($form->get('name')->getData());
            $produit->setReference($form->get('reference')->getData());
            $produit->setPuHT($form->get('puHT')->getData());
            $produit->setPuTTC($form->get('puTTC')->getData());
            $produit->setTva($form->get('tva')->getData());
            $produit->setTva2($form->get('tva2')->getData());

            $produit->setAff(1);
            if($form->get('prixHT')->getData()){
                $produit->setPrixHt($form->get('prixHT')->getData());
            }else{
                $produit->setPrixHt(0);
            }
            if($form->get('prixTTC')->getData()){
                $produit->setPrixTTC($form->get('prixTTC')->getData());
            }else{
                $produit->setPrixTTC(0);
            }



            $produit->setUnite($form->get('unite')->getData());
            $produit->setQtedefault($form->get('qtedefault')->getData());
            $produit->setUser($this->getUser());
            $produit->setImages($form->get('images')->getData());
            $produit->setActivlot($form->get('activlot')->getData());
            $produit->setCategories($form->get('categories')->getData());
            if($form->get('activlot')->getData()){
                $produit->setAfterjoint(0);
            }else{
                $produit->setAfterjoint(3);
            }


            $em->persist($produit);
            $em->flush();



            return $this->redirectToRoute('admin_produits_show', array('id' => $produit->getId()));
        }


        return $this->render('produits/new.html.twig', array(

            'produit' => $produit,

            'form' => $form->createView(),
            'zones' => $zones,


        ));
    }
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
    protected function getBarcodeCachePath($public = false)
    {

        return (!$public) ? __DIR__.'/../../../../web/upload/barcode/cache' : '/upload/barcode/';
    }
    /**
     * Finds and displays a produit entity.
     *
     */
    public function showAction(Produits $produit)
    {

        $em = $this->getDoctrine()->getManager();

        $aprodoc= $em->getRepository('CommandesBundle:Aprodoc')->findByProd($produit);

        $aprofact= $em->getRepository('CommandesBundle:Aprofact')->findByProd($produit);

        return $this->render('produits/show.html.twig', array(
            'produit' => $produit,
            'aprodoc' => $aprodoc,
            'aprofact' => $aprofact,


        ));
    }

    /**
     * Displays a form to edit an existing produit entity.
     */
    public function editAction(Request $request, Produits $produit)
    {
        $em = $this->getDoctrine()->getManager();

        $stocks= $em->getRepository('CommandesBundle:Zonnestocks')->findAll();
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\ProduitsType', $produit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $this->getDoctrine()->getManager()->flush();


            return $this->redirectToRoute('admin_produits_show', array('id' => $produit->getId()));
        }

        return $this->render('produits/edit.html.twig', array(
            'produit' => $produit,
            'edit_form' => $editForm->createView(),

            'stocks' => $stocks,


        ));
    }

    /**
     * Deletes a produit entity.
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $em->getRepository('CommandesBundle:Produits')->delete($id);

        return $this->redirectToRoute('admin_produits_index');
    }


    public function cttcAction($tvaid, $ht)
    {

        $em = $this->getDoctrine()->getManager();
        $taxes= $em->getRepository('CommandesBundle:Tva')->findById($tvaid);
        foreach ($taxes as $taxe){

            $Tax = $taxe->getValeur();
        }

        if($tvaid && $ht){
            $TVA = $Tax / 100;
            $TTC =  $TVA * $ht  + $ht;

            $response = new JsonResponse();
            $response->setContent(json_encode($TTC));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array('TTC'=>$TTC));
        }else{
            return $this->redirectToRoute('admin_produits_new');
        }


    }
}
