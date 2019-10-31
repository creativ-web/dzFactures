<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Bls;
use Commandes\CommandesBundle\Entity\Aprodoc;
use Commandes\CommandesBundle\Entity\Aprofact;
use Commandes\CommandesBundle\Entity\Produits;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Bl controller.
 *
 */
class BlsController extends Controller
{
    /**
     * Lists all bl entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bls = $em->getRepository('CommandesBundle:Bls')->findBy(array('user'=>$this->getUser()));

        return $this->render('bls/index.html.twig', array(
            'bls' => $bls,
        ));
    }

    /**
     * Creates a new bl entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nf = $em->getRepository('CommandesBundle:Bls')->idfact();
        $bl = new Bls();
        $form = $this->createForm('Commandes\CommandesBundle\Form\BlsType', $bl);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

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
                    ->set('u.user', '?16')
                    ->where('u.id = ?14')
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
                    ->setParameter(14, $bl->getAcheteur()->getId())
                    ->setParameter(15, $bl->getAcheteur()->getNrc())
                    ->setParameter(16, $this->getUser())
                    ->getQuery();
                $p = $q->execute();
                $bl->setAcheteur($bl->getAcheteur()->getId());
            }
            if ($bl->getVentes()) {

                $questionForms = $bl->getVentes();

                foreach ($questionForms as $questionForm)
                {

                    $id = $questionForm->getProduits();
                    $name = $questionForm->getName();
                    $reference = $questionForm->getReference();
                    $qte = $questionForm->getQte();
                    $unite = $questionForm->getUnite();
                    $puHT = $questionForm->getPuHT();
                    $puTTC = $questionForm->getPuTTC();
                    $tva = $questionForm->getTva();


                    $totalHT = $questionForm->getTotalHT();
                    $totalTTC = $questionForm->getTotalTTC();
                    $description = $questionForm->getDescription();
                    $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name,'user'=>$this->getUser()));


                    if($prods){


                        $qteprod = $prods->getQte();
                        $idprod = $prods->getId();

                        $apros = $em->getRepository('CommandesBundle:Aprofact')->findOneBy(array('produits'=>$idprod, 'bls'=>$bl,  'zone'=>$bl->getZonnestocks()->getNom()));


                        /*
                        foreach ($lots as $lot){
                            $prodlot = $lot->getProduits();
                            $qtelot = $lot->getQte();


                                $aprodoc = new Aprofact();
                                $aprodoc->setProduits($prodlot);
                                $aprodoc->setQte($qtelot);
                                $aprodoc->setZone($bl->getZonnestocks()->getNom());
                                $aprodoc->setFactures($bl);
                                $em->persist($aprodoc);
                                $em->flush();


                        }
                        */


                            $qb = $em->createQueryBuilder();
                            $q = $qb->update('CommandesBundle:Produits', 'u')

                                ->set('u.name','?1')
                                ->set('u.reference','?2')
                                ->set('u.unite','?3')
                                ->set('u.puHT','?4')
                                ->set('u.tva','?5')
                                ->set('u.qte','?6')
                                ->set('u.description','?7')
                                ->set('u.puTTC','?12')
                                ->set('u.afterjoint','?13')
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

                                ->setParameter(12,$puTTC)
                                ->setParameter(13,0)
                                ->getQuery();
                            $p = $q->execute();


                        $qb = $em->createQueryBuilder();
                        $q = $qb->update('CommandesBundle:Ventes', 'u')
                            ->set('u.produits', '?1')
                            ->Where('u.bls = ?2')
                            ->andWhere('u.name = ?3')

                            ->setParameter(1,$idprod)
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
                        $produit->setPuHT($puHT);
                        $produit->setPuTTC($puTTC);
                        $produit->setTva($tva);
                        $produit->setQte($qte);
                        $produit->setQtedefault(1);
                        $produit->setDp(0);
                        $produit->setAff(1);
                        $produit->setDescription($description);
                        $produit->setUser($this->getUser());
                        $produit->setAfterjoint(0);
                        $em->persist($produit);
                        $em->flush();





                    }



                }



            }
            $bl->setType($bl->getType());
            $bl->setNf($bl->getNf());
            $bl->setLieu($bl->getLieu());

            $bl->setAdditionnelle($bl->getAdditionnelle());
            $bl->setDateadd($bl->getDateadd());
            $bl->setDateregle($bl->getDateregle());
            $bl->setDatecreation(new \DateTime("now"));
            $bl->setUser($this->getUser());



            $em->persist($bl);
            $em->flush();


            $Paramgestions = $em->getRepository('CommandesBundle:Paramgestions')->findOneBy(array('user' =>$this->getUser()));



            /*
                        $connector = new  WindowsPrintConnector("imprimante AL-2600");
            
            
                        $ladate = new \DateTime('now');
            
                        $bl = $em->getRepository('CommandesBundle:Factures')->findById($bl);
                        foreach ($bl as $questionFormss) {
            
                            $nf = $questionFormss->getNf();
                            $table = $questionFormss->getTables();
                        }
            
                        $path = '../web/image/logo.png'; //exit($path);
                        $logo = EscposImage::load( $path, false); //exit(var_dump($img_logo));
            
                        $printer = new Printer($connector);
                        foreach ($bl as $questionFormss) {
            
                            $totalTTC = $questionFormss->getTotalTTC();
            
                            $nfact = $questionFormss->getNf();
            
                            $table = $questionFormss->getTables();
            
            
            
                        }
            
            
                        $printer -> setJustification(Printer::JUSTIFY_CENTER);
            
                        $printer -> bitImage($logo, Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT);
                        $printer -> setTextSize(2, 2);
                        $printer -> feed(1);
                        $printer -> text($table);
            
                        $printer -> feed(2);
                        $printer -> setTextSize(1, 1);
                        $printer -> text($ladate->format("d/m/Y H:i "));
                        $printer -> feed(1);
                        $printer -> setTextSize(1, 1);
                        $printer -> text(' Bon N° '.$nfact);
            
                        $printer -> setTextSize(1, 1);
                        $printer -> pulse();
            
                        $printer -> feed(1);
                        $printer -> setTextSize(1, 1);
            
                        $printer -> text("\nMerci d'avoir choisi café 2a\n.");
            
            
                        $printer->feed(1);
                        $printer -> cut(Printer::CUT_FULL, 1);
                        $printer -> close();
            
            
            */




            $ach = $em->getRepository('CommandesBundle:Ventes')->findBy(array('user'=>$this->getUser()));

            foreach ($ach as $achs) {

                $pro = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$achs->getName(),'user'=>$this->getUser()));

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Ventes', 'u')
                    ->set('u.produits', '?1')

                    ->andWhere('u.name = ?3')

                    ->setParameter(1,$pro->getId())

                    ->setParameter(3,$pro->getName())

                    ->getQuery();
                $p = $q->execute();
            }
            return $this->redirectToRoute('admin_documents_index');





        }

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));
        return $this->render('bls/new.html.twig', array(
            'bl' => $bl,
            'form' => $form->createView(),
            'nf' => $nf,
            'acheteursList' => $acheteursList,
            'departements' => $departements,
        ));
    }

    public function newJointureAction(Request $request, $formid)
    {
        $em = $this->getDoctrine()->getManager();
        $nf = $em->getRepository('CommandesBundle:Bls')->idfact();
        $bl = new Bls();
        $form = $this->createForm('Commandes\CommandesBundle\Form\BlsType', $bl);
        $form->handleRequest($request);

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

            if ($bl->getVentes()) {


                $questionForms = $bl->getVentes();




                $prodlot = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$formid));
                foreach ($prodlot as $question) {
                    $pl = $question->getProduits();
                    $plqte = $question->getQte();


                    $qb = $em->createQueryBuilder();

                    $q = $qb->update('CommandesBundle:Aprofact', 'u')
                        ->set('u.qte', 'u.qte - ?1')
                        ->set('u.zone', '?3')
                        ->where('u.produits = ?14')
                        ->andWhere('u.zone = ?3')
                        ->setParameter(3, $bl->getZonnestocks()->getNom())
                        ->setParameter(1,$plqte)
                        ->setParameter(14,$pl)
                        ->getQuery();
                    $p = $q->execute();
                    $qb2 = $em->createQueryBuilder();

                }


                foreach ($questionForms as $questionForm2) {

                    $id = $questionForm2->getProduits();

                        $prodlot = $questionForm2->getProduits();

                    $name = $questionForm2->getName();
                    $reference = $questionForm2->getReference();
                    $qte = $questionForm2->getQte();
                    $unite = $questionForm2->getUnite();
                    $puHT = $questionForm2->getPuHT();
                    $prixHT = $questionForm2->getPrixHT();
                    $puTTC = $questionForm2->getPuTTC();
                    $prixTTC = $questionForm2->getPrixTTC();
                    $tva = $questionForm2->getTva();
                    $tva2 = $questionForm2->getTva2();
                    $totalHT = $questionForm2->getTotalHT();
                    $totalTTC = $questionForm2->getTotalTTC();
                    $description = $questionForm2->getDescription();




                    $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name,'user'=>$this->getUser()));


                    if($prods){



                        $apros = $em->getRepository('CommandesBundle:Aprodoc')->findOneBy(array('produits'=>$id,'zone'=>$bl->getZonnestocks()->getNom()));
                        $aprosfact = $em->getRepository('CommandesBundle:Aprofact')->findOneBy(array('produits'=>$prodlot,'zone'=>$bl->getZonnestocks()->getNom()));
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
                            ->set('u.afterjoint','?13')
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
                            ->setParameter(13,'fn')
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
                        $produit->setPrixHt($puHT);
                        $produit->setPrixTTC($prixTTC);
                        $produit->setTva($tva);
                        $produit->setTva2($tva2);
                        $produit->setQte($qte);
                        $produit->setQtedefault(1);
                        $produit->setDp(0);
                        $produit->setAff(1);
                        $produit->setAfterjoint('fn');
                        $produit->setDescription($description);
                        $produit->setUser($this->getUser());
                        $em->persist($produit);
                        $em->flush();

                        $aprodoc = new Aprodoc();

                        $aprodoc->setProduits($produit);
                        $aprodoc->setQte($qte);
                        $aprodoc->setZone($bl->getZonnestocks()->getNom());
                        $aprodoc->setBls($bl);
                        $em->persist($aprodoc);
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
            $bl->setFactures($bl->getFactures());
            $bl->setUser($this->getUser());
            $em->persist($bl);
            $em->flush();

            $em->persist($bl);
            $em->flush();


            return $this->redirectToRoute('admin_bls_show', array('id' => $bl->getId()));
        }

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));

        $bls = $em->getRepository('CommandesBundle:Factures')->findOneBy(array('id'=>$formid));

        $ventes = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$formid));

        $ventes2 = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$formid));

        $lots = $em->getRepository('CommandesBundle:Produits')->findBy(array('user'=>$this->getUser(),'activlot'=>1));


        return $this->render('bls/newJointure.html.twig', array(
            'bl' => $bl,
            'form' => $form->createView(),
            'nf' => $nf,
            'acheteursList' => $acheteursList,
            'departements' => $departements,
            'factures' => $bls,
            'ventes' => $ventes,
            'ventes2' => $ventes2,
            'lots'=>$lots,
        ));
    }
    public function JointureSansLotAction(Request $request, $formid)
    {
        $em = $this->getDoctrine()->getManager();
        $nf = $em->getRepository('CommandesBundle:Bls')->idfact();
        $bl = new Bls();
        $form = $this->createForm('Commandes\CommandesBundle\Form\BlsType', $bl);
        $form->handleRequest($request);

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

            if ($bl->getVentes()) {


                $questionForms = $bl->getVentes();




                $prodlot = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$formid));
                foreach ($prodlot as $question) {
                    $pl = $question->getProduits();
                    $plqte = $question->getQte();


                    $qb = $em->createQueryBuilder();

                    $q = $qb->update('CommandesBundle:Aprofact', 'u')
                        ->set('u.qte', 'u.qte - ?1')
                        ->set('u.zone', '?3')
                        ->where('u.produits = ?14')
                        ->andWhere('u.zone = ?3')
                        ->setParameter(3, $bl->getZonnestocks()->getNom())
                        ->setParameter(1,$plqte)
                        ->setParameter(14,$pl)
                        ->getQuery();
                    $p = $q->execute();
                    $qb2 = $em->createQueryBuilder();

                }


                foreach ($questionForms as $questionForm2) {

                    $id = $questionForm2->getProduits();

                    $prodlot = $questionForm2->getProduits();

                    $name = $questionForm2->getName();
                    $reference = $questionForm2->getReference();
                    $qte = $questionForm2->getQte();
                    $unite = $questionForm2->getUnite();
                    $puHT = $questionForm2->getPuHT();
                    $prixHT = $questionForm2->getPrixHT();
                    $puTTC = $questionForm2->getPuTTC();
                    $prixTTC = $questionForm2->getPrixTTC();
                    $tva = $questionForm2->getTva();
                    $tva2 = $questionForm2->getTva2();
                    $totalHT = $questionForm2->getTotalHT();
                    $totalTTC = $questionForm2->getTotalTTC();
                    $description = $questionForm2->getDescription();




                    $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name,'user'=>$this->getUser()));


                    if($prods){



                        $apros = $em->getRepository('CommandesBundle:Aprodoc')->findOneBy(array('produits'=>$id,'zone'=>$bl->getZonnestocks()->getNom()));
                        $aprosfact = $em->getRepository('CommandesBundle:Aprofact')->findOneBy(array('produits'=>$prodlot,'zone'=>$bl->getZonnestocks()->getNom()));
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
                            ->set('u.afterjoint','?13')
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
                            ->setParameter(13,'fn')
                            ->getQuery();
                        $p = $q->execute();
                        if($apros){
                            $qb = $em->createQueryBuilder();

                            $q = $qb->update('CommandesBundle:Aprodoc', 'u')
                                ->set('u.qte', 'u.qte + ?1')
                                ->set('u.zone', '?3')
                                ->where('u.produits = ?14')
                                ->andWhere('u.zone = ?3')
                                ->setParameter(3, $bl->getZonnestocks()->getNom())
                                ->setParameter(1,$qte)
                                ->setParameter(14,$id)
                                ->getQuery();
                            $p = $q->execute();
                            $qb2 = $em->createQueryBuilder();




                        }

                        else{
                            $aprodoc = new Aprofact();

                            $aprodoc->setProduits($id);
                            $aprodoc->setQte($qte);
                            $aprodoc->setZone($bl->getZonnestocks()->getNom());
                            $aprodoc->setBls($bl);
                            $em->persist($aprodoc);
                            $em->flush();



                        }





                    }
                    else{

                        $produit = new Produits();
                        $produit->setName($name);
                        $produit->setReference($reference);
                        $produit->setUnite($unite);
                        $produit->setPuHT($puHT);
                        $produit->setPuTTC($puTTC);
                        $produit->setPrixHt($puHT);
                        $produit->setPrixTTC($prixTTC);
                        $produit->setTva($tva);
                        $produit->setTva2($tva2);
                        $produit->setQte($qte);
                        $produit->setQtedefault(1);
                        $produit->setDp(0);
                        $produit->setAff(1);
                        $produit->setAfterjoint('fn');
                        $produit->setDescription($description);
                        $produit->setUser($this->getUser());
                        $em->persist($produit);
                        $em->flush();

                        $aprodoc = new Aprofact();

                        $aprodoc->setProduits($produit);
                        $aprodoc->setQte($qte);
                        $aprodoc->setZone($bl->getZonnestocks()->getNom());
                        $aprodoc->setBls($bl);
                        $em->persist($aprodoc);
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
            $bl->setBls($bl->getFactures());
            $bl->setUser($this->getUser());
            $em->persist($bl);
            $em->flush();



            return $this->redirectToRoute('admin_bls_show', array('id' => $bl->getId()));
        }

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));

        $bls = $em->getRepository('CommandesBundle:Factures')->findOneBy(array('id'=>$formid));

        $ventes = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$formid));

        $ventes2 = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$formid));

        $lots = $em->getRepository('CommandesBundle:Produits')->findBy(array('user'=>$this->getUser(),'activlot'=>1));


        return $this->render('bls/jointureSansLot.html.twig', array(
            'bl' => $bl,
            'form' => $form->createView(),
            'nf' => $nf,
            'acheteursList' => $acheteursList,
            'departements' => $departements,
            'factures' => $bls,
            'ventes' => $ventes,
            'ventes2' => $ventes2,
            'lots'=>$lots,
        ));
    }

    /**
     * Finds and displays a bl entity.
     *
     */
    public function showAction(Bls $bl)
    {


        return $this->render('bls/show.html.twig', array(
            'bl' => $bl,

        ));
    }

    /**
     * Displays a form to edit an existing bl entity.
     *
     */
    public function editAction(Request $request, Bls $bl)
    {

        $editForm = $this->createForm('Commandes\CommandesBundle\Form\BlsType', $bl);
        $editForm->handleRequest($request);
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        if ($editForm->isSubmitted() && $editForm->isValid()) {

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
                    ->setParameter(16, $user)
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
                    ->setParameter(17, $user)
                    ->getQuery();
                $p = $q->execute();
                $bl->setAcheteur($bl->getAcheteur()->getId());
            }


            if ($bl->getVentes()) {

                $questionForms = $bl->getVentes();

                if($questionForms){

                    foreach ($questionForms as $questionForm)
                    {
                        $id = $questionForm->getProduits();
                        $name = $questionForm->getName();
                        $reference = $questionForm->getReference();
                        $qte = $questionForm->getQte();
                        $unite = $questionForm->getUnite();
                        $puHT = $questionForm->getPuHT();
                        $puTTC = $questionForm->getPuTTC();
                        $tva = $questionForm->getTva();
                        $tva2 = $questionForm->getTva2();

                        $totalHT = $questionForm->getTotalHT();
                        $totalTTC = $questionForm->getTotalTTC();
                        $description = $questionForm->getDescription();
                        $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name,'user'=>$this->getUser()));


                        if($prods){


                            $qteprod = $prods->getQte();
                            $idprod = $prods->getId();

                            $apros = $em->getRepository('CommandesBundle:Aprofact')->findOneBy(array('produits'=>$id, 'bls'=>$bl,  'zone'=>$bl->getZonnestocks()->getNom()));


                            /*
                            foreach ($lots as $lot){
                                $prodlot = $lot->getProduits();
                                $qtelot = $lot->getQte();


                                    $aprodoc = new Aprofact();
                                    $aprodoc->setProduits($prodlot);
                                    $aprodoc->setQte($qtelot);
                                    $aprodoc->setZone($bl->getZonnestocks()->getNom());
                                    $aprodoc->setFactures($bl);
                                    $em->persist($aprodoc);
                                    $em->flush();


                            }
                            */
                            if($prods->getActivlot() == 1){
                                $qb = $em->createQueryBuilder();
                                $q = $qb->update('CommandesBundle:Produits', 'u')

                                    ->set('u.name','?1')
                                    ->set('u.reference','?2')
                                    ->set('u.unite','?3')
                                    ->set('u.puHT','?4')
                                    ->set('u.tva','?5')
                                    ->set('u.qte','?6')
                                    ->set('u.description','?7')
                                    ->set('u.puTTC','?12')
                                    ->set('u.afterjoint','?13')
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

                                    ->setParameter(12,$puTTC)
                                    ->setParameter(13,0)
                                    ->getQuery();
                                $p = $q->execute();
                            }
                            else{
                                $qb = $em->createQueryBuilder();
                                $q = $qb->update('CommandesBundle:Produits', 'u')

                                    ->set('u.name','?1')
                                    ->set('u.reference','?2')
                                    ->set('u.unite','?3')
                                    ->set('u.puHT','?4')
                                    ->set('u.tva','?5')
                                    ->set('u.qte','?6')
                                    ->set('u.description','?7')
                                    ->set('u.puTTC','?12')
                                    ->set('u.afterjoint','?13')
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

                                    ->setParameter(12,$puTTC)
                                    ->setParameter(13,0)
                                    ->getQuery();
                                $p = $q->execute();
                            }



                            if($apros){


                                $qb = $em->createQueryBuilder();
                                $q = $qb->update('CommandesBundle:Aprofact', 'u')
                                    ->set('u.qte', ' ?1')
                                    ->set('u.zone', '?3')
                                    ->where('u.produits = ?14')
                                    ->andWhere('u.zone = ?3')
                                    ->andWhere('u.bls = ?4')
                                    ->setParameter(3, $bl->getZonnestocks()->getNom())
                                    ->setParameter(1,$qte)
                                    ->setParameter(4,$bl)
                                    ->setParameter(14,$id)
                                    ->getQuery();
                                $p = $q->execute();

                            }
                            else{
                                $aprodoc = new Aprofact();
                                $aprodoc->setProduits($id);
                                $aprodoc->setQte($qte );
                                $aprodoc->setZone($bl->getZonnestocks()->getNom());
                                $aprodoc->setBls($bl);
                                $em->persist($aprodoc);
                                $em->flush();

                            }
                        }
                        else{

                            $produit = new Produits();
                            $produit->setName($name);
                            $produit->setReference($reference);
                            $produit->setUnite($unite);
                            $produit->setPuHT($puHT);
                            $produit->setPuTTC($puTTC);
                            $produit->setTva($tva);
                            $produit->setQte($qte);
                            $produit->setQtedefault(1);
                            $produit->setDp(0);
                            $produit->setAff(1);
                            $produit->setDescription($description);
                            $produit->setUser($this->getUser());
                            $produit->setAfterjoint(0);
                            $em->persist($produit);
                            $em->flush();



                            $qb22 = $em->createQueryBuilder();
                            $q2 = $qb22->update('CommandesBundle:Ventes', 'u')

                                ->set('u.produits', '?1')

                                ->Where('u.bls = ?2')
                                ->andWhere('u.name = ?3')

                                ->setParameter(1,$produit)
                                ->setParameter(2,$bl)
                                ->setParameter(3,$name)

                                ->getQuery();
                            $p = $q2->execute();

                        }



                    }
                }


            }

            $bl->setType($bl->getType());
            $bl->setNf($bl->getNf());
            $bl->setLieu($bl->getLieu());
            $bl->setAdditionnelle($bl->getAdditionnelle());
            $bl->setDateadd($bl->getDateadd(new \DateTime('now')));
            $bl->setDateregle($bl->getDateregle());
            $bl->setDatecreation(new \DateTime('now'));
            $bl->setUser($user);


            $em->persist($bl);



            $em->flush();




            return $this->redirectToRoute('admin_bls_show', array('id' => $bl->getId()));
        }
        $em = $this->getDoctrine()->getManager();
        $stocks = $em->getRepository('CommandesBundle:Stocks')->findAll();

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));
        $nf = $em->getRepository('CommandesBundle:Bls')->idfact($user);

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));

        $apros = $em->getRepository('CommandesBundle:Aprofact')->findBy(array('bls'=>$bl,  'zone'=>$bl->getZonnestocks()->getNom()));

        return $this->render('bls/edit.html.twig', array(
            'bl' => $bl,
            'apros' => $apros,
            'acheteursList' => $acheteursList,
            'nf'=>$nf,
            'stocks' => $stocks,
            'departements' => $departements,
            'edit_form' => $editForm->createView(),

        ));
    }

    /**
     * Deletes a bl entity.
     *
     */
    public function deleteAction(Bls $bl)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($bl);
        $em->flush();
        return $this->redirectToRoute('admin_documents_index');
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
            return $this->redirectToRoute('admin_bls_new');
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
            return $this->redirectToRoute('admin_bls_new');
        }
    }


    public function prodAction($prod,$qte,$tva,$reduction)
    {
        if($prod ){
            $em = $this->getDoctrine()->getManager();
            $produit  = $em->getRepository('CommandesBundle:Produits')->findBy(array('id'=>$prod,'user'=>$this->getUser(),'aff'=>1));

            foreach($produit as $produit)
            {
                $pid = $prod;
                $TVAprod = $produit->getTva2()->getId();
                $TVAV = $produit->getTva()->getId();
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
            return $response->setData(array('TVA'=>$TVAV,'puHT'=>$puHT,'puTTCa'=>$puTTCa,'puTTC'=>$puTTC,'pid'=>$pid,'tva2'=>$tva,'reference'=>$reference,'unite'=>$unite,'description'=>$description, 'TVAprod'=>$TVAprod,'prixHTvente'=>$prixHTvente,'puAchat'=>$puAchat, 'totalHT'=>$totalHT,'totalHTa'=>$totalHTa,'TTC'=>$TTC,'TTCa'=>$TTCa,'totalTVA'=>$totalTVA,'totalTVAa'=>$totalTVAa,'reduction'=>$REDUCTION,'totalReduction'=>$totalReduction,));
        }else{
            return $this->redirectToRoute('admin_bls_new');
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
