<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Documents;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Document controller.
 *
 */
class DocumentsController extends Controller
{
    /**
     * Lists all document entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('Commandes\CommandesBundle\Form\FiltreDocsType');
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->get('type')->getData();
            $periode = $form->get('periode')->getData();
            $du = $form->get('du')->getData();
            $au = $form->get('au')->getData();
            $valzone = $form->get('valzone')->getData();
            $zone = $valzone;
            $user = $this->getUser();

            $mot = $form->get('mot')->getData();

            if ($periode == 'last_12_months') {
                $du = new \DateTime('now -12 month');
                $au = new \DateTime('now');
            } else if ($periode == 'this_month') {
                $du = new \DateTime('first day of this month');
                $au = new \DateTime('last day of this month');

            } else if ($periode == 'last_30_days') {
                $du = new \DateTime('now -12 day');
                $au = new \DateTime('now');

            } else if ($periode == 'last_month') {
                $du = new \DateTime('first day of first month ');
                $au = new \DateTime('last day of first month');

            } else if ($periode == 'this_year') {
                $du = new \DateTime('first day of this year');
                $au = new \DateTime('last day of this year');

            } else if ($periode == 'last_year') {
                $du = new \DateTime('first day of -1 year');
                $au = new \DateTime('last day of last month this year -1');

            } else if ($periode == 'more') {
                $type = $form->get('type')->getData();
                $etat = $form->get('etat')->getData();

            } else if ($periode == 'tous') {
                $du = new \DateTime('first day of -1 year');
                $au = new \DateTime('last day of +1 year');

            }


        }
        $bes = $em->getRepository('CommandesBundle:Bes')->findBy(array('user'=>$this->getUser()));
        $bls = $em->getRepository('CommandesBundle:Bls')->findBy(array('user'=>$this->getUser()));
        $bcs = $em->getRepository('CommandesBundle:Bcs')->findBy(array('user'=>$this->getUser()));
        $reservations = $em->getRepository('CommandesBundle:Reservations')->findBy(array('user'=>$this->getUser()));
        $pis = $em->getRepository('CommandesBundle:Pis')->findBy(array('user'=>$this->getUser()));
        $cis = $em->getRepository('CommandesBundle:Cis')->findBy(array('user'=>$this->getUser()));
        $bts = $em->getRepository('CommandesBundle:Bts')->findBy(array('user'=>$this->getUser()));
        return $this->render('documents/index.html.twig', array(
            'bes' => $bes,
            'form' => $form->createView(),
            'bls' => $bls,
            'reservations' => $reservations,
            'bcs' => $bcs,
            'pis' => $pis,
            'cis' => $cis,
            'bts' => $bts,

        ));
    }

    /**
     * Creates a new document entity.
     *
     */
    public function newAction(Request $request, $f)
    {
        if($f == 'be'){
            $em = $this->getDoctrine()->getManager();
            $nf = $em->getRepository('CommandesBundle:Documents')->idfact();
            $document = new documents();
            $form = $this->createForm('Commandes\CommandesBundle\Form\BeType', $document);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                if($document->getDepartements()->getId()){
                    $qb = $em->createQueryBuilder();
                    $q = $qb->update('CommandesBundle:Departements', 'u')

                        ->set('u.nom','?1')
                        ->set('u.adresse','?2')
                        ->set('u.nifselect','?3')
                        ->set('u.nif','?4')
                        ->set('u.codepostal','?5')
                        ->set('u.ville','?6')
                        ->set('u.iban','?7')
                        ->set('u.banque','?8')
                        ->set('u.bic','?9')
                        ->set('u.email','?10')
                        ->set('u.siteweb','?11')
                        ->set('u.fax','?12')
                        ->set('u.telephone','?13')

                        ->where('u.id = ?14')

                        ->setParameter(1, $document->getDepartements()->getNom())
                        ->setParameter(2, $document->getDepartements()->getAdresse())
                        ->setParameter(3, $document->getDepartements()->getNifselect())
                        ->setParameter(4, $document->getDepartements()->getNif())
                        ->setParameter(5, $document->getDepartements()->getCodepostal())
                        ->setParameter(6, $document->getDepartements()->getVille())
                        ->setParameter(7, $document->getDepartements()->getIban())
                        ->setParameter(8, $document->getDepartements()->getBanque())
                        ->setParameter(9, $document->getDepartements()->getBic())
                        ->setParameter(10, $document->getDepartements()->getEmail())
                        ->setParameter(11, $document->getDepartements()->getSiteweb())
                        ->setParameter(12, $document->getDepartements()->getFax())
                        ->setParameter(13, $document->getDepartements()->getTelephone())
                        ->setParameter(14, $document->getDepartements()->getId())


                        ->getQuery();
                    $p = $q->execute();
                    $document->setDepartements($document->getDepartements()->getId());
                }
                if($document->getAcheteur()->getId()){
                    $qb = $em->createQueryBuilder();
                    $q = $qb->update('CommandesBundle:Acheteurs', 'u')

                        ->set('u.nom','?1')
                        ->set('u.adresse','?2')
                        ->set('u.nifselect','?3')
                        ->set('u.nif','?4')
                        ->set('u.codepostal','?5')
                        ->set('u.ville','?6')
                        ->set('u.email','?10')
                        ->set('u.siteweb','?11')
                        ->set('u.fax','?12')
                        ->set('u.telephone','?13')

                        ->where('u.id = ?14')

                        ->setParameter(1, $document->getAcheteur()->getNom())
                        ->setParameter(2, $document->getAcheteur()->getAdresse())
                        ->setParameter(3, $document->getAcheteur()->getNifselect())
                        ->setParameter(4, $document->getAcheteur()->getNif())
                        ->setParameter(5, $document->getAcheteur()->getCodepostal())
                        ->setParameter(6, $document->getAcheteur()->getVille())
                        ->setParameter(10, $document->getAcheteur()->getEmail())
                        ->setParameter(11, $document->getAcheteur()->getSiteweb())
                        ->setParameter(12, $document->getAcheteur()->getFax())
                        ->setParameter(13, $document->getAcheteur()->getTelephone())
                        ->setParameter(14, $document->getAcheteur()->getId())


                        ->getQuery();
                    $p = $q->execute();
                    $document->setAcheteur($document->getAcheteur()->getId());
                }

                if($document->getAchats()){



                    $questionForms = $form->get('achats');
                    $qte=0;
                    foreach ($questionForms as $questionForm)
                    {
                        $qte = $qte + $questionForm->get('qte')->getData();
                        $id = $questionForm->get('produits')->getData();

                    }

                    $qb = $em->createQueryBuilder();
                    $q = $qb->update('CommandesBundle:Produits', 'u')

                        ->set('u.qte','u.qte + ?1')

                        ->where('u.id = ?14')

                        ->setParameter(1,$qte)

                        ->setParameter(14,$id)

                        ->getQuery();
                    $p = $q->execute();


                }


                $document->setType($document->getType());
                $document->setNf($document->getNf());
                $document->setLieu($document->getLieu());
                $document->setAdditionnelle($document->getAdditionnelle());
                $document->setDateadd($document->getDateadd());



                $em->persist($document);


                $em->flush();

                return $this->redirectToRoute('admin_documents_show', array('id' => $document->getId()));

        }



            $produitsList = $em->getRepository('CommandesBundle:Produits')->findAll();

            return $this->render('documents/new.html.twig', array(
                'document' => $document,
                'produitsList' => $produitsList,
                'form' => $form->createView(),
                'nf' => $nf,
            ));
        }



        if($f == 'bl'){
            $em = $this->getDoctrine()->getManager();
            $nf = $em->getRepository('CommandesBundle:Documents')->idfact();
            $document = new documents();
            $form = $this->createForm('Commandes\CommandesBundle\Form\BeType', $document);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                if($document->getDepartements()->getId()){
                    $qb = $em->createQueryBuilder();
                    $q = $qb->update('CommandesBundle:Departements', 'u')

                        ->set('u.nom','?1')
                        ->set('u.adresse','?2')
                        ->set('u.nifselect','?3')
                        ->set('u.nif','?4')
                        ->set('u.codepostal','?5')
                        ->set('u.ville','?6')
                        ->set('u.iban','?7')
                        ->set('u.banque','?8')
                        ->set('u.bic','?9')
                        ->set('u.email','?10')
                        ->set('u.siteweb','?11')
                        ->set('u.fax','?12')
                        ->set('u.telephone','?13')

                        ->where('u.id = ?14')

                        ->setParameter(1, $document->getDepartements()->getNom())
                        ->setParameter(2, $document->getDepartements()->getAdresse())
                        ->setParameter(3, $document->getDepartements()->getNifselect())
                        ->setParameter(4, $document->getDepartements()->getNif())
                        ->setParameter(5, $document->getDepartements()->getCodepostal())
                        ->setParameter(6, $document->getDepartements()->getVille())
                        ->setParameter(7, $document->getDepartements()->getIban())
                        ->setParameter(8, $document->getDepartements()->getBanque())
                        ->setParameter(9, $document->getDepartements()->getBic())
                        ->setParameter(10, $document->getDepartements()->getEmail())
                        ->setParameter(11, $document->getDepartements()->getSiteweb())
                        ->setParameter(12, $document->getDepartements()->getFax())
                        ->setParameter(13, $document->getDepartements()->getTelephone())
                        ->setParameter(14, $document->getDepartements()->getId())


                        ->getQuery();
                    $p = $q->execute();
                    $document->setDepartements($document->getDepartements()->getId());
                }
                if($document->getAcheteur()->getId()){
                    $qb = $em->createQueryBuilder();
                    $q = $qb->update('CommandesBundle:Acheteurs', 'u')

                        ->set('u.nom','?1')
                        ->set('u.adresse','?2')
                        ->set('u.nifselect','?3')
                        ->set('u.nif','?4')
                        ->set('u.codepostal','?5')
                        ->set('u.ville','?6')
                        ->set('u.email','?10')
                        ->set('u.siteweb','?11')
                        ->set('u.fax','?12')
                        ->set('u.telephone','?13')

                        ->where('u.id = ?14')

                        ->setParameter(1, $document->getAcheteur()->getNom())
                        ->setParameter(2, $document->getAcheteur()->getAdresse())
                        ->setParameter(3, $document->getAcheteur()->getNifselect())
                        ->setParameter(4, $document->getAcheteur()->getNif())
                        ->setParameter(5, $document->getAcheteur()->getCodepostal())
                        ->setParameter(6, $document->getAcheteur()->getVille())
                        ->setParameter(10, $document->getAcheteur()->getEmail())
                        ->setParameter(11, $document->getAcheteur()->getSiteweb())
                        ->setParameter(12, $document->getAcheteur()->getFax())
                        ->setParameter(13, $document->getAcheteur()->getTelephone())
                        ->setParameter(14, $document->getAcheteur()->getId())


                        ->getQuery();
                    $p = $q->execute();
                    $document->setAcheteur($document->getAcheteur()->getId());
                }

                if($document->getAchats()){



                    $questionForms = $form->get('achats');
                    $qte=0;
                    foreach ($questionForms as $questionForm)
                    {
                        $qte = $qte + $questionForm->get('qte')->getData();
                        $id = $questionForm->get('produits')->getData();

                    }

                    $qb = $em->createQueryBuilder();
                    $q = $qb->update('CommandesBundle:Produits', 'u')

                        ->set('u.qte','u.qte - ?1')

                        ->where('u.id = ?14')

                        ->setParameter(1,$qte)

                        ->setParameter(14,$id)

                        ->getQuery();
                    $p = $q->execute();


                }


                $document->setType($document->getType());
                $document->setNf($document->getNf());
                $document->setLieu($document->getLieu());
                $document->setAdditionnelle($document->getAdditionnelle());
                $document->setDateadd($document->getDateadd());



                $em->persist($document);


                $em->flush();

                return $this->redirectToRoute('admin_documents_show', array('id' => $document->getId()));

            }



            $produitsList = $em->getRepository('CommandesBundle:Produits')->findAll();

            return $this->render('documents/new.html.twig', array(
                'document' => $document,
                'produitsList' => $produitsList,
                'form' => $form->createView(),
                'nf' => $nf,
            ));
        }


    }

    /**
     * Finds and displays a document entity.
     *
     */
    public function showAction(Documents $document)
    {
        $deleteForm = $this->createDeleteForm($document);

        return $this->render('documents/show.html.twig', array(
            'document' => $document,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing document entity.
     *
     */
    public function editAction(Request $request, Documents $document)
    {
        $deleteForm = $this->createDeleteForm($document);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\DocumentsType', $document);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_documents_edit', array('id' => $document->getId()));
        }

        return $this->render('documents/edit.html.twig', array(
            'document' => $document,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a document entity.
     *
     */
    public function deleteAction(Request $request, Documents $document)
    {
        $form = $this->createDeleteForm($document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($document);
            $em->flush();
        }

        return $this->redirectToRoute('admin_documents_index');
    }

    /**
     * Creates a form to delete a document entity.
     *
     * @param Documents $document The document entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Documents $document)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_documents_delete', array('id' => $document->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function prodAction($prod,$qte,$tva,$tva2)
    {
        if($prod ){
            $em = $this->getDoctrine()->getManager();
            $produit  = $em->getRepository('CommandesBundle:Produits')->findById($prod);
            $tv  = $em->getRepository('CommandesBundle:Tva')->findById($tva);
            $tv2  = $em->getRepository('CommandesBundle:Tva')->findById($tva2);

            foreach($produit as $produit)
            {
                $val= $produit->getReference();
                $val2= $produit->getPuHT();
                $val3= $produit->getPuTTC();
                $val4= $produit->getPrixHT();
                $val5= $produit->getPrixTTC();

            }
            foreach($tv as $tv)
            {
                $tva= $tv->getValeur();
            }
            foreach($tv2 as $tv2)
            {
                $tva2= $tv2->getValeur();
            }
            $reference = $val;
            $puHT = $val2;
            $puTTC = $val3;
            $prixHT = $val4;
            $prixTTC = $val5;

            $totalHT = $val2 * $qte;

            $totalHTa = $val4 * $qte;

            $TVA = $tva / 100 ;

            $TVA2 = $tva2 / 100 ;



            $TTC = $totalHT * $TVA + $totalHT;

            $TTC2 = $totalHTa * $TVA2 + $totalHTa;

            $totalTVA = $totalHT * $TVA;
            $totalTVA2 = $totalHTa * $TVA2;

            $response = new JsonResponse();
            $response->setContent(json_encode($reference));

            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(
                'reference'=>$reference,'puHT'=>$puHT,'puTTC'=>$puTTC,'totalHT'=>$totalHT,'TTC'=>$TTC,'totalTVA'=>$totalTVA
            ,'prixHT'=>$prixHT,'prixTTC'=>$prixTTC,'totalHTa'=>$totalHTa,'TTC2'=>$TTC2,'totalTVA2'=>$totalTVA2
            ));
        }else{
            return $this->redirectToRoute('admin_documents_new');
        }


    }
    public function qteAction($qte,$pu,$tva,$totalht)
    {
        if($qte && $pu && $tva && $totalht ){
            $em = $this->getDoctrine()->getManager();
            $tv  = $em->getRepository('CommandesBundle:Tva')->findById($tva);

            foreach($tv as $tv)
            {
                $val= $tv->getValeur();
            }

            $totalHT = $pu * $qte;


            $TVA = $val / 100 ;


            $TTC = $totalHT * $TVA + $totalHT;

            $totalTVA = $totalHT * $TVA;



            $response = new JsonResponse();
            $response->setContent(json_encode($totalHT));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(
                'totalHT'=>$totalHT,'TTC'=>$TTC,'totalTVA'=>$totalTVA,


            ));
        }else{
            return $this->redirectToRoute('admin_documents_new');
        }
    }
}
