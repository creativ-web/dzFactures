<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Bes;
use Commandes\CommandesBundle\Entity\Aprodoc;
use Commandes\CommandesBundle\Entity\Aprofact;
use Commandes\CommandesBundle\Entity\Produits;
use Commandes\CommandesBundle\Entity\Departements;
use Commandes\CommandesBundle\Entity\Acheteurs;
use Commandes\CommandesBundle\Entity\Lots;
use Commandes\CommandesBundle\Entity\Achats;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Be controller.
 *
 */
class BesController extends Controller
{
    /**
     * Lists all be entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bes = $em->getRepository('CommandesBundle:Bes')->findBy(array('user'=>$this->getUser()));

        return $this->render('bes/index.html.twig', array(
            'bes' => $bes,
        ));
    }

    /**
     * Creates a new be entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nf = $em->getRepository('CommandesBundle:Bes')->idfact();
        $be = new Bes();
        $form = $this->createForm('Commandes\CommandesBundle\Form\BesType', $be);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            if ($be->getDepartements()->getId()) {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Departements', 'u')
                    ->set('u.nom', '?1')
                    ->set('u.adresse', '?2')
                    ->set('u.nifselect', '?3')
                    ->set('u.nif', '?4')
                    ->set('u.codepostal', '?5')
                    ->set('u.ville', '?6')
                    ->set('u.iban', '?7')
                    ->set('u.banque', '?8')
                    ->set('u.bic', '?9')
                    ->set('u.email', '?10')
                    ->set('u.siteweb', '?11')
                    ->set('u.fax', '?12')
                    ->set('u.telephone', '?13')
                    ->set('u.nrc', '?15')
                    ->set('u.user', '?16')
                    ->where('u.id = ?14')
                    ->setParameter(1, $be->getDepartements()->getNom())
                    ->setParameter(2, $be->getDepartements()->getAdresse())
                    ->setParameter(3, $be->getDepartements()->getNifselect())
                    ->setParameter(4, $be->getDepartements()->getNif())
                    ->setParameter(5, $be->getDepartements()->getCodepostal())
                    ->setParameter(6, $be->getDepartements()->getVille())
                    ->setParameter(7, $be->getDepartements()->getIban())
                    ->setParameter(8, $be->getDepartements()->getBanque())
                    ->setParameter(9, $be->getDepartements()->getBic())
                    ->setParameter(10, $be->getDepartements()->getEmail())
                    ->setParameter(11, $be->getDepartements()->getSiteweb())
                    ->setParameter(12, $be->getDepartements()->getFax())
                    ->setParameter(13, $be->getDepartements()->getTelephone())
                    ->setParameter(14, $be->getDepartements()->getId())
                    ->setParameter(15, $be->getDepartements()->getNrc())
                    ->setParameter(16, $this->getUser())
                    ->getQuery();
                $p = $q->execute();

                $be->setDepartements($be->getDepartements()->getId());
            }
            if ($be->getAcheteur()->getId()) {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Acheteurs', 'u')
                    ->set('u.nom', '?1')
                    ->set('u.adresse', '?2')
                    ->set('u.nifselect', '?3')
                    ->set('u.nif', '?4')
                    ->set('u.codepostal', '?5')
                    ->set('u.ville', '?6')
                    ->set('u.email', '?10')
                    ->set('u.siteweb', '?11')
                    ->set('u.fax', '?12')
                    ->set('u.telephone', '?13')
                    ->set('u.nrc', '?15')
                    ->where('u.id = ?14')
                    ->set('u.type', '?16')
                    ->set('u.user', '?17')
                    ->setParameter(1, $be->getAcheteur()->getNom())
                    ->setParameter(2, $be->getAcheteur()->getAdresse())
                    ->setParameter(3, $be->getAcheteur()->getNifselect())
                    ->setParameter(4, $be->getAcheteur()->getNif())
                    ->setParameter(5, $be->getAcheteur()->getCodepostal())
                    ->setParameter(6, $be->getAcheteur()->getVille())
                    ->setParameter(10, $be->getAcheteur()->getEmail())
                    ->setParameter(11, $be->getAcheteur()->getSiteweb())
                    ->setParameter(12, $be->getAcheteur()->getFax())
                    ->setParameter(13, $be->getAcheteur()->getTelephone())
                    ->setParameter(15, $be->getAcheteur()->getNrc())
                    ->setParameter(14, $be->getAcheteur()->getId())
                    ->setParameter(16, $be->getAcheteur()->getType())
                    ->setParameter(17, $this->getUser())
                    ->getQuery();
                $p = $q->execute();
                $be->setAcheteur($be->getAcheteur()->getId());
            }

            if ($be->getAchats()) {


                $questionForms = $be->getAchats();


                foreach ($questionForms as $questionForm2) {

                    $id=  $questionForm2->getProduits();
                    $name = $questionForm2->getName();
                    $reference = $questionForm2->getReference();
                    $qte = $questionForm2->getQte();
                    $unite = $questionForm2->getUnite();
                    if($questionForm2->getPuHT() == null){
                        $puHT = 0;
                    }else{
                        $puHT = $questionForm2->getPuHT();
                    }
                    if( $questionForm2->getPuTTC() == null){
                        $puTTC = 0;
                    }else{
                        $puTTC = $questionForm2->getPuTTC();
                    }
                    $prixHT = $questionForm2->getPrixHT();

                    $prixTTC = $questionForm2->getPrixTTC();
                    $tva = $questionForm2->getTva();
                    $tva2 = $questionForm2->getTva2();
                    $totalHT = $questionForm2->getTotalHT();
                    $totalTTC = $questionForm2->getTotalTTC();
                    $description = $questionForm2->getDescription();

                    $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name,'user'=>$this->getUser()));
                    $apros = $em->getRepository('CommandesBundle:Aprodoc')->findOneBy(array('produits'=>$id,'bes'=>$be,'zone'=>$be->getZonnestocks()->getNom()));

                    if($prods){


                        $qteprod = $prods->getQte();
                        $idprod = $prods->getId();


                        $qb = $em->createQueryBuilder();
                        $q = $qb->update('CommandesBundle:Produits', 'u')

                            ->set('u.name','?1')
                            ->set('u.reference','?2')
                            ->set('u.unite','?3')
                            ->set('u.puHT','?4')
                            ->set('u.tva','?5')
                            ->set('u.qte','?6')
                            ->set('u.description','?7')
                            ->set('u.tva2','?9')
                            ->set('u.prixHt','?10')
                            ->set('u.prixTTC','?11')
                            ->set('u.puTTC','?12')
                            ->where('u.name = ?1')
                            ->andWhere('u.user = ?8')
                            ->setParameter(1,$name)
                            ->setParameter(2,$reference)
                            ->setParameter(3,$unite)
                            ->setParameter(4,$puHT)
                            ->setParameter(5,$tva)
                            ->setParameter(6,$qte)
                            ->setParameter(7,$description)
                            ->setParameter(8,$this->getUser())
                            ->setParameter(9,$tva2)
                            ->setParameter(10,$prixHT)
                            ->setParameter(11,$prixTTC)
                            ->setParameter(12,$puTTC)
                            ->getQuery();
                        $p = $q->execute();


                        $qb = $em->createQueryBuilder();
                        $q = $qb->update('CommandesBundle:Achats', 'u')
                            ->set('u.produits', '?1')
                            ->Where('u.bes = ?2')
                            ->andWhere('u.name = ?3')

                            ->setParameter(1,$id)
                            ->setParameter(2,$be->getId())
                            ->setParameter(3,$name)

                            ->getQuery();
                        $p = $q->execute();


                    } else{

                        $produit = new Produits();
                        $produit->setName($name);
                        $produit->setReference($reference);
                        $produit->setUnite($unite);
                        $produit->setPuHT($puHT);
                        $produit->setPuTTC($puTTC);
                        $produit->setPrixHt($prixHT);
                        $produit->setPrixTTC($prixTTC);
                        $produit->setTva($tva);
                        $produit->setTva2($tva2);
                        $produit->setQtedefault(1);
                        $produit->setDp(0);
                        $produit->setAff(1);
                        $produit->setDescription($description);
                        $produit->setUser($this->getUser());
                        $em->persist($produit);
                        $em->flush();





                    }

                }





            }





            $be->setType($be->getType());
            $be->setNf($be->getNf());
            $be->setCreele(new \DateTime("now"));
            $be->setLieu($be->getLieu());
            $be->setAdditionnelle($be->getAdditionnelle());
            $be->setDateadd($be->getDateadd());
            $be->setUser($this->getUser());
            $em->persist($be);
            $em->flush();

            $ach = $em->getRepository('CommandesBundle:Achats')->findBy(array('user'=>$this->getUser()));

            foreach ($ach as $achs) {

                $pro = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$achs->getName(),'user'=>$this->getUser()));

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Achats', 'u')
                    ->set('u.produits', '?1')

                    ->andWhere('u.name = ?3')

                    ->setParameter(1,$pro->getId())

                    ->setParameter(3,$pro->getName())

                    ->getQuery();
                $p = $q->execute();
            }

            return $this->redirectToRoute('admin_bes_show', array('id' => $be->getId()));


        }

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));

        return $this->render('bes/new.html.twig', array(
            'be' => $be,
            'form' => $form->createView(),
            'nf' => $nf,
            'acheteursList' => $acheteursList,
            'departements' => $departements,

        ));
    }


    public function besJointureAction(Request $request, $formid)
    {
        $em = $this->getDoctrine()->getManager();
        $nf = $em->getRepository('CommandesBundle:Bes')->idfact();

        $bl = new Bes();
        $form = $this->createForm('Commandes\CommandesBundle\Form\BesType', $bl);
        $form->handleRequest($request);

        $editForm = $this->createForm('Commandes\CommandesBundle\Form\BesType', $bl);
        $editForm->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            if ($bl->getDepartements()->getId()) {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Departements', 'u')
                    ->set('u.nom', '?1')
                    ->set('u.adresse', '?2')
                    ->set('u.nifselect', '?3')
                    ->set('u.nif', '?4')
                    ->set('u.codepostal', '?5')
                    ->set('u.ville', '?6')
                    ->set('u.iban', '?7')
                    ->set('u.banque', '?8')
                    ->set('u.bic', '?9')
                    ->set('u.email', '?10')
                    ->set('u.siteweb', '?11')
                    ->set('u.fax', '?12')
                    ->set('u.telephone', '?13')
                    ->set('u.nrc', '?15')
                    ->set('u.user', '?16')
                    ->where('u.id = ?14')
                    ->setParameter(1, $bl->getDepartements()->getNom())
                    ->setParameter(2, $bl->getDepartements()->getAdresse())
                    ->setParameter(3, $bl->getDepartements()->getNifselect())
                    ->setParameter(4, $bl->getDepartements()->getNif())
                    ->setParameter(5, $bl->getDepartements()->getCodepostal())
                    ->setParameter(6, $bl->getDepartements()->getVille())
                    ->setParameter(7, $bl->getDepartements()->getIban())
                    ->setParameter(8, $bl->getDepartements()->getBanque())
                    ->setParameter(9, $bl->getDepartements()->getBic())
                    ->setParameter(10, $bl->getDepartements()->getEmail())
                    ->setParameter(11, $bl->getDepartements()->getSiteweb())
                    ->setParameter(12, $bl->getDepartements()->getFax())
                    ->setParameter(13, $bl->getDepartements()->getTelephone())
                    ->setParameter(14, $bl->getDepartements()->getId())
                    ->setParameter(15, $bl->getDepartements()->getNrc())
                    ->setParameter(16, $this->getUser())
                    ->getQuery();
                $p = $q->execute();

                $bl->setDepartements($bl->getDepartements()->getId());
            }
            if ($bl->getAcheteur()->getId()) {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Acheteurs', 'u')
                    ->set('u.nom', '?1')
                    ->set('u.adresse', '?2')
                    ->set('u.nifselect', '?3')
                    ->set('u.nif', '?4')
                    ->set('u.codepostal', '?5')
                    ->set('u.ville', '?6')
                    ->set('u.email', '?10')
                    ->set('u.siteweb', '?11')
                    ->set('u.fax', '?12')
                    ->set('u.telephone', '?13')
                    ->set('u.nrc', '?15')
                    ->where('u.id = ?14')
                    ->set('u.type', '?16')
                    ->set('u.user', '?17')
                    ->setParameter(1, $bl->getAcheteur()->getNom())
                    ->setParameter(2, $bl->getAcheteur()->getAdresse())
                    ->setParameter(3, $bl->getAcheteur()->getNifselect())
                    ->setParameter(4, $bl->getAcheteur()->getNif())
                    ->setParameter(5, $bl->getAcheteur()->getCodepostal())
                    ->setParameter(6, $bl->getAcheteur()->getVille())
                    ->setParameter(10, $bl->getAcheteur()->getEmail())
                    ->setParameter(11, $bl->getAcheteur()->getSiteweb())
                    ->setParameter(12, $bl->getAcheteur()->getFax())
                    ->setParameter(13, $bl->getAcheteur()->getTelephone())
                    ->setParameter(15, $bl->getAcheteur()->getNrc())
                    ->setParameter(14, $bl->getAcheteur()->getId())
                    ->setParameter(16, $bl->getAcheteur()->getType())
                    ->setParameter(17, $this->getUser())
                    ->getQuery();
                $p = $q->execute();
                $bl->setAcheteur($bl->getAcheteur()->getId());
            }

            if ($bl->getAchats()) {


                $questionForms = $bl->getAchats();


                foreach ($questionForms as $questionForm2) {



                    $name = $questionForm2->getName();
                    $reference = $questionForm2->getReference();
                    $qte = $questionForm2->getQte();
                    $unite = $questionForm2->getUnite();
                    $id = $questionForm2->getProduits();





                    if( $questionForm2->getPuHT() == null){
                        $puHT = 0;
                    }else{
                        $puHT = $questionForm2->getPuHT();
                    }
                    if( $questionForm2->getPuTTC() == null){
                        $puTTC = 0;
                    }else{
                        $puTTC = $questionForm2->getPuTTC();
                    }
                    $prixHT = $questionForm2->getPrixHT();

                    $prixTTC = $questionForm2->getPrixTTC();
                    $tva = $questionForm2->getTva();
                    $tva2 = $questionForm2->getTva2();
                    $totalHT = $questionForm2->getTotalHT();
                    $totalTTC = $questionForm2->getTotalTTC();
                    $description = $questionForm2->getDescription();

                    $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name,'user'=>$this->getUser()));

                    if ($prods){

                        $qb = $em->createQueryBuilder();
                        $q = $qb->update('CommandesBundle:Produits', 'u')

                            ->set('u.name','?1')
                            ->set('u.reference','?2')
                            ->set('u.unite','?3')
                            ->set('u.puHT','?4')
                            ->set('u.tva','?5')
                            ->set('u.qte','?6')
                            ->set('u.description','?7')
                            ->set('u.tva2','?9')
                            ->set('u.prixHt','?10')
                            ->set('u.prixTTC','?11')
                            ->set('u.puTTC','?12')
                            ->set('u.aff','?13')
                            ->where('u.name = ?1')
                            ->andWhere('u.user = ?8')
                            ->setParameter(1,$name)
                            ->setParameter(2,$reference)
                            ->setParameter(3,$unite)
                            ->setParameter(4,$puHT)
                            ->setParameter(5,$tva)
                            ->setParameter(6,$qte)
                            ->setParameter(7,$description)
                            ->setParameter(8,$this->getUser())
                            ->setParameter(9,$tva2)
                            ->setParameter(10,$prixHT)
                            ->setParameter(11,$prixTTC)
                            ->setParameter(12,$puTTC)
                            ->setParameter(13,1)

                            ->getQuery();
                        $p = $q->execute();


                        $qb = $em->createQueryBuilder();
                        $q = $qb->update('CommandesBundle:Achats', 'u')
                            ->set('u.produits', '?1')
                            ->Where('u.bes = ?2')
                            ->andWhere('u.name = ?3')

                            ->setParameter(1,$id)
                            ->setParameter(2,$bl->getId())
                            ->setParameter(3,$name)

                            ->getQuery();
                        $p = $q->execute();


                    }
                    else{

                        $produit = new Produits();
                        $produit->setName($name);
                        $produit->setReference($reference);
                        $produit->setUnite($unite);
                        $produit->setPuHT(0);
                        $produit->setPuTTC(0);
                        $produit->setPrixHt($prixHT);
                        $produit->setPrixTTC($prixTTC);
                        $produit->setTva($tva);
                        $produit->setTva2($tva2);
                        $produit->setQte($qte);
                        $produit->setQtedefault(1);
                        $produit->setDp(0);
                        $produit->setAff(1);
                        $produit->setActivlot(0);
                        $produit->setAfterjoint(0);
                        $produit->setDescription($description);
                        $produit->setUser($this->getUser());
                        $em->persist($produit);
                        $em->flush();




                    }




                }



            }





            $bl->setType($bl->getType());
            $bl->setNf($bl->getNf());
            $bl->setCreele(new \DateTime("now"));
            $bl->setLieu($bl->getLieu());
            $bl->setAdditionnelle($bl->getAdditionnelle());
            $bl->setDateadd($bl->getDateadd());
            $bl->setDepenses($bl->getDepenses());
            $bl->setUser($this->getUser());
            $em->persist($bl);
            $em->flush();




            $ach = $em->getRepository('CommandesBundle:Achats')->findBy(array('user'=>$this->getUser()));

            foreach ($ach as $achs) {

                $pro = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$achs->getName(),'user'=>$this->getUser()));

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Achats', 'u')
                    ->set('u.produits', '?1')

                    ->andWhere('u.name = ?3')

                    ->setParameter(1,$pro->getId())

                    ->setParameter(3,$pro->getName())

                    ->getQuery();
                $p = $q->execute();
            }






            return $this->redirectToRoute('admin_bes_show', array('id' => $bl->getId()));
        }

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));

        $factures = $em->getRepository('CommandesBundle:Depenses')->findOneBy(array('id'=>$formid));

        $ventes = $em->getRepository('CommandesBundle:Achats')->findBy(array('depenses'=>$formid));


        return $this->render('bes/newJointure.html.twig', array(
            'bl' => $bl,
            'form' => $form->createView(),
            'edit_form' => $editForm->createView(),

            'nf' => $nf,
            'acheteursList' => $acheteursList,
            'departements' => $departements,
            'depenses' => $factures,
            'achats' => $ventes,
        ));
    }

    /**
     * Finds and displays a be entity.
     *
     */
    public function showAction(Bes $be)
    {
        $deleteForm = $this->createDeleteForm($be);

        return $this->render('bes/show.html.twig', array(
            'be' => $be,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing be entity.
     *
     */
    public function editAction(Request $request, Bes $be)
    {

        $editForm = $this->createForm('Commandes\CommandesBundle\Form\BesType', $be);
        $editForm->handleRequest($request);


        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            if ($be->getDepartements()->getId()) {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Departements', 'u')
                    ->set('u.nom', '?1')
                    ->set('u.adresse', '?2')
                    ->set('u.nifselect', '?3')
                    ->set('u.nif', '?4')
                    ->set('u.codepostal', '?5')
                    ->set('u.ville', '?6')
                    ->set('u.iban', '?7')
                    ->set('u.banque', '?8')
                    ->set('u.bic', '?9')
                    ->set('u.email', '?10')
                    ->set('u.siteweb', '?11')
                    ->set('u.fax', '?12')
                    ->set('u.telephone', '?13')
                    ->set('u.nrc', '?15')
                    ->set('u.user', '?16')
                    ->where('u.id = ?14')
                    ->setParameter(1, $be->getDepartements()->getNom())
                    ->setParameter(2, $be->getDepartements()->getAdresse())
                    ->setParameter(3, $be->getDepartements()->getNifselect())
                    ->setParameter(4, $be->getDepartements()->getNif())
                    ->setParameter(5, $be->getDepartements()->getCodepostal())
                    ->setParameter(6, $be->getDepartements()->getVille())
                    ->setParameter(7, $be->getDepartements()->getIban())
                    ->setParameter(8, $be->getDepartements()->getBanque())
                    ->setParameter(9, $be->getDepartements()->getBic())
                    ->setParameter(10, $be->getDepartements()->getEmail())
                    ->setParameter(11, $be->getDepartements()->getSiteweb())
                    ->setParameter(12, $be->getDepartements()->getFax())
                    ->setParameter(13, $be->getDepartements()->getTelephone())
                    ->setParameter(14, $be->getDepartements()->getId())
                    ->setParameter(15, $be->getDepartements()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();

                $be->setDepartements($be->getDepartements()->getId());
            }

            if ($be->getAcheteur()->getId()) {
                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Acheteurs', 'u')
                    ->set('u.nom', '?1')
                    ->set('u.adresse', '?2')
                    ->set('u.nifselect', '?3')
                    ->set('u.nif', '?4')
                    ->set('u.codepostal', '?5')
                    ->set('u.ville', '?6')
                    ->set('u.email', '?10')
                    ->set('u.siteweb', '?11')
                    ->set('u.fax', '?12')
                    ->set('u.telephone', '?13')
                    ->set('u.nrc', '?15')
                    ->where('u.id = ?14')
                    ->set('u.type', '?16')
                    ->set('u.user', '?17')
                    ->setParameter(1, $be->getAcheteur()->getNom())
                    ->setParameter(2, $be->getAcheteur()->getAdresse())
                    ->setParameter(3, $be->getAcheteur()->getNifselect())
                    ->setParameter(4, $be->getAcheteur()->getNif())
                    ->setParameter(5, $be->getAcheteur()->getCodepostal())
                    ->setParameter(6, $be->getAcheteur()->getVille())
                    ->setParameter(10, $be->getAcheteur()->getEmail())
                    ->setParameter(11, $be->getAcheteur()->getSiteweb())
                    ->setParameter(12, $be->getAcheteur()->getFax())
                    ->setParameter(13, $be->getAcheteur()->getTelephone())
                    ->setParameter(15, $be->getAcheteur()->getNrc())
                    ->setParameter(14, $be->getAcheteur()->getId())
                    ->setParameter(16, $be->getAcheteur()->getType())
                    ->setParameter(17, $user)
                    ->getQuery();
                $p = $q->execute();
                $be->setAcheteur($be->getAcheteur()->getId());
            }


            if ($be->getAchats()) {

                $questionForms = $be->getAchats();

                if($questionForms){

                    foreach ($questionForms as $questionForm2) {

                        $id=  $questionForm2->getProduits();
                        $name = $questionForm2->getName();
                        $reference = $questionForm2->getReference();
                        $qte = $questionForm2->getQte();
                        $unite = $questionForm2->getUnite();
                        if($questionForm2->getPuHT() == null){
                            $puHT = 0;
                        }else{
                            $puHT = $questionForm2->getPuHT();
                        }
                        if( $questionForm2->getPuTTC() == null){
                            $puTTC = 0;
                        }else{
                            $puTTC = $questionForm2->getPuTTC();
                        }
                        $prixHT = $questionForm2->getPrixHT();

                        $prixTTC = $questionForm2->getPrixTTC();
                        $tva = $questionForm2->getTva();
                        $tva2 = $questionForm2->getTva2();
                        $totalHT = $questionForm2->getTotalHT();
                        $totalTTC = $questionForm2->getTotalTTC();
                        $description = $questionForm2->getDescription();

                        $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name,'user'=>$this->getUser()));
                        if($prods){


                            $qteprod = $prods->getQte();
                            $idprod = $prods->getId();

                            $apros = $em->getRepository('CommandesBundle:Aprodoc')->findOneBy(array('produits'=>$id,'bes'=>$be,'zone'=>$be->getZonnestocks()->getNom()));

                            $qb = $em->createQueryBuilder();
                            $q = $qb->update('CommandesBundle:Produits', 'u')

                                ->set('u.name','?1')
                                ->set('u.reference','?2')
                                ->set('u.unite','?3')
                                ->set('u.puHT','?4')
                                ->set('u.tva','?5')
                                ->set('u.qte','?6')
                                ->set('u.description','?7')
                                ->set('u.tva2','?9')
                                ->set('u.prixHt','?10')
                                ->set('u.prixTTC','?11')
                                ->set('u.puTTC','?12')
                                ->where('u.name = ?1')
                                ->andWhere('u.user = ?8')
                                ->setParameter(1,$name)
                                ->setParameter(2,$reference)
                                ->setParameter(3,$unite)
                                ->setParameter(4,$puHT)
                                ->setParameter(5,$tva)
                                ->setParameter(6,$qte)
                                ->setParameter(7,$description)
                                ->setParameter(8,$this->getUser())
                                ->setParameter(9,$tva2)
                                ->setParameter(10,$prixHT)
                                ->setParameter(11,$prixTTC)
                                ->setParameter(12,$puTTC)
                                ->getQuery();
                            $p = $q->execute();



                        }
                        else{

                            $produit = new Produits();
                            $produit->setName($name);
                            $produit->setReference($reference);
                            $produit->setUnite($unite);
                            $produit->setPuHT($puHT);
                            $produit->setPuTTC($puTTC);
                            $produit->setPrixHt($prixHT);
                            $produit->setPrixTTC($prixTTC);
                            $produit->setTva($tva);
                            $produit->setTva2($tva2);
                            $produit->setQtedefault(1);
                            $produit->setDp(0);
                            $produit->setAff(1);
                            $produit->setDescription($description);
                            $produit->setUser($this->getUser());
                            $em->persist($produit);
                            $em->flush();



                            $qb22 = $em->createQueryBuilder();

                            $q2 = $qb22->update('CommandesBundle:Achats', 'u')

                                ->set('u.produits', '?1')

                                ->Where('u.bes = ?2')
                                ->andWhere('u.name = ?3')

                                ->setParameter(1,$produit)
                                ->setParameter(2,$be)
                                ->setParameter(3,$name)

                                ->getQuery();
                            $p = $q2->execute();


                        }

                    }
                }


            }

            $be->setType($be->getType());
            $be->setNf($be->getNf());
            $be->setLieu($be->getLieu());
            $be->setAdditionnelle($be->getAdditionnelle());
            $be->setDateadd($be->getDateadd());
            $be->setDateregle($be->getDateregle());
            $be->setDatecreation(new \DateTime('now'));
            $be->setUser($user);

            $em->persist($be);
            $em->flush();


            return $this->redirectToRoute('admin_bes_show', array('id' => $be->getId()));
        }
        $em = $this->getDoctrine()->getManager();
        $stocks = $em->getRepository('CommandesBundle:Stocks')->findAll();



        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));
        $nf = $em->getRepository('CommandesBundle:Depenses')->idfact($user);

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));
        return $this->render('bes/edit.html.twig', array(
            'be' => $be,
            'acheteursList' => $acheteursList,
            'stocks' => $stocks,
            'nf'=>$nf,
            'departements' => $departements,

            'edit_form' => $editForm->createView(),

        ));
    }


    /**
     * Deletes a be entity.
     *
     */

    public function deleteAction( Bes $be)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($be);
        $em->flush();
        return $this->redirectToRoute('admin_documents_index');
    }

    /**
     * Creates a form to delete a be entity.
     *
     * @param Bes $be The be entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bes $be)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_bes_delete', array('id' => $be->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function userAction($user)
    {
        if($user){
            $em = $this->getDoctrine()->getManager();
            $departements  = $em->getRepository('CommandesBundle:Departements')->findById($user);

            foreach($departements as $departement)
            {

                $val1 = $departement->getNom();
                $val2 = $departement->getNifselect();
                $val3 = $departement->getNif();
                $val4 = $departement->getAdresse();
                $val5 = $departement->getCodepostal();
                $val6 = $departement->getVille();
                $val7 = $departement->getEmail();
                $val8 = $departement->getSiteweb();
                $val9 = $departement->getFax();
                $val10 = $departement->getTelephone();
            }

            $nom = $val1;
            $nifselect = $val2;
            $nif = $val3;
            $adresse = $val4;
            $codepostal = $val5;
            $ville = $val6;
            $email = $val7;
            $siteweb = $val8;
            $fax = $val9;
            $telephone = $val10;



            $response = new JsonResponse();
            $response->setContent(json_encode($nom));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(

                'nom'=>$nom,
                'nifselect'=>$nifselect,
                'nif'=>$nif,
                'adresse'=>$adresse,
                'codepostal'=>$codepostal,
                'ville'=>$ville,
                'email'=>$email,
                'siteweb'=>$siteweb,
                'fax'=>$fax,
                'telephone'=>$telephone,

            ));
        }else{
            return $this->redirectToRoute('admin_bes_new');
        }
    }

    public function acheteurAction($acheteur)
    {
        if($acheteur){
            $em = $this->getDoctrine()->getManager();
            $clients = $em->getRepository('CommandesBundle:Acheteurs')->findById($acheteur);

            foreach($clients as $client)
            {

                $val1 = $client->getNom();
                $val2 = $client->getNifselect();
                $val3 = $client->getNif();
                $val4 = $client->getAdresse();
                $val5 = $client->getCodepostal();
                $val6 = $client->getVille();
                $val7 = $client->getEmail();
                $val8 = $client->getSiteweb();
                $val9 = $client->getFax();
                $val10 = $client->getTelephone();
            }

            $nom = $val1;
            $nifselect = $val2;
            $nif = $val3;
            $adresse = $val4;
            $codepostal = $val5;
            $ville = $val6;
            $email = $val7;
            $siteweb = $val8;
            $fax = $val9;
            $telephone = $val10;



            $response = new JsonResponse();
            $response->setContent(json_encode($nom));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(

                'nom'=>$nom,
                'nifselect'=>$nifselect,
                'nif'=>$nif,
                'adresse'=>$adresse,
                'codepostal'=>$codepostal,
                'ville'=>$ville,
                'email'=>$email,
                'siteweb'=>$siteweb,
                'fax'=>$fax,
                'telephone'=>$telephone,

            ));
        }else{
            return $this->redirectToRoute('admin_bes_new');
        }
    }


    public function prodAction($prod,$qte,$tva,$reduction)
    {
        if($prod ){
            $em = $this->getDoctrine()->getManager();
            $produit  = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('id'=>$prod,'user'=>$this->getUser(),'aff'=>1));

            foreach($produit as $produit)
            {
                $pid = $prod;
                $TVAprod = $produit->getTva2()->getId();
                $TVA = $produit->getTva()->getId();
                $unite= $produit->getUnite();
                $description= $produit->getDescription();
                $val= $produit->getReference();
                $val2= $produit->getPrixHt();
                $tva3=$produit->getPuHT();

                $puAchat = $produit->getPrixHT();

                $puHT = $produit->getPuHT();
                $puTTC = $produit->getPuTTC();

                $puTTCa = $produit->getPrixTTC();

            }


            $reference = $val;
            $prixHTvente = $val2;
            $totalHT = $tva3 * $qte;

            $totalHTa = $puAchat * $qte;

            $TVA = $tva / 100 ;


            $TTC = $totalHT * $TVA + $totalHT;
            $TTCa = $totalHTa * $TVAprod + $totalHTa;

            $totalTVA = $totalHT * $TVA;

            $totalTVAa = $totalHTa * $TVAprod;

            $REDUCTION = $reduction * $totalHT / 100;

            $totalReduction =  $totalHT - $REDUCTION;

            $totalReductiona =  $totalHTa - $REDUCTION;

            $response = new JsonResponse();
            $response->setContent(json_encode($reference));

            $response->headers->set('Content-Type','application/json');
            return $response->setData(array('TVA'=>$TVA,'puHT'=>$puHT,'puTTCa'=>$puTTCa,'puTTC'=>$puTTC,'pid'=>$pid,'tva2'=>$tva,'reference'=>$reference,'unite'=>$unite,'description'=>$description, 'TVAprod'=>$TVAprod,'prixHTvente'=>$prixHTvente,'puAchat'=>$puAchat, 'totalHT'=>$totalHT,'totalHTa'=>$totalHTa,'TTC'=>$TTC,'TTCa'=>$TTCa,'totalTVA'=>$totalTVA,'totalTVAa'=>$totalTVAa,'reduction'=>$REDUCTION,'totalReduction'=>$totalReduction,));
        }else{
            return $this->redirectToRoute('admin_depenses_new');
        }


    }
    public function qteAction($qte,$pu,$pua,$tva,$tva2)
    {
        if($qte && $pu && $tva && $tva2 ){
            $em = $this->getDoctrine()->getManager();
            $tv  = $em->getRepository('CommandesBundle:Tva')->findById($tva);
            $tv2  = $em->getRepository('CommandesBundle:Tva')->findById($tva2);


            $puHT = $pu;


            $totalHT = $pu * $qte;

            $totalHTa = $pua * $qte;

            foreach($tv as $tv)
            {
                $tva= $tv->getValeur();
                $tvaa= $tv->getId();
            }
            foreach($tv2 as $tv2)
            {
                $tva2= $tv2->getValeur();
                $tvaa2= $tv->getId();
            }

            $TVA = $tva / 100 ;

            $TVA2 = $tva2 / 100 ;



            $TTC = $totalHT * $TVA + $totalHT;

            $TTC2 = $totalHTa * $TVA2 + $totalHTa;

            $totalTVA = $totalHT * $TVA;
            $totalTVA2 = $totalHTa * $TVA2;




            $response = new JsonResponse();
            $response->setContent(json_encode($totalHT));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(
               'puHT'=>$puHT,'totalHT'=>$totalHT,'TTC'=>$TTC,'totalTVA'=>$totalTVA
            ,'totalHTa'=>$totalHTa,'TTC2'=>$TTC2,'totalTVA2'=>$totalTVA2,'tva'=>$tvaa,'tva2'=>$tvaa2
            ));
        }else{
            return $this->redirectToRoute('admin_bes_new');
        }
    }

}
