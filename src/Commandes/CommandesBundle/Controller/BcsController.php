<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Bcs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Bc controller.
 *
 */
class BcsController extends Controller
{
    /**
     * Lists all bc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bcs = $em->getRepository('CommandesBundle:Bcs')->findAll();

        return $this->render('bcs/index.html.twig', array(
            'bcs' => $bcs,
        ));
    }

    /**
     * Creates a new bc entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nf = $em->getRepository('CommandesBundle:Bcs')->idfact();
        $be = new Bcs();
        $form = $this->createForm('Commandes\CommandesBundle\Form\BcsType', $be);
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


                        $qteprod = $prods->getQte();
                        $idprod = $prods->getId();

                        $apros = $em->getRepository('CommandesBundle:Aprodoc')->findOneBy(array('produits'=>$id,'zone'=>$be->getZonnestocks()->getNom()));

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

            return $this->redirectToRoute('admin_bcs_show', array('id' => $be->getId()));
        }

        $acheteursList = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser()));

        $departements = $em->getRepository('CommandesBundle:Departements')->findBy(array('user'=>$this->getUser()));
        return $this->render('bcs/new.html.twig', array(
            'be' => $be,
            'form' => $form->createView(),
            'nf' => $nf,
            'acheteursList' => $acheteursList,
            'departements' => $departements,
        ));
    }

    /**
     * Finds and displays a bc entity.
     *
     */
    public function showAction(Bcs $bc)
    {
        $deleteForm = $this->createDeleteForm($bc);

        return $this->render('bcs/show.html.twig', array(
            'bc' => $bc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bc entity.
     *
     */
    public function editAction(Request $request, Bcs $bc)
    {
        $deleteForm = $this->createDeleteForm($bc);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\BcsType', $bc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_bcs_edit', array('id' => $bc->getId()));
        }

        return $this->render('bcs/edit.html.twig', array(
            'bc' => $bc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bc entity.
     *
     */
    public function deleteAction(Request $request, Bcs $bc)
    {
        $form = $this->createDeleteForm($bc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bc);
            $em->flush();
        }

        return $this->redirectToRoute('admin_bcs_index');
    }

    /**
     * Creates a form to delete a bc entity.
     *
     * @param Bcs $bc The bc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bcs $bc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_bcs_delete', array('id' => $bc->getId())))
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
            return $this->redirectToRoute('admin_bcs_new');
        }
    }


    public function prodAction($prod,$qte,$tva,$tva2)
    {
        if($prod ){
            $em = $this->getDoctrine()->getManager();
            $produit  = $em->getRepository('CommandesBundle:Produits')->findBy(array('id'=>$prod,'user'=>$this->getUser()));


            foreach($produit as $produit)
            {
                $va0= $produit->getId();
                $val= $produit->getReference();
                $val2= $produit->getPuHT();
                $val3= $produit->getPuTTC();
                $val4= $produit->getPrixHt();
                $val5= $produit->getPrixTTC();
                $val6= $produit->getTva();
                $val7= $produit->getTva2();

            }

            $tv  = $em->getRepository('CommandesBundle:Tva')->findById($val6);
            $tv2  = $em->getRepository('CommandesBundle:Tva')->findById($val7);

            $id = $va0;
            $reference = $val;
            $puHT = $val2;
            $puTTC = $val3;
            $prixHT = $val4;
            $prixTTC = $val5;

            $totalHT = $val2 * $qte;

            $totalHTa = $val4 * $qte;
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
            $response->setContent(json_encode($reference));

            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(
                'id'=>$id,'reference'=>$reference,'puHT'=>$puHT,'puTTC'=>$puTTC,'totalHT'=>$totalHT,'TTC'=>$TTC,'totalTVA'=>$totalTVA
            ,'prixHT'=>$prixHT,'prixTTC'=>$prixTTC,'totalHTa'=>$totalHTa,'TTC2'=>$TTC2,'totalTVA2'=>$totalTVA2,'tva'=>$tvaa,'tva2'=>$tvaa2
            ));
        }else{
            return $this->redirectToRoute('admin_bes_new');
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
