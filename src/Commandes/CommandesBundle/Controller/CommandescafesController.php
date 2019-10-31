<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Commandescafes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Commandes\CommandesBundle\Entity\Acheteurs;
use Commandes\CommandesBundle\Entity\Aprofact;
use Commandes\CommandesBundle\Entity\Departements;
use Commandes\CommandesBundle\Entity\Bonscommandes;
use Commandes\CommandesBundle\Entity\SuiviFacts;
use Commandes\CommandesBundle\Entity\Produits;
use Commandes\CommandesBundle\Entity\Ventes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Response;
/**
 * Commandescafe controller.
 *
 */
class CommandescafesController extends Controller
{
    /**
     * Lists all commandescafe entities.
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
                    ->set('u.montantpaye', 'u.montantpaye + ?2')
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
                    ->set('u.montantpaye', 'u.montantpaye + ?2')
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
                    ->set('u.montantpaye', 'u.montantpaye + ?2')
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
                    ->set('u.montantpaye', 'u.montantpaye + ?2')
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
        $form = $this->createForm('Commandes\CommandesBundle\Form\Filtre\FiltredocscafeType');
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
                $commandescafes = $em->getRepository('CommandesBundle:Commandescafes')->search2($etat, $type, $du, $au, $mot, $user);


            } else {
                $factures = $em->getRepository('CommandesBundle:Factures')->search($etat, $type, $du, $au, $zone, $mot, $user);
                $proformas = $em->getRepository('CommandesBundle:Proformas')->search($etat, $type, $du, $au, $zone, $mot, $user);
                $devis = $em->getRepository('CommandesBundle:Devis')->search($etat, $type, $du, $au, $zone, $mot, $user);
                $recus = $em->getRepository('CommandesBundle:Recus')->search($etat, $type, $du, $au, $zone, $mot, $user);
                $bdc = $em->getRepository('CommandesBundle:Bonscommandes')->search($etat, $type, $du, $au, $zone, $mot, $user);
                $commandescafes = $em->getRepository('CommandesBundle:Commandescafes')->search($etat, $type, $du, $au, $zone, $mot, $user);

            }
            return $this->render('commandescafes/index.html.twig', array(
                'factures' => $factures,
                'devis' => $devis,
                'recus' => $recus,
                'proformas' => $proformas,
                'bdc' => $bdc,
                'commandescafes' => $commandescafes,
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
        $factures = $em->getRepository('CommandesBundle:Factures')->search2($etat, $type, $du, $au, $mot, $user);
        $proformas = $em->getRepository('CommandesBundle:Proformas')->search2($etat, $type, $du, $au, $mot, $user);
        $devis = $em->getRepository('CommandesBundle:Devis')->search2($etat, $type, $du, $au, $mot, $user);
        $recus = $em->getRepository('CommandesBundle:Recus')->search2($etat, $type, $du, $au, $mot, $user);
        $bdc = $em->getRepository('CommandesBundle:Bonscommandes')->search2($etat, $type, $du, $au, $mot, $user);
        $commandescafes = $em->getRepository('CommandesBundle:Commandescafes')->search2($etat, $type, $du, $au, $mot, $user);
        return $this->render('commandescafes/index.html.twig', array(
            'factures' => $factures,
            'devis' => $devis,
            'recus' => $recus,
            'proformas' => $proformas,
            'bdc' => $bdc,
            'commandescafes' => $commandescafes,
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
     * Creates a new commandescafe entity.
     *
     */
    public function newAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $nf = $em->getRepository('CommandesBundle:Bonscommandes')->idfact($user);
        $boncommande = new Commandescafes();
        $form = $this->createForm('Commandes\CommandesBundle\Form\CommandescafesType', $boncommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($boncommande->getDepartements()->getId()) {

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
                    ->setParameter(1, $boncommande->getDepartements()->getNom())
                    ->setParameter(2, $boncommande->getDepartements()->getAdresse())
                    ->setParameter(3, $boncommande->getDepartements()->getNifselect())
                    ->setParameter(4, $boncommande->getDepartements()->getNif())
                    ->setParameter(5, $boncommande->getDepartements()->getCodepostal())
                    ->setParameter(6, $boncommande->getDepartements()->getVille())
                    ->setParameter(7, $boncommande->getDepartements()->getIban())
                    ->setParameter(8, $boncommande->getDepartements()->getBanque())
                    ->setParameter(9, $boncommande->getDepartements()->getBic())
                    ->setParameter(10, $boncommande->getDepartements()->getEmail())
                    ->setParameter(11, $boncommande->getDepartements()->getSiteweb())
                    ->setParameter(12, $boncommande->getDepartements()->getFax())
                    ->setParameter(13, $boncommande->getDepartements()->getTelephone())
                    ->setParameter(14, $boncommande->getDepartements()->getId())
                    ->setParameter(15, $boncommande->getDepartements()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();

                $boncommande->setDepartements($boncommande->getDepartements()->getId());
            }
            if ($boncommande->getAcheteur()->getId()) {

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
                    ->setParameter(1, $boncommande->getAcheteur()->getNom())
                    ->setParameter(2, $boncommande->getAcheteur()->getAdresse())
                    ->setParameter(3, $boncommande->getAcheteur()->getNifselect())
                    ->setParameter(4, $boncommande->getAcheteur()->getNif())
                    ->setParameter(5, $boncommande->getAcheteur()->getCodepostal())
                    ->setParameter(6, $boncommande->getAcheteur()->getVille())

                    ->setParameter(10, $boncommande->getAcheteur()->getEmail())
                    ->setParameter(11, $boncommande->getAcheteur()->getSiteweb())
                    ->setParameter(12, $boncommande->getAcheteur()->getFax())
                    ->setParameter(13, $boncommande->getAcheteur()->getTelephone())
                    ->setParameter(14, $boncommande->getAcheteur()->getId())
                    ->setParameter(15, $boncommande->getAcheteur()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();
                $boncommande->setAcheteur($boncommande->getAcheteur()->getId());
            }

            if ($boncommande->getVentes()) {

                $questionForms = $boncommande->getVentes();

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
                        $aprofact->setZone($boncommande->getZonnestocks());

                        $em->persist($aprofact);
                        $em->flush();

                    }



                }



            }


            $boncommande->setType($boncommande->getType());
            $boncommande->setNf($boncommande->getNf());
            $boncommande->setLieu($boncommande->getLieu());
            $boncommande->setAdditionnelle($boncommande->getAdditionnelle());
            $boncommande->setDateadd($boncommande->getDateadd());

            $boncommande->setDateregle($boncommande->getDateregle());
            $boncommande->setUser($user);


            $em->persist($boncommande);

            $em = $this->getDoctrine()->getManager();
            $suivi = new SuiviFacts();

            $suivi->setType('Création');
            $suivi->setCommandescafes($boncommande);
            $suivi->setPar($this->getUser());
            $suivi->setDate(new \DateTime('now'));
            $suivi->setEtat($form->get('etat')->getData());
            $suivi->setPrix($form->get('montantpaye')->getData());


            $em->persist($suivi);


            $em->flush();


            return $this->redirectToRoute('admin_commandescafe_show', array('id' => $boncommande->getId()));

        }

        $em = $this->getDoctrine()->getManager();
        $stocks = $em->getRepository('CommandesBundle:Stocks')->findAll();

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));
        return $this->render('commandescafes/new.html.twig', array(
            'commandescafe' => $boncommande,
            'acheteursList' => $acheteursList,
            'form' => $form->createView(),
            'stocks' => $stocks,
            'departements' => $departements,
            'nf' => $nf,


        ));


    }

    /**
     * Finds and displays a commandescafe entity.
     *
     */
    public function showAction(Commandescafes $commandescafe)
    {


        $em = $this->getDoctrine()->getManager();
        $suivi = $em->getRepository('CommandesBundle:SuiviFacts')->findBybdc($commandescafe);
        $img = $em->getRepository('CommandesBundle:Logos')->findOneBy(array('user' => $this->getUser()),array('id' => 'DESC'));
        $imgCachet = $em->getRepository('CommandesBundle:Cachets')->findOneBy(array('user' => $this->getUser()),array('id' => 'DESC'));



        return $this->render('commandescafes/show.html.twig', array(
            'commandescafe' => $commandescafe,

            'suivi' => $suivi,
            'logo' => $img,
            'cachets' =>$imgCachet,
        ));
    }

    /**
     * Displays a form to edit an existing commandescafe entity.
     *
     */
    public function editAction(Request $request, Commandescafes $commandescafe)
    {
        $deleteForm = $this->createDeleteForm($commandescafe);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\CommandescafesType', $commandescafe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_commandescafe_edit', array('id' => $commandescafe->getId()));
        }

        return $this->render('commandescafes/edit.html.twig', array(
            'commandescafe' => $commandescafe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commandescafe entity.
     *
     */
    public function deleteAction(Request $request, Commandescafes $commandescafe)
    {
        $form = $this->createDeleteForm($commandescafe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commandescafe);
            $em->flush();
        }

        return $this->redirectToRoute('admin_commandescafe_index');
    }

    /**
     * Creates a form to delete a commandescafe entity.
     *
     * @param Commandescafes $commandescafe The commandescafe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commandescafes $commandescafe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_commandescafe_delete', array('id' => $commandescafe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
