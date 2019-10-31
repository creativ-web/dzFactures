<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Acheteurs;
use Commandes\CommandesBundle\Entity\Aprofact;
use Commandes\CommandesBundle\Entity\Departements;
use Commandes\CommandesBundle\Entity\Proformas;
use Commandes\CommandesBundle\Entity\SuiviFacts;
use Commandes\CommandesBundle\Entity\Produits;
use Commandes\CommandesBundle\Entity\Ventes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\DBAL\DriverManager;
/**
 * Proforma controller.
 *
 */
class ProformasController extends Controller
{



    /**
     * Lists all proforma entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $form2 = $this->createForm('Commandes\CommandesBundle\Form\PartrancheType');
        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()) {

            if ($form2->get('type')->getData() == 'fact') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Factures', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
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

            if ($form2->get('type')->getData() == 'proforma') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Proformas', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->getQuery();
                $p = $q->execute();
                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'proformas_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));
                return $this->redirectToRoute('admin_proformas_show', array('id' => $form2->get('id')->getData()));

            }
            if ($form2->get('type')->getData() == 'recu') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Recus', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->getQuery();
                $p = $q->execute();
                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'recus_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));
                return $this->redirectToRoute('admin_recus_show', array('id' => $form2->get('id')->getData()));

            }

            if ($form2->get('type')->getData() == 'devis') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Devis', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->getQuery();
                $p = $q->execute();
                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'devis_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));
                return $this->redirectToRoute('admin_devis_show', array('id' => $form2->get('id')->getData()));

            }
            if ($form2->get('type')->getData() == 'bdc') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Bonscommandes', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->getQuery();
                $p = $q->execute();
                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'bonscommandes_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));
                return $this->redirectToRoute('admin_bdc_show', array('id' => $form2->get('id')->getData()));

            }
        }
        $form = $this->createForm('Commandes\CommandesBundle\Form\Filtre\FiltreProformasType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->get('type')->getData();
            $etat = $form->get('etat')->getData();
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


            if ($etat == 'tous') {
                $etat = empty($etat);
            }
            if ($type == 'tous') {
                $type = empty($type);
            }
            if ($zone == 'tous') {

                $factures = $em->getRepository('CommandesBundle:Factures')->search2($etat, $type, $du, $au, $mot, $user);
                $proformas = $em->getRepository('CommandesBundle:Proformas')->search2($etat, $type, $du, $au, $mot, $user);
                $devis = $em->getRepository('CommandesBundle:Devis')->search2($etat, $type, $du, $au, $mot, $user);
                $recus = $em->getRepository('CommandesBundle:Recus')->search2($etat, $type, $du, $au, $mot, $user);
                $bdc = $em->getRepository('CommandesBundle:Bonscommandes')->search2($etat, $type, $du, $au, $mot, $user);


            } else {
                $factures = $em->getRepository('CommandesBundle:Factures')->search($etat, $type, $du, $au, $zone, $mot, $user);
                $proformas = $em->getRepository('CommandesBundle:Proformas')->search($etat, $type, $du, $au, $zone, $mot, $user);
                $devis = $em->getRepository('CommandesBundle:Devis')->search($etat, $type, $du, $au, $zone, $mot, $user);
                $recus = $em->getRepository('CommandesBundle:Recus')->search($etat, $type, $du, $au, $zone, $mot, $user);
                $bdc = $em->getRepository('CommandesBundle:Bonscommandes')->search($etat, $type, $du, $au, $zone, $mot, $user);

            }
            return $this->render('proformas/index.html.twig', array(
                'factures' => $factures,
                'devis' => $devis,
                'recus' => $recus,
                'proformas' => $proformas,
                'bdc' => $bdc,
                'form' => $form->createView(),
                'form2' => $form2->createView(),
                'type'=>$type,
                'etat'=>$etat,
                'periode'=>$periode,
                'du'=>$du,
                'au'=>$au,
                'zone'=>$zone,
                'mot'=>$mot
            ));
        }
        $type = $form->get('type')->getData();
        $etat = $form->get('etat')->getData();
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


        if ($etat == 'tous') {
            $etat = empty($etat);
        }
        if ($type == 'tous') {
            $type = empty($type);
        }

            $table = empty($table);

        $proformas = $em->getRepository('CommandesBundle:Proformas')->search2($etat, $type, $du, $au, $mot, $user);
        $devis = $em->getRepository('CommandesBundle:Devis')->search2($etat, $type, $du, $au, $mot, $user);
        $recus = $em->getRepository('CommandesBundle:Recus')->search2($etat, $type, $du, $au, $mot, $user);
        $bdc = $em->getRepository('CommandesBundle:Bonscommandes')->search2($etat, $type, $du, $au, $mot, $user);

        return $this->render('proformas/index.html.twig', array(

            'devis' => $devis,
            'recus' => $recus,
            'proformas' => $proformas,
            'bdc' => $bdc,
            'form' => $form->createView(),
            'form2' => $form2->createView(),
            'type'=>$type,
            'etat'=>$etat,
            'periode'=>$periode,
            'du'=>$du,
            'au'=>$au,
            'zone'=>$zone,
            'mot'=>$mot
        ));
    }


    /**
     * Creates a new proforma entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $nf = $em->getRepository('CommandesBundle:Proformas')->idfact($user);
        $proforma = new Proformas();
        $form = $this->createForm('Commandes\CommandesBundle\Form\ProformasType', $proforma);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($proforma->getDepartements()->getId()) {

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
                    ->setParameter(1, $proforma->getDepartements()->getNom())
                    ->setParameter(2, $proforma->getDepartements()->getAdresse())
                    ->setParameter(3, $proforma->getDepartements()->getNifselect())
                    ->setParameter(4, $proforma->getDepartements()->getNif())
                    ->setParameter(5, $proforma->getDepartements()->getCodepostal())
                    ->setParameter(6, $proforma->getDepartements()->getVille())
                    ->setParameter(7, $proforma->getDepartements()->getIban())
                    ->setParameter(8, $proforma->getDepartements()->getBanque())
                    ->setParameter(9, $proforma->getDepartements()->getBic())
                    ->setParameter(10, $proforma->getDepartements()->getEmail())
                    ->setParameter(11, $proforma->getDepartements()->getSiteweb())
                    ->setParameter(12, $proforma->getDepartements()->getFax())
                    ->setParameter(13, $proforma->getDepartements()->getTelephone())
                    ->setParameter(14, $proforma->getDepartements()->getId())
                    ->setParameter(15, $proforma->getDepartements()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();

                $proforma->setDepartements($proforma->getDepartements()->getId());
            }
            if ($proforma->getAcheteur()->getId()) {

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
                    ->setParameter(1, $proforma->getAcheteur()->getNom())
                    ->setParameter(2, $proforma->getAcheteur()->getAdresse())
                    ->setParameter(3, $proforma->getAcheteur()->getNifselect())
                    ->setParameter(4, $proforma->getAcheteur()->getNif())
                    ->setParameter(5, $proforma->getAcheteur()->getCodepostal())
                    ->setParameter(6, $proforma->getAcheteur()->getVille())

                    ->setParameter(10, $proforma->getAcheteur()->getEmail())
                    ->setParameter(11, $proforma->getAcheteur()->getSiteweb())
                    ->setParameter(12, $proforma->getAcheteur()->getFax())
                    ->setParameter(13, $proforma->getAcheteur()->getTelephone())
                    ->setParameter(14, $proforma->getAcheteur()->getId())
                    ->setParameter(15, $proforma->getAcheteur()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();
                $proforma->setAcheteur($proforma->getAcheteur()->getId());
            }

            if ($proforma->getVentes()) {

                $questionForms = $proforma->getVentes();

                foreach ($questionForms as $questionForm)
                {
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
                    $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name));



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
                            ->where('u.name = ?1')
                            ->andWhere('u.user = ?8')
                            ->setParameter(1,$name)
                            ->setParameter(2,$reference)
                            ->setParameter(3,$unite)
                            ->setParameter(4,$puHT)
                            ->setParameter(5,$tva)
                            ->setParameter(6,$qte)
                            ->setParameter(7,$description)
                            ->setParameter(8,$user)
                            ->getQuery();
                        $p = $q->execute();


                    } else{

                        $produit = new Produits();
                        $produit->setName($name);
                        $produit->setReference($reference);
                        $produit->setUnite($unite);
                        $produit->setPuHT($puHT);
                        $produit->setTva($tva);
                        $produit->setQte($qte);
                        $produit->setQtedefault(1);
                        $produit->setDp(0);
                        $produit->setAff(1);
                        $produit->setDescription($description);
                        $produit->setUser($user);
                        $em->persist($produit);
                        $em->flush();


                    }



                }



            }


            $proforma->setType($proforma->getType());
            $proforma->setNf($proforma->getNf());
            $proforma->setLieu($proforma->getLieu());
            $proforma->setAdditionnelle($proforma->getAdditionnelle());
            $proforma->setDateadd($proforma->getDateadd());

            $proforma->setDateregle($proforma->getDateregle());
            $proforma->setUser($user);


            $em->persist($proforma);

            $em = $this->getDoctrine()->getManager();
            $suivi = new SuiviFacts();

            $suivi->setType('Création');
            $suivi->setProformas($proforma);
            $suivi->setPar($this->getUser());
            $suivi->setDate(new \DateTime('now'));
            $suivi->setEtat($form->get('etat')->getData());
            $suivi->setPrix($form->get('montantpaye')->getData());


            $em->persist($suivi);


            $em->flush();


            return $this->redirectToRoute('admin_proformas_show', array('id' => $proforma->getId()));

        }

        $em = $this->getDoctrine()->getManager();
        $stocks = $em->getRepository('CommandesBundle:Stocks')->findAll();

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));
        return $this->render('proformas/new.html.twig', array(
            'proforma' => $proforma,
            'acheteursList' => $acheteursList,
            'form' => $form->createView(),
            'stocks' => $stocks,
            'departements' => $departements,
            'nf' => $nf,


        ));
    }

    /**
     * Finds and displays a proforma entity.
     *
     */
    public function showAction(Proformas $proforma)
    {

        $em = $this->getDoctrine()->getManager();
        $img = $em->getRepository('CommandesBundle:Logos')->findOneBy(array('user' => $this->getUser()),array('id' => 'DESC'));
        $imgCachet = $em->getRepository('CommandesBundle:Cachets')->findOneBy(array('user' => $this->getUser()),array('id' => 'DESC'));


        $suivi = $em->getRepository('CommandesBundle:SuiviFacts')->findByproforma($proforma);
        return $this->render('proformas/show.html.twig', array(
            'proforma' => $proforma,
            'logo' => $img,
            'cachets' =>$imgCachet,
            'suivi' => $suivi,


        ));
    }

    /**
     * Displays a form to edit an existing proforma entity.
     *
     */
    public function editAction(Request $request, Proformas $proforma)
    {

        $editForm = $this->createForm('Commandes\CommandesBundle\Form\ProformasType', $proforma);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            if ($proforma->getDepartements()->getId()) {

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
                    ->setParameter(1, $proforma->getDepartements()->getNom())
                    ->setParameter(2, $proforma->getDepartements()->getAdresse())
                    ->setParameter(3, $proforma->getDepartements()->getNifselect())
                    ->setParameter(4, $proforma->getDepartements()->getNif())
                    ->setParameter(5, $proforma->getDepartements()->getCodepostal())
                    ->setParameter(6, $proforma->getDepartements()->getVille())
                    ->setParameter(7, $proforma->getDepartements()->getIban())
                    ->setParameter(8, $proforma->getDepartements()->getBanque())
                    ->setParameter(9, $proforma->getDepartements()->getBic())
                    ->setParameter(10, $proforma->getDepartements()->getEmail())
                    ->setParameter(11, $proforma->getDepartements()->getSiteweb())
                    ->setParameter(12, $proforma->getDepartements()->getFax())
                    ->setParameter(13, $proforma->getDepartements()->getTelephone())
                    ->setParameter(14, $proforma->getDepartements()->getId())
                    ->setParameter(15, $proforma->getDepartements()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();

                $proforma->setDepartements($proforma->getDepartements()->getId());
            }

            if ($proforma->getAcheteur()->getId()) {
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
                    ->setParameter(1, $proforma->getAcheteur()->getNom())
                    ->setParameter(2, $proforma->getAcheteur()->getAdresse())
                    ->setParameter(3, $proforma->getAcheteur()->getNifselect())
                    ->setParameter(4, $proforma->getAcheteur()->getNif())
                    ->setParameter(5, $proforma->getAcheteur()->getCodepostal())
                    ->setParameter(6, $proforma->getAcheteur()->getVille())
                    ->setParameter(10, $proforma->getAcheteur()->getEmail())
                    ->setParameter(11, $proforma->getAcheteur()->getSiteweb())
                    ->setParameter(12, $proforma->getAcheteur()->getFax())
                    ->setParameter(13, $proforma->getAcheteur()->getTelephone())
                    ->setParameter(15, $proforma->getAcheteur()->getNrc())
                    ->setParameter(14, $proforma->getAcheteur()->getId())
                    ->setParameter(16, $proforma->getAcheteur()->getType())
                    ->setParameter(17, $user)
                    ->getQuery();
                $p = $q->execute();
                $proforma->setAcheteur($proforma->getAcheteur()->getId());
            }


            if ($proforma->getVentes()) {

                $questionForms = $proforma->getVentes();

                if($questionForms){

                    foreach ($questionForms as $questionForm)
                    {
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
                        $prods = $em->getRepository('CommandesBundle:Produits')->findBy(array('name'=>$name));
                        foreach ($prods as $prod){
                            $product = $prod->getName();
                            $idproduct = $prod->getId();
                            $qteproduct = $prod->getQte();

                            $qteprod = $prod->getQte();
                            $idprod = $prod->getId();

                        }
                        if($product == $name){
                            $qb = $em->createQueryBuilder();
                            $q = $qb->update('CommandesBundle:Produits', 'u')

                                ->set('u.name','?1')
                                ->set('u.reference','?2')
                                ->set('u.unite','?3')
                                ->set('u.puHT','?4')
                                ->set('u.tva','?5')
                                ->set('u.qte','?6')
                                ->set('u.description','?7')
                                ->where('u.name = ?1')
                                ->andWhere('u.user = ?8')
                                ->setParameter(1,$name)
                                ->setParameter(2,$reference)
                                ->setParameter(3,$unite)
                                ->setParameter(4,$puHT)
                                ->setParameter(5,$tva)
                                ->setParameter(6,$qte)
                                ->setParameter(7,$description)
                                ->setParameter(8,$user)
                                ->getQuery();
                            $p = $q->execute();

                            $qb2 = $em->createQueryBuilder();
                            $q2 = $qb2->update('CommandesBundle:Aprofact', 'u')
                                ->set('u.qte', 'u.qte + ?1')
                                ->where('u.produits = ?2')
                                ->setParameter(1,$qteprod)
                                ->setParameter(2,$idprod)
                                ->getQuery();
                            $p2 = $q2->execute();

                        } else{

                            $produit = new Produits();
                            $produit->setName($name);
                            $produit->setReference($reference);
                            $produit->setUnite($unite);
                            $produit->setPuHT($puHT);
                            $produit->setTva($tva);
                            $produit->setQte($qte);
                            $produit->setQtedefault(1);
                            $produit->setDp(0);
                            $produit->setAff(1);
                            $produit->setDescription($description);
                            $produit->setUser($user);
                            $em->persist($produit);
                            $em->flush();

                            $aprofact = new Aprofact();
                            $aprofact->setProduits($produit);
                            $aprofact->setQte($qte);
                            $aprofact->setZone($proforma->getZonnestocks());

                            $em->persist($aprofact);
                            $em->flush();

                        }




                    }
                }


            }

            $proforma->setType($proforma->getType());
            $proforma->setNf($proforma->getNf());
            $proforma->setLieu($proforma->getLieu());
            $proforma->setAdditionnelle($proforma->getAdditionnelle());
            $proforma->setDateadd($proforma->getDateadd());
            $proforma->setDateregle($proforma->getDateregle());
            $proforma->setUser($user);


            $em->persist($proforma);

            $em = $this->getDoctrine()->getManager();
            $suivi = new SuiviFacts();

            $suivi->setType('Création');
            $suivi->setProformas($proforma);
            $suivi->setPar($this->getUser());
            $suivi->setDate(new \DateTime('now'));
            $suivi->setEtat($editForm->get('etat')->getData());
            $suivi->setPrix($editForm->get('montantpaye')->getData());


            $em->persist($suivi);


            $em->flush();
            return $this->redirectToRoute('admin_proformas_edit', array('id' => $proforma->getId()));
        }
        $em = $this->getDoctrine()->getManager();
        $stocks = $em->getRepository('CommandesBundle:Stocks')->findAll();

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));
        return $this->render('proformas/edit.html.twig', array(
            'proforma' => $proforma,
            'acheteursList' => $acheteursList,
            'stocks' => $stocks,
            'departements' => $departements,
            'edit_form' => $editForm->createView(),

        ));
    }

    /**
     * Deletes a proforma entity.
     *
     */
    public function deleteAction(Proformas $proforma)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($proforma);
        $em->flush();

        return $this->redirectToRoute('admin_proformas_index');
    }


    public function userAction($user)
    {
        $em = $this->getDoctrine()->getManager();
        $departements  = $em->getRepository('CommandesBundle:Proformas')->findLast($user);
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
            return $this->redirectToRoute('admin_proformas_new');
        }
    }


    public function prodAction($prod,$qte,$tva,$reduction)
    {
        if($prod ){
            $em = $this->getDoctrine()->getManager();
            $produit  = $em->getRepository('CommandesBundle:Produits')->findById($prod);

            foreach($produit as $produit)
            {
                $TVAprod = $produit->getTva()->getId();
                $unite= $produit->getUnite();
                $description= $produit->getDescription();
                $val= $produit->getReference();
                $val2= $produit->getPuHT();
                $puAchat = $produit->getPrixHT();
            }


            $reference = $val;
            $prixHTvente = $val2;
            $totalHT = $val2 * $qte;

            $TVA = $tva / 100 ;


            $TTC = $totalHT * $TVA + $totalHT;

            $totalTVA = $totalHT * $TVA;

            $REDUCTION = $reduction * $totalHT / 100;

            $totalReduction =  $totalHT - $REDUCTION;

            $response = new JsonResponse();
            $response->setContent(json_encode($reference));

            $response->headers->set('Content-Type','application/json');
            return $response->setData(array('reference'=>$reference,'unite'=>$unite,'description'=>$description, 'TVAprod'=>$TVAprod,'prixHTvente'=>$prixHTvente,'puAchat'=>$puAchat, 'totalHT'=>$totalHT,'TTC'=>$TTC,'totalTVA'=>$totalTVA,'reduction'=>$REDUCTION,'totalReduction'=>$totalReduction,));
        }else{
            return $this->redirectToRoute('admin_bdc_new');
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
            return $this->redirectToRoute('admin_proformas_new');
        }
    }


    public function etatAction($id,$etat,$ttc)
    {
        $em = $this->getDoctrine()->getManager();


        if($etat == 'Créé'){

            $qb = $em->createQueryBuilder();
            $q = $qb->update('CommandesBundle:Proformas', 'u')

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
                'proformas_id' => $id,
                'par'=>$this->getUser(),
                'date' => $date,
                'etat'=>$etat,
                'prix'=>$ttc,

            ));




        }else if($etat == 'Payé'){

            $qb = $em->createQueryBuilder();
            $q = $qb->update('CommandesBundle:Proformas', 'u')

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
                'proformas_id' => $id,
                'par'=>$this->getUser(),
                'date' => $date,
                'etat'=>$etat,
                'prix'=>$ttc,

            ));


        }


        $response = new JsonResponse();
        $response->setContent(json_encode($id));
        $response->headers->set('Content-Type','application/json');

        return $response->setData(array('id'=>$id));


    }



    public function pdfAction(proformas $proforma)
    {
        $em = $this->getDoctrine()->getManager();
        $proformas = $em->getRepository('CommandesBundle:Proformas')->findByid($proforma);
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();
        $mpdfService = $this->get('tfox.mpdfport');
        $mPDF = $mpdfService->getMpdf();

        $html = $this->renderView('UtilisateursBundle:Default:layout/proformaPDF.html.twig',
            array(
                'proformas' => $proformas,
                'logo' => $logo
            ));

        $mPDF->WriteHTML($html);
        $mPDF->Output('proforma-'.$proforma->getNf().'.pdf','D');

        if (!$proforma) {
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirect($this->generateUrl('facutres'));
        }


    }


    public function allpdfAction($type,$periode,$etat,$zone,$du,$au,$mot)
    {

        $em = $this->getDoctrine()->getManager();

        if($periode == 'last_12_months'){
            $du = new \DateTime('now -12 month');
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

        $proformas = $em->getRepository('CommandesBundle:Proformas')->search($etat,$type,$du,$au,$zone,$mot);
        $devis = $em->getRepository('CommandesBundle:Devis')->search($etat,$type,$du,$au);
        $recus = $em->getRepository('CommandesBundle:Recus')->search($etat,$type,$du,$au);
        $proformas = $em->getRepository('CommandesBundle:Proformas')->search($etat,$type,$du,$au);
        $bdc = $em->getRepository('CommandesBundle:Bonscommandes')->search($etat,$type,$du,$au);
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();

        $mpdfService = $this->get('tfox.mpdfport');
        $mPDF = $mpdfService->getMpdf();

        $html = $this->renderView('UtilisateursBundle:Default:layout/allpdf.html.twig',
            array(
                'proformas' => $proformas,
                'devis' => $devis,
                'recus' => $recus,
                'proformas' => $proformas,
                'bdc' => $bdc,
                'logo' => $logo));

        $mPDF->WriteHTML($html);
        $mPDF->Output('proformas.pdf','D');
    }

    public function envoisAction(Request $request, proformas $proforma)
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
                'proforma' => $proforma));

        $mPDF->WriteHTML($html);
        $content = $mPDF->Output('','S');

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $transport = \Swift_MailTransport::newInstance();

            // Create the Mailer using your created Transport
            $mailer = \Swift_Mailer::newInstance($transport);
            if($editForm->get('document')->getData()){
                $attachment = new \Swift_Attachment($content, 'proforma-'.$proforma->getNf(), 'application/pdf');


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
                            'UtilisateursBundle:Default:emails/proformaMail.html.twig',
                            array('proforma' => $proforma,
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
                            'UtilisateursBundle:Default:emails/proformaMail.html.twig',
                            array('proforma' => $proforma,'texte'=>
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


            return $this->redirectToRoute('admin_proformas_show', array('id' => $proforma->getId()));
        }

        return $this->render('proformas/envois.html.twig',array(
            'proforma' => $proforma,
            'edit_form' => $editForm->createView(),

        ));
    }


    public function showClientAction(proformas $proforma)
    {


        $em = $this->getDoctrine()->getManager();
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();

        $suivi = $em->getRepository('CommandesBundle:SuiviFacts')->findByproforma($proforma);
        return $this->render('proformas/viewClient.html.twig', array(
            'proforma' => $proforma,
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
            . 'WHERE c.name LIKE :data'
            . ' AND c.user = :user'
            . ' ORDER BY c.name ASC'
        )
            ->setParameter('user',$this->getUser())
            ->setParameter('data', '%' . $data . '%');
        $results = $query->getResult();

        $countryList = '<ul id="matchList" style="position: absolute;top: -9px;left: 5px;border: none;"  class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all">';
        foreach ($results as $result) {
            $matchStringBold = preg_replace('/(' . $data . ')/i', '<strong>$1</strong>', $result['name']); // Replace text field input by bold one
            $countryList .= '<li value="'.$result['id'].'" class="ui-menu-item" id="' . $result['name'] . '"><a class="ui-corner-all" >' . $matchStringBold . ' ('.$result['reference'] .') '. $result['puHT'] .' DA'.'</a></li>'; // Create the matching list - we put maching name in the ID too
        }
        $countryList .= '</ul>';

        $response = new JsonResponse();
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
            . ' AND c.supp = 0'
            . ' ORDER BY c.nom ASC'
        )
            ->setParameter('user',$this->getUser())
            ->setParameter('data', '%' . $data . '%')

        ;
        $results = $query->getResult();

        $countryList = '<ul id="matchList" style="position: absolute;width:100%;top: -9px;left: 5px;border: none;"  class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all">';
        foreach ($results as $result) {
            $matchStringBold = preg_replace('/(' . $data . ')/i', '<strong>$1</strong>', $result['nom']); // Replace text field input by bold one
            $countryList .= '<li value="'.$result['id'].'" class="ui-menu-item" id="' . $result['nom'] . '"><a class="ui-corner-all" >' . $matchStringBold .'</a></li>'; // Create the matching list - we put maching name in the ID too
        }
        $countryList .= '</ul>';

        $response = new JsonResponse();
        $response->setData(array('acheteur' => $countryList));
        return $response;



    }
}
