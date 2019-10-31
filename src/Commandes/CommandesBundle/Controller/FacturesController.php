<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Acheteurs;
use Commandes\CommandesBundle\Entity\Aprofact;
use Commandes\CommandesBundle\Entity\Aprodoc;
use Commandes\CommandesBundle\Entity\Departements;
use Commandes\CommandesBundle\Entity\Factures;
use Commandes\CommandesBundle\Entity\Bls;
use Commandes\CommandesBundle\Entity\SuiviFacts;
use Commandes\CommandesBundle\Entity\Produits;
use Commandes\CommandesBundle\Entity\Lots;
use Commandes\CommandesBundle\Entity\Ventes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\DBAL\DriverManager;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\EscposImage;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Facture controller.
 *
 */
class FacturesController extends Controller
{


    /**
     * Lists all facture entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $parametres = $em->getRepository('CommandesBundle:Paramettres')->findOneBy(array('user'=>$this->getUser()));

        $form2 = $this->createForm('Commandes\CommandesBundle\Form\PartrancheType');
        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()) {

            if ($form2->get('type')->getData() == 'fact') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Factures', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', 'u.montantpaye + ?2')
                    ->where('u.id = ?3')
                    ->andWhere('u.user = ?4')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->setParameter(4, $this->getUser())
                    ->getQuery();
                $p = $q->execute();


                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'factures_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));


                return $this->redirectToRoute('admin_factures_show', array('id' => $form2->get('id')->getData()));

            }


        }
        if($parametres->getParamGestion()->getTablesystem() == 'activer') {
            $form = $this->createForm('Commandes\CommandesBundle\Form\Filtre\FiltreFacturesType');
            $form->handleRequest($request);

        }else{

            $form = $this->createForm('Commandes\CommandesBundle\Form\Filtre\FiltreFacturesSansTableType');
            $form->handleRequest($request);


        }


        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->get('type')->getData();
            $etat = $form->get('etat')->getData();
            $periode = $form->get('periode')->getData();
            $du = $form->get('du')->getData();
            $au = $form->get('au')->getData();
            $valzone = $form->get('valzone')->getData();
            $zone = $valzone;

            if($parametres->getParamGestion()->getTablesystem() == 'activer'){
                $table = $form->get('tables')->getData();
            }else{
                $table = empty($table);
            }


            $user = $this->getUser();

            $mot = $form->get('mot')->getData();

            if ($periode == 'last_12_months') {
                $du = new \DateTime('now -1 day');
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


            if ($etat == 'tous') {
                $etat = empty($etat);
            }
            if ($type == 'tous') {
                $type = empty($type);
            }


            if($parametres->getParamGestion()->getTablesystem() == 'activer'){
                $factures = $em->getRepository('CommandesBundle:Factures')->search2($mot,$etat,$zone, $type,$du, $au, $user);
            }else{
                $factures = $em->getRepository('CommandesBundle:Factures')->searchSanstable($mot,$etat,$zone, $type,$du, $au, $user);
            }







            return $this->render('factures/index.html.twig', array(
                'factures' => $factures,

                'form' => $form->createView(),
                'form2' => $form2->createView(),
                'type'=>$type,
                'etat'=>$etat,
                'periode'=>$periode,
                'du'=>$du,
                'au'=>$au,
                'zone'=>$zone,
                'mot'=>$mot,
                'parametres'=>$parametres
            ));
        }



        if($parametres->getParamGestion()->getTablesystem() == 'activer'){
            $table = $form->get('tables')->getData();
        }else{
            $table = empty($table);
        }
        $type = $form->get('type')->getData();
        $etat = 'Créé';
        $periode = $form->get('periode')->getData();

        $zone = $form->get('valzone')->getData('value');

        $user = $this->getUser();

        $mot = $form->get('mot')->getData();

        if ($periode == 'last_12_months') {
            $du = new \DateTime('now -1 day');
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


        if ($etat == 'tous') {
            $etat = empty($etat);
        }
        if ($type == 'tous') {
            $type = empty($type);
        }

        if($parametres->getParamGestion()->getTablesystem() == 'activer'){

            $factures = $em->getRepository('CommandesBundle:Factures')->search2($zone,$etat, $type, $du, $au, $mot, $user,$table);

        }else{

            $factures = $em->getRepository('CommandesBundle:Factures')->searchSanstable($mot,$etat,$zone, $type,$du, $au, $user);

        }


        return $this->render('factures/index.html.twig', array(
            'factures' => $factures,

            'form' => $form->createView(),
            'form2' => $form2->createView(),
            'type'=>$type,
            'etat'=>$etat,
            'periode'=>$periode,
            'du'=>$du,
            'au'=>$au,
            'zone'=>$zone,
            'mot'=>$mot,
            'parametres'=>$parametres
        ));
    }

    /**
     * Creates a new facture entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $n = $em->getRepository('CommandesBundle:Factures')->findBy(array('user'=>$this->getUser()));
        $num = 1;
        foreach ($n as $n){
            $num = $n->getNf()+1;
        }
        $nf = $num;

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));
        $facture = new Factures();
        $form = $this->createForm('Commandes\CommandesBundle\Form\FacturesType', $facture);
        $form->handleRequest($request);
        $categories = $em->getRepository('CommandesBundle:Categories')->findBy(array('user'=>$this->getUser()));
        $produits = $em->getRepository('CommandesBundle:Produits')->findBy(array('user'=>$this->getUser(),'aff'=>1));
        $parametres = $em->getRepository('CommandesBundle:Paramettres')->findOneBy(array('user'=>$this->getUser()));

        if ($form->isSubmitted() && $form->isValid()) {

            if ($facture->getDepartements()->getId()) {

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
                    ->setParameter(1, $facture->getDepartements()->getNom())
                    ->setParameter(2, $facture->getDepartements()->getAdresse())
                    ->setParameter(3, $facture->getDepartements()->getNifselect())
                    ->setParameter(4, $facture->getDepartements()->getNif())
                    ->setParameter(5, $facture->getDepartements()->getCodepostal())
                    ->setParameter(6, $facture->getDepartements()->getVille())
                    ->setParameter(7, $facture->getDepartements()->getIban())
                    ->setParameter(8, $facture->getDepartements()->getBanque())
                    ->setParameter(9, $facture->getDepartements()->getBic())
                    ->setParameter(10, $facture->getDepartements()->getEmail())
                    ->setParameter(11, $facture->getDepartements()->getSiteweb())
                    ->setParameter(12, $facture->getDepartements()->getFax())
                    ->setParameter(13, $facture->getDepartements()->getTelephone())
                    ->setParameter(14, $facture->getDepartements()->getId())
                    ->setParameter(15, $facture->getDepartements()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();

                $facture->setDepartements($facture->getDepartements()->getId());
            }
            if ($facture->getAcheteur()->getId()) {

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
                    ->setParameter(1, $facture->getAcheteur()->getNom())
                    ->setParameter(2, $facture->getAcheteur()->getAdresse())
                    ->setParameter(3, $facture->getAcheteur()->getNifselect())
                    ->setParameter(4, $facture->getAcheteur()->getNif())
                    ->setParameter(5, $facture->getAcheteur()->getCodepostal())
                    ->setParameter(6, $facture->getAcheteur()->getVille())

                    ->setParameter(10, $facture->getAcheteur()->getEmail())
                    ->setParameter(11, $facture->getAcheteur()->getSiteweb())
                    ->setParameter(12, $facture->getAcheteur()->getFax())
                    ->setParameter(13, $facture->getAcheteur()->getTelephone())
                    ->setParameter(14, $facture->getAcheteur()->getId())
                    ->setParameter(15, $facture->getAcheteur()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();
                $facture->setAcheteur($facture->getAcheteur()->getId());
            }
            if ($facture->getVentes()) {

                $questionForms = $facture->getVentes();

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

                        $produit = new Produits();

                        $produit->setName($name);
                        $produit->setReference($reference);
                        $produit->setUnite($unite);
                        $produit->setPuHT($puHT);
                        $produit->setPuTTC($puTTC);
                        $produit->setTva($tva);

                        $produit->setPrixHt(0);
                        $produit->setTva2($tva);
                        $produit->setPrixTTC(0);

                        $produit->setQte( $qte);
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

            $facture->setType($facture->getType());
            $facture->setNf($facture->getNf());
            $facture->setLieu($facture->getLieu());
            $facture->setTables($facture->getTables());
            $facture->setAdditionnelle($facture->getAdditionnelle());
            $facture->setDateadd($facture->getDateadd());
            $facture->setDateregle($facture->getDateregle());
            $facture->setDatecreation(new \DateTime("now"));
            $facture->setUser($user);
            $em->persist($facture);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $suivi = new SuiviFacts();

            $suivi->setType('Création');
            $suivi->setFactures($facture);
            $suivi->setPar($this->getUser());
            $suivi->setDate(new \DateTime('now'));
            $suivi->setEtat($form->get('etat')->getData());
            $suivi->setPrix($form->get('montantpaye')->getData());
            $em->persist($suivi);
            $em->flush();
            $em = $this->getDoctrine()->getManager();
            $facture = $em->getRepository('CommandesBundle:Factures')->findById($facture);
            $ventes = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$facture));

            /*
            $connector = new  WindowsPrintConnector("imprimante AL-2600");
            $items = []; // Or array()

            foreach ($facture as $questionFormss) {

                $totalTTC =  $questionFormss->getTotalTTC();

                $nfact = $questionFormss->getNf();

                $table = $questionFormss->getTables();



            }

            foreach ($ventes as $questionFormss) {

                $name = $questionFormss->getName();

                $puHT = $questionFormss->getTotalTTC();

                $qte = $questionFormss->getQte();


                $items[] = new item( '('.$qte.')'.' '.$name, number_format($puHT, 2, '.', ' '));

            }







            $path = '../web/image/logo.png';
            $logo = EscposImage::load( $path, false);
            $printer = new Printer($connector);
            $printer->initialize();

            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> feedReverse(1);
            $printer -> bitImage($logo);
            $printer -> feed();

            $printer -> setEmphasis(false);
            $printer -> text($ladate->format('d-m-Y H:i')."\n Bon N° ".$nf);
            $printer -> feed(2);

            $printer -> setEmphasis(true);
            $printer -> text("ARTICLES\n");
            $printer -> setEmphasis(false);
            $printer -> text(new item('', 'DA'));
            $printer -> setEmphasis(false);
            foreach ($items as $item) {
                $printer -> text($item);
            }
            $printer -> setEmphasis(true);
            $printer -> text('TOTAL '.number_format($totalTTC, 2, '.', ' ').' DA');
            $printer -> selectPrintMode();

            $printer -> feed(2);
            $printer -> setJustification(Printer::JUSTIFY_CENTER);

            $printer -> text("\nMerci d'avoir choisi café 2a\n et à très bientôt.");


            $printer->setBarcodeHeight(40);
            $printer->setBarcodeWidth(2);

            $printer->selectPrintMode();

            $printer->feed(2);
            $printer -> cut(Printer::CUT_FULL, 1);
            $printer -> close();

            */
            return $this->redirectToRoute('admin_factures_index');


        }

        if($parametres->getParamGestion()->getGaleriephotos() == 'activer'){
            return $this->render('factures/newgalerie.html.twig', array(
                'facture' => $facture,
                'categories' => $categories,
                'produits' => $produits,
                'acheteursList' => $acheteursList,
                'form' => $form->createView(),
                'departements' => $departements,
                'nf' => $nf,
                'parametres'=>$parametres


            ));
        }else{
            return $this->render('factures/new.html.twig', array(
                'facture' => $facture,
                'categories' => $categories,
                'produits' => $produits,
                'acheteursList' => $acheteursList,
                'form' => $form->createView(),
                'departements' => $departements,
                'nf' => $nf,
                'parametres'=>$parametres


            ));
        }

    }

    /**
     * Finds and displays a facture entity.
     *
     */
    public function showAction(Factures $facture)
    {
        $em = $this->getDoctrine()->getManager();
        $img = $em->getRepository('CommandesBundle:Logos')->findOneBy(array('user' => $this->getUser()),array('id' => 'DESC'));
        $imgCachet = $em->getRepository('CommandesBundle:Cachets')->findOneBy(array('user' => $this->getUser()),array('id' => 'DESC'));


        $suivi = $em->getRepository('CommandesBundle:SuiviFacts')->findByFacture($facture);
        $ventes = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$facture));
        return $this->render('factures/show.html.twig', array(
            'facture' => $facture,
            'ventes' => $ventes,
            'suivi' => $suivi,
            'logo' => $img,
            'cachets' =>$imgCachet,


        ));
    }

    /**
     * Displays a form to edit an existing facture entity.
     *
     */
    public function editAction(Request $request, Factures $facture)
    {

        $editForm = $this->createForm('Commandes\CommandesBundle\Form\FacturesType', $facture);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $n = $em->getRepository('CommandesBundle:Factures')->findBy(array('user'=>$this->getUser()));
        $num = 1;
        foreach ($n as $n){
            $num = $n->getNf()+1;
        }
        $nf = $num;

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));
        $nf = $em->getRepository('CommandesBundle:Factures')->idfact($user);
        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            if ($facture->getDepartements()->getId()) {

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
                    ->setParameter(1, $facture->getDepartements()->getNom())
                    ->setParameter(2, $facture->getDepartements()->getAdresse())
                    ->setParameter(3, $facture->getDepartements()->getNifselect())
                    ->setParameter(4, $facture->getDepartements()->getNif())
                    ->setParameter(5, $facture->getDepartements()->getCodepostal())
                    ->setParameter(6, $facture->getDepartements()->getVille())
                    ->setParameter(7, $facture->getDepartements()->getIban())
                    ->setParameter(8, $facture->getDepartements()->getBanque())
                    ->setParameter(9, $facture->getDepartements()->getBic())
                    ->setParameter(10, $facture->getDepartements()->getEmail())
                    ->setParameter(11, $facture->getDepartements()->getSiteweb())
                    ->setParameter(12, $facture->getDepartements()->getFax())
                    ->setParameter(13, $facture->getDepartements()->getTelephone())
                    ->setParameter(14, $facture->getDepartements()->getId())
                    ->setParameter(15, $facture->getDepartements()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();

                $facture->setDepartements($facture->getDepartements()->getId());
            }

            if ($facture->getAcheteur()->getId()) {
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
                    ->setParameter(1, $facture->getAcheteur()->getNom())
                    ->setParameter(2, $facture->getAcheteur()->getAdresse())
                    ->setParameter(3, $facture->getAcheteur()->getNifselect())
                    ->setParameter(4, $facture->getAcheteur()->getNif())
                    ->setParameter(5, $facture->getAcheteur()->getCodepostal())
                    ->setParameter(6, $facture->getAcheteur()->getVille())
                    ->setParameter(10, $facture->getAcheteur()->getEmail())
                    ->setParameter(11, $facture->getAcheteur()->getSiteweb())
                    ->setParameter(12, $facture->getAcheteur()->getFax())
                    ->setParameter(13, $facture->getAcheteur()->getTelephone())
                    ->setParameter(15, $facture->getAcheteur()->getNrc())
                    ->setParameter(14, $facture->getAcheteur()->getId())
                    ->setParameter(16, $facture->getAcheteur()->getType())
                    ->setParameter(17, $user)
                    ->getQuery();
                $p = $q->execute();
                $facture->setAcheteur($facture->getAcheteur()->getId());
            }


            if ($facture->getVentes()) {

                $questionForms = $facture->getVentes();

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

                        $totalHT = $questionForm->getTotalHT();
                        $totalTTC = $questionForm->getTotalTTC();

                        $description = $questionForm->getDescription();
                        $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name,'user'=>$this->getUser()));

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

                        if($prods->getActivlot() == 1){

                            $lots = new Lots();
                            $lots->setProduits($produit);
                            $lots->setQte($qte);
                            $lots->setFactures($facture);

                            $em->persist($lots);
                            $em->flush();

                        }

                    }
                }
            }

            $facture->setType($facture->getType());
            $facture->setNf($facture->getNf());
            $facture->setLieu($facture->getLieu());
            $facture->setAdditionnelle($facture->getAdditionnelle());
            $facture->setDateadd($facture->getDateadd(new \DateTime('now')));
            $facture->setDateregle($facture->getDateregle());
            $facture->setDatecreation(new \DateTime('now'));
            $facture->setUser($user);


            $em->persist($facture);



            $em->flush();


            $em = $this->getDoctrine()->getManager();
            $factu = $em->getRepository('CommandesBundle:Factures')->findById($facture);
            $ventes = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$facture));

            /*
            $connector = new  WindowsPrintConnector("imprimante AL-2600");
            $items = [];

            foreach ($factu as $questionFormss) {



                $nfact = $questionFormss->getNf();

                $table = $questionFormss->getTables();



            }
            $total = 0;
              foreach ($ventes as $questionFormss) {

                $name = $questionFormss->getName();

                $puHT = $questionFormss->getTotalTTC();

                    $total += $questionFormss->getTotalTTC();

                $qte = $questionFormss->getQte();


                $items[] = new item( '('.$qte.')'.' '.$name, number_format($puHT, 2, '.', ' '));

            }

            $ladate = new \DateTime('now');

            $path = '../web/image/logo.png';
            $logo = EscposImage::load( $path, false);

            $printer = new Printer($connector);
            $printer->initialize();

            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> feedReverse(1);
            $printer -> bitImage($logo);
            $printer -> feed();

            $printer -> setEmphasis(false);
            $printer -> text($ladate->format('d-m-Y H:i')."\n Bon N° ".$facture->getNf());
            $printer -> feed(2);

            $printer -> setEmphasis(true);
            $printer -> text("ARTICLES\n");
            $printer -> setEmphasis(false);
            $printer -> text(new item('', 'DA'));
            $printer -> setEmphasis(false);
            foreach ($items as $item) {
                $printer -> text($item);
            }
            $printer -> setEmphasis(true);
            $printer -> text('TOTAL '.number_format($total, 2, '.', ' ').' DA');
            $printer -> selectPrintMode();

            $printer -> feed(2);
            $printer -> setJustification(Printer::JUSTIFY_CENTER);

            $printer -> text("\nMerci d'avoir choisi café 2a\n et à très bientôt.");

            $printer->setBarcodeHeight(40);
            $printer->setBarcodeWidth(2);

            $printer->selectPrintMode();

            $printer->feed(2);
            $printer -> cut(Printer::CUT_FULL, 1);
            $printer -> close();

            */

            return $this->redirectToRoute('admin_factures_index');
        }
        $em = $this->getDoctrine()->getManager();



        return $this->render('factures/edit.html.twig', array(
            'facture' => $facture,
            'acheteursList' => $acheteursList,
            'nf'=>$nf,
            'departements' => $departements,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a facture entity.
     *
     */
    public function deleteAction(Factures $facture)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($facture);
        $em->flush();

        return $this->redirectToRoute('admin_factures_index');
    }


    public function userAction($user)
    {
        $em = $this->getDoctrine()->getManager();
        $departements  = $em->getRepository('CommandesBundle:Factures')->findLast($user);
        if($departements){

            foreach($departements as $departement)
            {
                $val0 = $departement->getDepartements()->getId();
                $val1 = $departement->getDepartements()->getNom();
                $val2 = $departement->getDepartements()->getNifselect();
                $val3 = $departement->getDepartements()->getNif();
                $val4 = $departement->getDepartements()->getAdresse();
                $val5 = $departement->getDepartements()->getCodepostal();
                $val6 = $departement->getDepartements()->getVille();
                $val7 = $departement->getDepartements()->getEmail();
                $val8 = $departement->getDepartements()->getSiteweb();
                $val9 = $departement->getDepartements()->getFax();
                $val10 = $departement->getDepartements()->getTelephone();
                $val20 = $departement->getDepartements()->getNrc();

            }
            $id = $val0;
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
            $nrc = $val20;
            $response = new JsonResponse();
            $response->setContent(json_encode($nom));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(
                'id'=>$id,
                'nom'=>$nom,
                'nifselect'=>$nifselect,
                'nif'=>$nif,
                'nrc'=>$nrc,
                'adresse'=>$adresse,
                'codepostal'=>$codepostal,
                'ville'=>$ville,
                'email'=>$email,
                'siteweb'=>$siteweb,
                'fax'=>$fax,
                'telephone'=>$telephone,

            ));
        }else{
            $em = $this->getDoctrine()->getManager();


            $departements  = $em->getRepository('CommandesBundle:Departements')->findByLastId($user);
            foreach($departements as $departement)
            {
                $val0 = $departement->getId();
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
                $val20 = $departement->getNrc();
            }
            $id= $val0;
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
            $nrc = $val20;
            $response = new JsonResponse();
            $response->setContent(json_encode($nom));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(
                'id'=>$id,
                'nom'=>$nom,
                'nifselect'=>$nifselect,
                'nif'=>$nif,
                'nrc'=>$nrc,
                'adresse'=>$adresse,
                'codepostal'=>$codepostal,
                'ville'=>$ville,
                'email'=>$email,
                'siteweb'=>$siteweb,
                'fax'=>$fax,
                'telephone'=>$telephone,

            ));
        }
    }
    public function depAction($dep)
    {

        if($dep){
            $em = $this->getDoctrine()->getManager();
            $me = $this->getUser();
            $departements  = $em->getRepository('CommandesBundle:Departements')->findBy(array('id'=>$dep));

            foreach($departements as $departement)
            {
                $val0 = $departement->getId();
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
                $val20 = $departement->getNrc();
            }
            $id = $val0;
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
            $nrc = $val20;
            $response = new JsonResponse();
            $response->setContent(json_encode($nom));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(
                'id'=>$id,
                'nom'=>$nom,
                'nifselect'=>$nifselect,
                'nif'=>$nif,
                'nrc'=>$nrc,
                'adresse'=>$adresse,
                'codepostal'=>$codepostal,
                'ville'=>$ville,
                'email'=>$email,
                'siteweb'=>$siteweb,
                'fax'=>$fax,
                'telephone'=>$telephone,

            ));
        }
    }
    public function acheteurAction($acheteur)
    {
        if($acheteur){
            $em = $this->getDoctrine()->getManager();
            $clients = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('id'=>$acheteur));

            foreach($clients as $client)
            {
                $val10 = $client->getTelephone();
                $val1 = $client->getNom();
                $val2 = $client->getNifselect();
                $val3 = $client->getNif();
                $val4 = $client->getAdresse();
                $val5 = $client->getCodepostal();
                $val6 = $client->getVille();
                $val7 = $client->getEmail();
                $val8 = $client->getSiteweb();
                $val9 = $client->getFax();
                $val20 = $client->getNrc();
                $val21 = $client->getId();
            }
            $telephone = $val10;
            $nom = $val1;
            $nifselect = $val2;
            $nif = $val3;
            $adresse = $val4;
            $codepostal = $val5;
            $ville = $val6;
            $email = $val7;
            $siteweb = $val8;
            $fax = $val9;
            $nrc = $val20;
            $id = $val21;



            $response = new JsonResponse();
            $response->setContent(json_encode($nom));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(

                'nom'=>$nom,
                'nifselect'=>$nifselect,
                'nif'=>$nif,
                'nrc'=>$nrc,
                'adresse'=>$adresse,
                'codepostal'=>$codepostal,
                'ville'=>$ville,
                'email'=>$email,
                'siteweb'=>$siteweb,
                'fax'=>$fax,
                'telephone'=>$telephone,
                'id'=>$id,

            ));
        }else{
            return $this->redirectToRoute('admin_factures_new');
        }
    }


    public function prodAction($prod,$qte,$tva,$reduction)
    {
        if($prod ){
            $em = $this->getDoctrine()->getManager();
            $produit  = $em->getRepository('CommandesBundle:Produits')->findById($prod);

            foreach($produit as $produit)
            {
                $id = $produit->getId();
                $TVAprod = $produit->getTva()->getId();

                $unite= $produit->getUnite();
                $description= $produit->getDescription();
                $val= $produit->getReference();
                $val2= $produit->getPuHT();
                $puAchat = $produit->getPrixHT();
                $prixTTCAchat = $produit->getPrixTTC();
            }


            $reference = $val;
            $prixHTvente = $val2;
            $totalHT = $val2 * $qte;
            $totalHTa = $puAchat * $qte;
            $TVA = $tva / 100 ;


            $TTC = $totalHT * $TVA + $totalHT;

            $totalTVA = $totalHT * $TVA;

            $REDUCTION = $reduction * $totalHT / 100;

            $totalReduction =  $totalHT - $REDUCTION;

            $response = new JsonResponse();
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array('id'=>$id,'prixttcachat'=>$prixTTCAchat,'totalHTa'=>$totalHTa,'reference'=>$reference,'unite'=>$unite,'description'=>$description, 'TVAprod'=>$TVAprod,'prixHTvente'=>$prixHTvente,'puAchat'=>$puAchat, 'totalHT'=>$totalHT,'TTC'=>$TTC,'totalTVA'=>$totalTVA,'reduction'=>$REDUCTION,'totalReduction'=>$totalReduction,));



        }else{
            return $this->redirectToRoute('admin_factures_new');
        }


    }

    public function qteAction($qte,$pu,$tva,$totalht,$reduction)
    {
        if($qte && $pu && $tva && $totalht){
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


            $REDUCTION = $reduction * $totalHT / 100;
            $totalReduction =  $TTC - $REDUCTION;

            $response = new JsonResponse();
            $response->setContent(json_encode($totalHT));
            $response->headers->set('Content-Type','application/json');
            return $response->setData(array('totalHT'=>$totalHT,'TTC'=>$TTC,'totalTVA'=>$totalTVA,'reduction'=>$REDUCTION,'totalReduction'=>$totalReduction));
        }else{
            return $this->redirectToRoute('admin_factures_new');
        }
    }


    public function etatAction($id,$etat,$ttc)
    {
        $em = $this->getDoctrine()->getManager();


        if($etat == 'Créé'){

            $qb = $em->createQueryBuilder();
            $q = $qb->update('CommandesBundle:Factures', 'u')

                ->set('u.etat','?1')

                ->where('u.id = ?2')

                ->setParameter(1,$etat)
                ->setParameter(2,$id)
                ->getQuery();
            $p = $q->execute();
            $date = date('Y-m-d H:i:s');
            $conn = $this->get('database_connection');
            $conn->insert('suivi_facts', array(
                'type'=>'Modification_etat',
                'factures_id' => $id,
                'par'=>$this->getUser(),
                'date' => $date,
                'etat'=>$etat,
                'prix'=>$ttc,

            ));


            $em = $this->getDoctrine()->getManager();
            $factu = $em->getRepository('CommandesBundle:Factures')->findById($id);
            $ventes = $em->getRepository('CommandesBundle:Ventes')->findBy(array('factures'=>$id));
            $connector = new  WindowsPrintConnector("imprimante AL-2600");
            $items = []; // Or array()

            foreach ($factu as $questionFormss) {



                $nfact = $questionFormss->getNf();

                $table = $questionFormss->getTables();



            }
            $total = 0;
            foreach ($ventes as $questionFormss) {

                $name = $questionFormss->getName();

                $puHT = $questionFormss->getTotalTTC();

                $total += $questionFormss->getTotalTTC();

                $qte = $questionFormss->getQte();


                $items[] = new item( '('.$qte.')'.' '.$name, number_format($puHT, 2, '.', ' '));

            }



            /* Date is kept the same for testing */
// $date = date('l jS \of F Y h:i:s A');


            $ladate = new \DateTime('now');
            /* Start the printer */

            $path = '../web/image/logo.png'; //exit($path);
            $logo = EscposImage::load( $path, false); //exit(var_dump($img_logo));

            $printer = new Printer($connector);
            $printer->initialize();
            /* Print top logo */
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> feedReverse(1);
            $printer -> bitImage($logo);
            $printer -> feed();

            $printer -> setEmphasis(false);
            $printer -> text($ladate->format('d-m-Y H:i')."\n Bon N° ".$nfact);
            $printer -> feed(2);
            /* Title of receipt */
            $printer -> setEmphasis(true);
            $printer -> text("ARTICLES\n");
            $printer -> setEmphasis(false);
            $printer -> text(new item('', 'DA'));
            $printer -> setEmphasis(false);
            foreach ($items as $item) {
                $printer -> text($item);
            }
            $printer -> setEmphasis(true);
            $printer -> text('TOTAL '.number_format($total, 2, '.', ' ').' DA');
            $printer -> selectPrintMode();
            /* Footer */
            $printer -> feed(2);
            $printer -> setJustification(Printer::JUSTIFY_CENTER);

            $printer -> text("\nMerci d'avoir choisi café 2a\n et à très bientôt.");

            /* Cut the receipt and open the cash drawer */
            $printer->setBarcodeHeight(40);
            $printer->setBarcodeWidth(2);
            /* Text position */
            $printer->selectPrintMode();

            $printer->feed(2);
            $printer -> cut(Printer::CUT_FULL, 1);
            $printer -> close();

        }
        else if($etat == 'Payé'){

            $qb = $em->createQueryBuilder();
            $q = $qb->update('CommandesBundle:Factures', 'u')

                ->set('u.etat','?1')
                ->set('u.montantpaye', '?3')

                ->where('u.id = ?2')

                ->setParameter(1,$etat)
                ->setParameter(2,$id)
                ->setParameter(3,$ttc)
                ->getQuery();
            $p = $q->execute();

            $date = date('Y-m-d H:i:s');
            $conn = $this->get('database_connection');
            $conn->insert('suivi_facts', array(
                'type'=>'Modification_etat',
                'factures_id' => $id,
                'par'=>$this->getUser(),
                'date' => $date,
                'etat'=>$etat,
                'prix'=>$ttc,

            ));


        }


        $response = new JsonResponse();
        $response->setContent(json_encode($id));
        $response->headers->set('Content-Type','application/json');

        return $response->setData(array('id'=>$id,));


    }



    public function pdfAction(Factures $facture)
    {
        $em = $this->getDoctrine()->getManager();
        $factures = $em->getRepository('CommandesBundle:Factures')->findByid($facture);
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();
        $mpdfService = $this->get('tfox.mpdfport');
        $mPDF = $mpdfService->getMpdf();

        $html = $this->renderView('UtilisateursBundle:Default:layout/facturePDF.html.twig',
            array(
                'factures' => $factures,
                'logo' => $logo
            ));

        $mPDF->WriteHTML($html);
        $mPDF->Output('Facture-'.$facture->getNf().'.pdf','D');

        if (!$facture) {
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirect($this->generateUrl('facutres'));
        }


    }


    public function allpdfAction($type,$periode,$etat,$zone,$du,$au,$mot)
    {

        $em = $this->getDoctrine()->getManager();

        if($periode == 'last_12_months'){
            $du = new \DateTime('now -1 day');
            $au = new \DateTime('now');
        }else if ($periode == 'this_month'){
            $du = new \DateTime('first day of this month');
            $au = new \DateTime('last day of this month');

        }else if ($periode == 'last_30_days'){
            $du = new \DateTime('now -12 day');
            $au = new \DateTime('now');

        }else if ($periode == 'last_month'){
            $du = new \DateTime('first day of first month ');
            $au = new \DateTime('last day of first month');

        }else if ($periode == 'this_year'){
            $du = new \DateTime('first day of this year');
            $au = new \DateTime('last day of this year');

        }else if ($periode == 'last_year'){
            $du = new \DateTime('first day of -1 year');
            $au = new \DateTime('last day of -1 year');

        }else if ($periode == 'tous'){
            $du = new \DateTime('first day of -1 year');
            $au = new \DateTime('last day of +1 year');

        }


        if($etat == 'tous'){
            $etat = empty($etat);
        }
        if($type == 'tous'){
            $type = empty($type);
        }
        if($zone == 'tous'){
            $zone = empty($zone);
        }
        if($mot == 'tous'){
            $mot = empty($mot);
        }

        $factures = $em->getRepository('CommandesBundle:Factures')->searchSanstable($mot,$etat,$zone,$type,$du,$au,$this->getUser());
        $devis = $em->getRepository('CommandesBundle:Devis')->search($etat,$type,$du,$au,$zone,$mot,$this->getUser());
        $recus = $em->getRepository('CommandesBundle:Recus')->search($etat,$type,$du,$au,$zone,$mot,$this->getUser());
        $proformas = $em->getRepository('CommandesBundle:Proformas')->search($etat,$type,$du,$au,$zone,$mot,$this->getUser());
        $bdc = $em->getRepository('CommandesBundle:Bonscommandes')->search($etat,$type,$du,$au,$zone,$mot,$this->getUser());
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();

        $mpdfService = $this->get('tfox.mpdfport');
        $mPDF = $mpdfService->getMpdf();

        $html = $this->renderView('UtilisateursBundle:Default:layout/allpdf.html.twig',
            array(
                'factures' => $factures,
                'devis' => $devis,
                'recus' => $recus,
                'proformas' => $proformas,
                'bdc' => $bdc,
                'logo' => $logo));

        $mPDF->WriteHTML($html);
        $mPDF->Output('Factures.pdf','D');
    }

    public function envoisAction(Request $request, Factures $facture)
    {

        $editForm = $this->createForm('Commandes\CommandesBundle\Form\EnvoisType');
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();
        $mpdfService = $this->get('tfox.mpdfport');
        $mPDF = $mpdfService->getMpdf();

        $html = $this->renderView('UtilisateursBundle:Default:layout/pdfMail.html.twig',
            array(
                'logo' => $logo,
                'facture' => $facture));

        $mPDF->WriteHTML($html);
        $content = $mPDF->Output('','S');

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $transport = \Swift_MailTransport::newInstance();

            // Create the Mailer using your created Transport
            $mailer = \Swift_Mailer::newInstance($transport);
            if($editForm->get('document')->getData()){
                $attachment = new \Swift_Attachment($content, 'Facture-'.$facture->getNf(), 'application/pdf');


                $emails = $editForm->get('adresseEmail')->getData();

                if( $editForm->get('copie')->getData()){
                    $copie = $editForm->get('copie')->getData();
                }else{
                    $copie = $editForm->get('adresseEmail')->getData();
                }

                $logo2 = $em->getRepository('CommandesBundle:Logos')->findLast();
                $message = \Swift_Message::newInstance()

                    ->setSubject($editForm->get('titre')->getData())
                    ->setFrom($editForm->get('expediteur')->getData())
                    ->setTo([$emails,$copie])
                    ->setBody(
                        $this->renderView(
                        // templates/emails/registration.html.twig
                            'UtilisateursBundle:Default:emails/factureMail.html.twig',
                            array('facture' => $facture,
                                'logo' => $logo2,
                                'texte'=>$editForm->get('texte')->getData()

                            )
                        ),
                        'text/html'
                    )
                    ->attach($attachment);





            }else{

                $emails = $editForm->get('adresseEmail')->getData();
                if( $editForm->get('copie')->getData()){
                    $copie = $editForm->get('copie')->getData();
                }else{
                    $copie = $editForm->get('adresseEmail')->getData();
                }
                $logo2 = $em->getRepository('CommandesBundle:Logos')->findLast();
                $message = \Swift_Message::newInstance()
                    ->setSubject($editForm->get('titre')->getData())
                    ->setFrom($editForm->get('expediteur')->getData())
                    ->setTo([$emails,$copie])
                    ->setBody(
                        $this->renderView(
                        // templates/emails/registration.html.twig
                            'UtilisateursBundle:Default:emails/factureMail.html.twig',
                            array('facture' => $facture,'texte'=>
                                $editForm->get('texte')->getData(),
                                'logo' => $logo2,
                            )
                        ),
                        'text/html'
                    )
                    ->setReadReceiptTo($editForm->get('expediteur')->getData())
                ;




            }


            $mailer->send($message);


            return $this->redirectToRoute('admin_factures_show', array('id' => $facture->getId()));
        }

        return $this->render('factures/envois.html.twig',array(
            'facture' => $facture,
            'edit_form' => $editForm->createView(),

        ));
    }


    public function showClientAction(Factures $facture)
    {


        $em = $this->getDoctrine()->getManager();
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();

        $suivi = $em->getRepository('CommandesBundle:SuiviFacts')->findByFacture($facture);
        return $this->render('factures/viewClient.html.twig', array(
            'facture' => $facture,
            'logo' => $logo,
            'suivi' => $suivi,


        ));
    }

    public function autocompleteAction(Request $request)
    {

        $data = $request->get('input');

        $em = $this->getDoctrine()->getManager();


        $query = $em->createQuery(''
            . 'SELECT c.id, c.name,c.reference,c.puHT  '
            . 'FROM CommandesBundle:Produits c '
            . 'WHERE c.name LIKE :data '
            . 'AND c.aff = :aff '
            . 'AND c.user = :user '
            . ' ORDER BY c.name ASC '
        )
            ->setParameter('user',$this->getUser())
            ->setParameter('aff',1)
            ->setParameter('data', '%' . $data . '%');
        $results = $query->getResult();

        $countryList = '<ul id="matchList" style="position: absolute;top: -9px;left: 5px;border: none; "  class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all">';
        foreach ($results as $result) {
            $matchStringBold = preg_replace('/(' . $data . ')/i', '<strong>$1</strong>', $result['name']); // Replace text field input by bold one
            $countryList .= '<li value="'.$result['id'].'" class="ui-menu-item" id="' . $result['name'] . '"><a class="ui-corner-all" >' . $matchStringBold . ' ('.$result['reference'] .') '. $result['puHT'] .' DA'.'</a></li>'; // Create the matching list - we put maching name in the ID too
        }
        $countryList .= '</ul>';


        $response = new JsonResponse();
        $response->headers->set('Content-Type','application/json');
        $response->setData(array('countryList' => $countryList));

        return $response;



    }

    public function acheteurcompleteAction(Request $request)
    {

        $data = $request->get('input');

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(''
            . 'SELECT c.id, c.nom,c.prenom,c.famille,c.nomusage,c.type,c.adresse,c.codepostal,c.ville,c.civilite,c.nifselect,c.nif,c.nrc '
            . 'FROM CommandesBundle:Acheteurs c '
            . 'WHERE c.nom LIKE :data'
            . ' AND c.user = :user'
            . ' AND c.supp = :supp'
            . ' ORDER BY c.nom ASC'
        )
            ->setParameter('user',$this->getUser())
            ->setParameter('supp',0)
            ->setParameter('data', '%' . $data . '%')
        ;
        $results = $query->getResult();

        $countryList = '<ul id="matchList" style="position: absolute;width:100%;top: -9px;left: 5px; border: none;"  class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all">';
        foreach ($results as $result) {
            $matchStringBold = preg_replace('/(' . $data . ')/i', '<strong>$1</strong>', $result['nom']); // Replace text field input by bold one
            $countryList .= '<li value="'.$result['id'].'" class="ui-menu-item" id="' . $result['nom'] . '"><a class="ui-corner-all" >' . $matchStringBold .'</a></li>'; // Create the matching list - we put maching name in the ID too
        }
        $countryList .= '</ul>';

        $response = new JsonResponse();
        $response->headers->set('Content-Type','application/json');
        $response->setData(array('acheteur' => $countryList));
        return $response;



    }



}
class item
{
    private $name;
    private $price;
    private $dollarSign;
    public function __construct($name = '', $price = '', $dollarSign = false)
    {
        $this -> name = $name;
        $this -> price = $price;
        $this -> dollarSign = $dollarSign;
    }

    public function __toString()
    {
        $rightCols = 10;
        $leftCols = 38;
        if ($this -> dollarSign) {
            $leftCols = $leftCols / 2 - $rightCols / 2;
        }
        $left = str_pad($this -> name, $leftCols) ;

        $sign = ($this -> dollarSign ? ' ' : '');
        $right = str_pad($sign . $this -> price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }
}