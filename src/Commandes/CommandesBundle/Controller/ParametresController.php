<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Cachets;
use Commandes\CommandesBundle\Entity\Logos;
use Commandes\CommandesBundle\Entity\Paramgestions;
use Commandes\CommandesBundle\Entity\Sectiondocs;
use Commandes\CommandesBundle\Entity\Tva;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Parametres controller.
 *
 */
class ParametresController extends Controller
{
    /**
     * Lists all recus entities.
     *
     */


    public function indexAction(Request $request )
    {
        $em = $this->getDoctrine()->getManager();



        $img = $em->getRepository('CommandesBundle:Logos')->findBy(array('user' => $this->getUser()),array('id' => 'DESC'));
        $imgCachet = $em->getRepository('CommandesBundle:Cachets')->findBy(array('user' => $this->getUser()),array('id' => 'DESC'));

        $user = $this->getUser();
        $ParametresForm = $this->createForm('Commandes\CommandesBundle\Form\parametres\ParametresType');
        $ParametresForm->bind($this->getRequest());
        $SectionDocuments = $em->getRepository('CommandesBundle:Sectiondocs')->findOneBy(array('user' =>$user));
        $Paramgestions = $em->getRepository('CommandesBundle:Paramgestions')->findOneBy(array('user' =>$user));
        $sectiondoc = new Sectiondocs();
        $paramgestion = new Paramgestions();
        $logo = new Logos();
        $cachets = new Cachets();
        if ($ParametresForm->isSubmitted() && $ParametresForm->isValid()) {

            if ($ParametresForm->get('logos')->get('file')->getData()) {

                 $file = $ParametresForm->get('logos')->get('file')->getData();


                $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();



                // moves the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('brochures_directory'),
                    $fileName
                );

                // updates the 'brochure' property to store the PDF file name
                // instead of its contents
                $logo->setPath($fileName);
                $logo->setUser($this->getUser());
                $em->persist($logo);
                $em->flush();
            }
            if ($ParametresForm->get('cachets')->get('file')->getData()) {

                $file = $ParametresForm->get('cachets')->get('file')->getData();


                $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();



                // moves the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('brochures_directory'),
                    $fileName
                );

                // updates the 'brochure' property to store the PDF file name
                // instead of its contents
                $cachets->setPath($fileName);
                $cachets->setUser($this->getUser());
                $em->persist($cachets);
                $em->flush();
            }

            if ($SectionDocuments) {
                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Sectiondocs', 'u')
                    ->set('u.defaultTax', '?1')
                    ->set('u.invoiceTaxName', '?2')
                    ->set('u.invoiceTax2Visible', '?3')
                    ->set('u.defaultTax2', '?4')
                    ->set('u.invoiceTax2Name', '?5')
                    ->set('u.invoiceTax3Visible', '?6')
                    ->set('u.defaultTax3', '?7')
                    ->set('u.invoiceTax3Name', '?8')
                    ->where('u.user = ?9')
                    ->setParameter(1, $ParametresForm->get('sectionDocuments')->get('defaultTax')->getData())
                    ->setParameter(2, $ParametresForm->get('sectionDocuments')->get('invoiceTaxName')->getData())
                    ->setParameter(3, $ParametresForm->get('sectionDocuments')->get('invoiceTax2Visible')->getData())
                    ->setParameter(4, $ParametresForm->get('sectionDocuments')->get('defaultTax2')->getData())
                    ->setParameter(5, $ParametresForm->get('sectionDocuments')->get('invoiceTax2Name')->getData())
                    ->setParameter(6, $ParametresForm->get('sectionDocuments')->get('invoiceTax3Visible')->getData())
                    ->setParameter(7, $ParametresForm->get('sectionDocuments')->get('defaultTax3')->getData())
                    ->setParameter(8, $ParametresForm->get('sectionDocuments')->get('invoiceTax3Name')->getData())
                    ->setParameter(9, $this->getUser())
                    ->getQuery();
                $p = $q->execute();


            } else {
                $sectiondoc->setUser($this->getUser());
                $em->persist($sectiondoc);
                $em->flush();
            }

            if ($Paramgestions) {
                $qb = $em->createQueryBuilder();
                $q = $qb->update('CommandesBundle:Paramgestions', 'u')
                    ->set('u.autobl', '?1')
                    ->set('u.autobe', '?2')
                    ->set('u.galeriephotos', '?3')
                    ->where('u.user = ?9')
                    ->setParameter(1, $ParametresForm->get('paramGestion')->get('autobl')->getData())
                    ->setParameter(2, $ParametresForm->get('paramGestion')->get('autobe')->getData())
                    ->setParameter(3, $ParametresForm->get('paramGestion')->get('galeriephotos')->getData())
                    ->setParameter(9, $this->getUser())
                    ->getQuery();
                $p = $q->execute();


            } else {
                $paramgestion->setUser($this->getUser());
                $paramgestion->setAutobl($ParametresForm->get('paramGestion')->get('autobl')->getData());
                $paramgestion->setAutobe($ParametresForm->get('paramGestion')->get('autobe')->getData());
                $paramgestion->setAutobe($ParametresForm->get('paramGestion')->get('galeriephotos')->getData());
                $em->persist($paramgestion);
                $em->flush();
            }
            return $this->redirectToRoute('admin_parametres_index');
        }

        return $this->render('parametres/index.html.twig', array(
            'logo' => $img,
            'cachets' =>$imgCachet,
            'sectionDocuments'=>$SectionDocuments,
            'ParametresForm' => $ParametresForm->createView(),

        ));
    }
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

}
