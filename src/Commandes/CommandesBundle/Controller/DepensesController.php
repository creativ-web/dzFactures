<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Acheteurs;
use Commandes\CommandesBundle\Entity\Aprofact;
use Commandes\CommandesBundle\Entity\Departements;
use Commandes\CommandesBundle\Entity\Depenses;
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
 * Depense controller.
 *
 */
class DepensesController extends Controller
{
    /**
     * Lists all depense entities.
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
                $q = $qb->update('CommandesBundle:Depenses', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->andWhere('u.type = ?4')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->setParameter(4, $form2->get('type')->getData())
                    ->getQuery();
                $p = $q->execute();

                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'depenses_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));


                return $this->redirectToRoute('admin_depenses_show', array('id' => $form2->get('id')->getData()));

            }

            if ($form2->get('type')->getData() == 'proforma') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Depenses', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->andWherre('u.type = ?4')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->setParameter(4, $form2->get('type')->getData())
                    ->getQuery();
                $p = $q->execute();
                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'depenses_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));
                return $this->redirectToRoute('admin_depenses_show', array('id' => $form2->get('id')->getData()));

            }
            if ($form2->get('type')->getData() == 'recu') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Depenses', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->andWhere('u.type = ?4')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->setParameter(4, $form2->get('type')->getData())
                    ->getQuery();
                $p = $q->execute();
                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'depenses_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));
                return $this->redirectToRoute('admin_depenses_show', array('id' => $form2->get('id')->getData()));

            }

            if ($form2->get('type')->getData() == 'devis') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Depenses', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->andWhere('u.type = ?4')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->setParameter(4, $form2->get('type')->getData())
                    ->getQuery();
                $p = $q->execute();
                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'depenses_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));
                return $this->redirectToRoute('admin_depenses_show', array('id' => $form2->get('id')->getData()));

            }
            if ($form2->get('type')->getData() == 'bdc') {

                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Depenses', 'u')
                    ->set('u.etat', '?1')
                    ->set('u.montantpaye', '?2')
                    ->where('u.id = ?3')
                    ->andWhere('u.type = ?4')
                    ->setParameter(1, 'Payé en partie')
                    ->setParameter(2, $form2->get('prix')->getData())
                    ->setParameter(3, $form2->get('id')->getData())
                    ->setParameter(4, $form2->get('type')->getData())
                    ->getQuery();
                $p = $q->execute();
                $date = date('Y-m-d H:i:s');
                $conn = $this->get('database_connection');
                $conn->insert('suivi_facts', array(
                    'type'=>'Modification_etat',
                    'depenses_id' => $form2->get('id')->getData(),
                    'par'=>$this->getUser(),
                    'date' => $date,
                    'etat'=>'parTranche',
                    'prix'=>$form2->get('prix')->getData(),

                ));
                return $this->redirectToRoute('admin_depenses_show', array('id' => $form2->get('id')->getData()));

            }
        }
        $form = $this->createForm('Commandes\CommandesBundle\Form\OptionSearchsType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->get('type')->getData();
            $etat = $form->get('etat')->getData();
            $periode = $form->get('periode')->getData();
            $du = $form->get('du')->getData();
            $au = $form->get('au')->getData();
            $valzone = $form->get('valzone')->getData();
            $zone = $form->get('zone')->getData();
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
            if ($zone == null) {
                $depenses = $em->getRepository('CommandesBundle:Depenses')->search2($etat, $type, $du, $au, $mot, $user);



            } else {
                $depenses = $em->getRepository('CommandesBundle:Depenses')->search($etat, $type, $du, $au, $zone, $mot, $user);

            }
            return $this->render('depenses/index.html.twig', array(
                'depenses' => $depenses,

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
        $depenses = $em->getRepository('CommandesBundle:Depenses')->search2($etat, $type, $du, $au, $mot, $user);

        return $this->render('depenses/index.html.twig', array(
            'depenses' => $depenses,

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



    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $n = $em->getRepository('CommandesBundle:Depenses')->findBy(array('user'=>$this->getUser()));
        $num = 1;
        foreach ($n as $n){
            $num = $n->getNf()+1;
        }
        $nf = $num;

        $depense = new Depenses();
        $form = $this->createForm('Commandes\CommandesBundle\Form\DepensesType', $depense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($depense->getDepartements()->getId()) {

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
                    ->setParameter(1, $depense->getDepartements()->getNom())
                    ->setParameter(2, $depense->getDepartements()->getAdresse())
                    ->setParameter(3, $depense->getDepartements()->getNifselect())
                    ->setParameter(4, $depense->getDepartements()->getNif())
                    ->setParameter(5, $depense->getDepartements()->getCodepostal())
                    ->setParameter(6, $depense->getDepartements()->getVille())
                    ->setParameter(7, $depense->getDepartements()->getIban())
                    ->setParameter(8, $depense->getDepartements()->getBanque())
                    ->setParameter(9, $depense->getDepartements()->getBic())
                    ->setParameter(10, $depense->getDepartements()->getEmail())
                    ->setParameter(11, $depense->getDepartements()->getSiteweb())
                    ->setParameter(12, $depense->getDepartements()->getFax())
                    ->setParameter(13, $depense->getDepartements()->getTelephone())
                    ->setParameter(14, $depense->getDepartements()->getId())
                    ->setParameter(15, $depense->getDepartements()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();

                $depense->setDepartements($depense->getDepartements()->getId());
            }
            if ($depense->getAcheteur()->getId()) {

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
                    ->setParameter(1, $depense->getAcheteur()->getNom())
                    ->setParameter(2, $depense->getAcheteur()->getAdresse())
                    ->setParameter(3, $depense->getAcheteur()->getNifselect())
                    ->setParameter(4, $depense->getAcheteur()->getNif())
                    ->setParameter(5, $depense->getAcheteur()->getCodepostal())
                    ->setParameter(6, $depense->getAcheteur()->getVille())
                    ->setParameter(10, $depense->getAcheteur()->getEmail())
                    ->setParameter(11, $depense->getAcheteur()->getSiteweb())
                    ->setParameter(12, $depense->getAcheteur()->getFax())
                    ->setParameter(13, $depense->getAcheteur()->getTelephone())
                    ->setParameter(15, $depense->getAcheteur()->getNrc())
                    ->setParameter(14, $depense->getAcheteur()->getId())
                    ->setParameter(16, $depense->getAcheteur()->getType())
                    ->setParameter(17, $this->getUser())
                    ->getQuery();
                $p = $q->execute();
                $depense->setAcheteur($depense->getAcheteur()->getId());
            }

            if ($depense->getAchats()) {

                $questionForms = $depense->getAchats();

                foreach ($questionForms as $questionForm)
                {

                    $questionForm->setType('depense');
                    $id = $questionForm->getProduits();
                    $name = $questionForm->getName();
                    $reference = $questionForm->getReference();
                    $qte = $questionForm->getQte();
                    $unite = $questionForm->getUnite();

                    $tva2 = $questionForm->getTva2();
                    $tva = $questionForm->getTva();
                    $prixHT = $questionForm->getPrixHT();
                    $prixTTC = $questionForm->getPrixTTC();
                    if( $questionForm->getPuHT() == null){
                        $puHT = $questionForm->getPrixHT();
                    }else{
                        $puHT = $questionForm->getPuHT();
                    }

                    $puTTC = $questionForm->getPuTTC();


                    $description = $questionForm->getDescription();
                    $prods = $em->getRepository('CommandesBundle:Produits')->findOneBy(array('name'=>$name));



                    if($prods){


                        $qteprod = $prods->getQte();
                        $idprod = $prods->getId();
                    if($prods->getPuHT() == 0){
                        $qb = $em->createQueryBuilder();
                        $q = $qb->update('CommandesBundle:Produits', 'u')

                            ->set('u.name','?1')
                            ->set('u.reference','?2')
                            ->set('u.unite','?3')
                            ->set('u.prixHt','?4')
                            ->set('u.prixTTC','?7')
                            ->set('u.aff','?8')
                            ->set('u.tva2','?9')
                            ->set('u.tva','?10')
                            ->set('u.qte','?11')
                            ->set('u.description','?12')
                            ->set('u.puHT','?15')
                            ->set('u.puTTC','?16')
                            ->where('u.name = ?1')

                            ->andWhere('u.user = ?14')
                            ->setParameter(1,$name)
                            ->setParameter(2,$reference)
                            ->setParameter(3,$unite)
                            ->setParameter(4,$prixHT)

                            ->setParameter(7,$prixTTC)
                            ->setParameter(8,1)
                            ->setParameter(9,$tva2)
                            ->setParameter(10,$tva2)
                            ->setParameter(11,$qte)
                            ->setParameter(12,$description)
                            ->setParameter(14,$user)
                            ->setParameter(15,0)
                            ->setParameter(16,0)

                            ->getQuery();
                        $p = $q->execute();
                    }else{
                        $qb = $em->createQueryBuilder();
                        $q = $qb->update('CommandesBundle:Produits', 'u')

                            ->set('u.name','?1')
                            ->set('u.reference','?2')
                            ->set('u.unite','?3')
                            ->set('u.prixHt','?4')
                            ->set('u.prixTTC','?7')
                            ->set('u.aff','?8')
                            ->set('u.tva2','?9')
                            ->set('u.tva','?10')
                            ->set('u.qte','?11')
                            ->set('u.description','?12')

                            ->where('u.name = ?1')

                            ->andWhere('u.user = ?14')
                            ->setParameter(1,$name)
                            ->setParameter(2,$reference)
                            ->setParameter(3,$unite)
                            ->setParameter(4,$prixHT)

                            ->setParameter(7,$prixTTC)
                            ->setParameter(8,1)
                            ->setParameter(9,$tva2)
                            ->setParameter(10,$tva)
                            ->setParameter(11,$qte)
                            ->setParameter(12,$description)
                            ->setParameter(14,$user)
                            ->getQuery();
                        $p = $q->execute();
                    }




                    } else{

                        $produit = new Produits();
                        $produit->setName($name);
                        $produit->setReference($reference);
                        $produit->setUnite($unite);
                        $produit->setPrixHt($prixHT);
                        $produit->setPrixTTC($prixTTC);
                        $produit->setPuHT(0);
                        $produit->setPuTTC(0);
                        $produit->setActivlot(0);
                        $produit->setTva2($tva2);
                        $produit->setTva($tva);

                        $produit->setQtedefault(1);
                        $produit->setDp(0);
                        $produit->setAff(1);
                        $produit->setDescription($description);
                        $produit->setUser($user);
                        $em->persist($produit);
                        $em->flush();


                        $qb = $em->createQueryBuilder();
                        $q = $qb->update('CommandesBundle:Produits', 'u')

                            ->set('u.name','?1')
                            ->set('u.reference','?2')
                            ->set('u.unite','?3')
                            ->set('u.prixHt','?4')
                            ->set('u.prixTTC','?7')
                            ->set('u.aff','?8')
                            ->set('u.tva2','?9')
                            ->set('u.tva','?10')

                            ->set('u.description','?12')

                            ->where('u.name = ?1')

                            ->andWhere('u.user = ?14')
                            ->setParameter(1,$name)
                            ->setParameter(2,$reference)
                            ->setParameter(3,$unite)
                            ->setParameter(4,$prixHT)

                            ->setParameter(7,$prixTTC)
                            ->setParameter(8,1)
                            ->setParameter(9,$tva2)
                            ->setParameter(10,$tva)

                            ->setParameter(12,$description)
                            ->setParameter(14,$user)
                            ->getQuery();
                        $p = $q->execute();

                    }



                }



            }



            $depense->setType($depense->getType());
            $depense->setNf($depense->getNf());
            $depense->setLieu($depense->getLieu());
            $depense->setAdditionnelle($depense->getAdditionnelle());
            $depense->setDateadd($depense->getDateadd());


            $depense->setDateregle($depense->getDateregle());
            $depense->setUser($this->getUser());


            $em->persist($depense);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $suivi = new SuiviFacts();

            $suivi->setType('Création');
            $suivi->setDepenses($depense);
            $suivi->setPar($this->getUser());
            $suivi->setDate(new \DateTime('now'));
            $suivi->setEtat($form->get('etat')->getData());
            $suivi->setPrix($form->get('montantpaye')->getData());


            $em->persist($suivi);


            $em->flush();


            return $this->redirectToRoute('admin_depenses_show', array('id' => $depense->getId()));

        }

        $em = $this->getDoctrine()->getManager();
        $stocks = $em->getRepository('CommandesBundle:Stocks')->findAll();

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));
        return $this->render('depenses/new.html.twig', array(
            'depense' => $depense,
            'acheteursList' => $acheteursList,
            'form' => $form->createView(),
            'stocks' => $stocks,
            'departements' => $departements,
            'nf' => $nf,


        ));
    }

    /**
     * Finds and displays a bonscommande entity.
     *
     */
    public function showAction(Depenses $depense)
    {

        $em = $this->getDoctrine()->getManager();
        $suivi = $em->getRepository('CommandesBundle:SuiviFacts')->findBydepenses($depense);
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();
        return $this->render('depenses/show.html.twig', array(
            'depense' => $depense,
            'suivi' => $suivi,
            'logo' => $logo,

        ));
    }

    /**
     * Displays a form to edit an existing bonscommande entity.
     *
     */
    public function editAction(Request $request, Depenses $depense)
    {

        $editForm = $this->createForm('Commandes\CommandesBundle\Form\DepensesType', $depense);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            if ($depense->getDepartements()->getId()) {

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
                    ->setParameter(1, $depense->getDepartements()->getNom())
                    ->setParameter(2, $depense->getDepartements()->getAdresse())
                    ->setParameter(3, $depense->getDepartements()->getNifselect())
                    ->setParameter(4, $depense->getDepartements()->getNif())
                    ->setParameter(5, $depense->getDepartements()->getCodepostal())
                    ->setParameter(6, $depense->getDepartements()->getVille())
                    ->setParameter(7, $depense->getDepartements()->getIban())
                    ->setParameter(8, $depense->getDepartements()->getBanque())
                    ->setParameter(9, $depense->getDepartements()->getBic())
                    ->setParameter(10, $depense->getDepartements()->getEmail())
                    ->setParameter(11, $depense->getDepartements()->getSiteweb())
                    ->setParameter(12, $depense->getDepartements()->getFax())
                    ->setParameter(13, $depense->getDepartements()->getTelephone())
                    ->setParameter(14, $depense->getDepartements()->getId())
                    ->setParameter(15, $depense->getDepartements()->getNrc())
                    ->setParameter(16, $user)
                    ->getQuery();
                $p = $q->execute();

                $depense->setDepartements($depense->getDepartements()->getId());
            }

            if ($depense->getAcheteur()->getId()) {
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
                    ->setParameter(1, $depense->getAcheteur()->getNom())
                    ->setParameter(2, $depense->getAcheteur()->getAdresse())
                    ->setParameter(3, $depense->getAcheteur()->getNifselect())
                    ->setParameter(4, $depense->getAcheteur()->getNif())
                    ->setParameter(5, $depense->getAcheteur()->getCodepostal())
                    ->setParameter(6, $depense->getAcheteur()->getVille())
                    ->setParameter(10, $depense->getAcheteur()->getEmail())
                    ->setParameter(11, $depense->getAcheteur()->getSiteweb())
                    ->setParameter(12, $depense->getAcheteur()->getFax())
                    ->setParameter(13, $depense->getAcheteur()->getTelephone())
                    ->setParameter(15, $depense->getAcheteur()->getNrc())
                    ->setParameter(14, $depense->getAcheteur()->getId())
                    ->setParameter(16, $depense->getAcheteur()->getType())
                    ->setParameter(17, $user)
                    ->getQuery();
                $p = $q->execute();
                $depense->setAcheteur($depense->getAcheteur()->getId());
            }


            if ($depense->getAchats()) {

                $questionForms = $depense->getAchats();

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




                        }

                    }
                }


            }

            $depense->setType($depense->getType());
            $depense->setNf($depense->getNf());
            $depense->setLieu($depense->getLieu());
            $depense->setAdditionnelle($depense->getAdditionnelle());
            $depense->setDateadd($depense->getDateadd());
            $depense->setDateregle($depense->getDateregle());
            $depense->setDatecreation(new \DateTime('now'));
            $depense->setUser($user);



            $em->persist($depense);
            $em->flush();

            return $this->redirectToRoute('admin_depenses_show', array('id' => $depense->getId()));
        }
        $em = $this->getDoctrine()->getManager();
        $stocks = $em->getRepository('CommandesBundle:Stocks')->findAll();

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));
        $nf = $em->getRepository('CommandesBundle:Depenses')->idfact($user);

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));
        return $this->render('depenses/edit.html.twig', array(
            'depense' => $depense,
            'acheteursList' => $acheteursList,
            'stocks' => $stocks,
            'nf'=>$nf,
            'departements' => $departements,
            'edit_form' => $editForm->createView(),

        ));
    }

    /**
     * Deletes a bonscommande entity.
     *
     */
    public function deleteAction(Depenses $depense)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($depense);
        $em->flush();

        return $this->redirectToRoute('admin_depenses_index');
    }


    public function userAction($user)
    {
        $em = $this->getDoctrine()->getManager();
        $departements  = $em->getRepository('CommandesBundle:Depenses')->findLast($user);
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
            return $this->redirectToRoute('admin_depenses_new');
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
            return $this->redirectToRoute('admin_depenses_new');
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
            return $this->redirectToRoute('admin_depenses_new');
        }
    }


    public function etatAction($id,$etat,$ttc)
    {
        $em = $this->getDoctrine()->getManager();


        if($etat == 'Créé'){

            $qb = $em->createQueryBuilder();
            $q = $qb->update('CommandesBundle:Depenses', 'u')

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
                'depenses_id' => $id,
                'par'=>$this->getUser(),
                'date' => $date,
                'etat'=>$etat,
                'prix'=>$ttc,

            ));




        }else if($etat == 'Payé'){

            $qb = $em->createQueryBuilder();
            $q = $qb->update('CommandesBundle:Depenses', 'u')

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
                'depenses_id' => $id,
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



    public function pdfAction(Depenses $depense)
    {
        $em = $this->getDoctrine()->getManager();
        $depenses = $em->getRepository('CommandesBundle:Factures')->findByid($depense);
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();
        $mpdfService = $this->get('tfox.mpdfport');
        $mPDF = $mpdfService->getMpdf();

        $html = $this->renderView('UtilisateursBundle:Default:layout/depensesPDF.html.twig',
            array(
                'depenses' => $depenses,
                'logo' => $logo
            ));

        $mPDF->WriteHTML($html);
        $mPDF->Output('Facture-'.$depense->getNf().'.pdf','D');

        if (!$depense) {
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirect($this->generateUrl('depenses'));
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

        $factures = $em->getRepository('CommandesBundle:Factures')->search($etat,$type,$du,$au,$zone,$mot,$this->getUser());
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

    public function envoisAction(Request $request, Depenses $facture)
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


    public function showClientAction(Depenses $depense)
    {


        $em = $this->getDoctrine()->getManager();
        $logo = $em->getRepository('CommandesBundle:Logos')->findLast();

        $suivi = $em->getRepository('CommandesBundle:SuiviFacts')->findByDepense($depense);
        return $this->render('depennses/viewClient.html.twig', array(
            'depense' => $depense,
            'logo' => $logo,
            'suivi' => $suivi,


        ));
    }

    public function autocompleteAction(Request $request)
    {

        $data = $request->get('input');

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(''
            . 'SELECT c.id, c.name,c.reference,c.prixHt ,c.qte '
            . 'FROM CommandesBundle:Produits c '

            . ' WHERE c.name LIKE :data'
            . ' AND c.user = :user'
            . ' AND c.aff = 1'
            . ' ORDER BY c.name DESC'

        )

            ->setParameter('data', '%' . $data . '%')
            ->setParameter('user',$this->getUser())

            ;
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb
            ->select('a', 'u')
            ->from('Produits', 'a')
            ->leftJoin('a.user', 'u')
            ->where('a.user = :user')
            ->setParameter('user', $this->getUser())
            ->orderBy('a.id', 'DESC');
        $results = $query->getResult();

        $countryList = '<ul id="matchList" style="position: absolute;top: -9px;left: 5px;border: none; "  class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all">';
        foreach ($results as $result) {
            $matchStringBold = preg_replace('/(' . $data . ')/i', '<strong>$1</strong>', $result['name']); // Replace text field input by bold one
            $countryList .= '<li value="'.$result['id'].'" class="ui-menu-item" id="' . $result['name'] . '"><a class="ui-corner-all" >' . $matchStringBold . ' ('.round($result['qte']) .') '. number_format($result['prixHt'], 2, ',', ' ') .' DA'.'</a></li>'; // Create the matching list - we put maching name in the ID too
        }
        $countryList .= '</ul>';


        $response = new JsonResponse();

        $response->setData(array('countryList' => $countryList));

        return $response;



    }

    public function autocomplete2Action(Request $request)
    {

        $data = $request->get('input');

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
             'SELECT c.id, c.name,c.reference,c.prixHt ,c.qte '
            . 'FROM CommandesBundle:Produits c '
            . ' WHERE c.user = :user'
            . ' AND c.aff = 1'

            . ' ORDER BY c.name DESC'

        )

            ->setParameter('user',$this->getUser())

        ;
        $results = $query->getResult();

        $countryList = '<ul id="matchList" style="position: absolute;top: -9px;left: 5px;border: none; "  class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all">';
        foreach ($results as $result) {
            $matchStringBold = preg_replace('/(' . $data . ')/i', '<strong>$1</strong>', $result['name']); // Replace text field input by bold one
            $countryList .= '<li value="'.$result['id'].'" class="ui-menu-item" id="' . $result['name'] . '"><a class="ui-corner-all" >' . $matchStringBold . ' ('.round($result['qte']) .') '. number_format($result['prixHt'], 2, ',', ' ') .' DA'.'</a></li>'; // Create the matching list - we put maching name in the ID too
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

        $countryList = '<ul id="matchList" style="position: absolute;width:100%;top: -9px;left: 5px; border: none;"  class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all">';
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
