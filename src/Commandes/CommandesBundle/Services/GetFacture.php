<?php
namespace Commandes\CommandesBundle\Services;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManager;



class GetFacture 
{

    public function __construct(ContainerInterface $container, $entityManager)
    {
        $this->container = $container;
        $this->em = $entityManager;
    }
    
    public function facture($facture)
    {

        $logo = $this->em->getRepository('CommandesBundle:Logos')->findLast();

        $html = $this->container->get('templating')->render('UtilisateursBundle:Default:layout/facturePDF.html.twig',
            array('facture' => $facture,'logo' => $logo));
        $html2pdf = new \Html2Pdf('P','A4','fr');
        $html2pdf->pdf->SetAuthor('creativ-dz.com');
        $html2pdf->pdf->SetTitle('Facture '.$facture->getNf());
        $html2pdf->pdf->SetSubject('Facture creativ-dz.com');
        $html2pdf->pdf->SetKeywords('Facture,creativ-dz.com');
        $html2pdf->pdf->SetDisplayMode('real');

        $html2pdf->writeHTML($html);

        return $html2pdf;
    }

    public function allfactures()
    {
        $factures = $this->em->getRepository('CommandesBundle:Factures')->findAll();
        $devis = $this->em->getRepository('CommandesBundle:Devis')->findAll();
        $recus = $this->em->getRepository('CommandesBundle:Recus')->findAll();
        $proformas = $this->em->getRepository('CommandesBundle:Proformas')->findAll();
        $bdc = $this->em->getRepository('CommandesBundle:Bonscommandes')->findAll();
        $logo = $this->em->getRepository('CommandesBundle:Logos')->findLast();

        $html = $this->container->get('templating')->render('UtilisateursBundle:Default:layout/allpdf.html.twig',
            array(
                'factures' => $factures,
                'devis' => $devis,
                'recus' => $recus,
                'proformas' => $proformas,
                'bdc' => $bdc,
                'logo' => $logo));
        $html2pdf = new \Html2Pdf('P','A4','fr');
        $html2pdf->pdf->SetAuthor('creativ-dz.com');
        $html2pdf->pdf->SetTitle('Factures ');
        $html2pdf->pdf->SetSubject('Facture creativ-dz.com');
        $html2pdf->pdf->SetKeywords('Facture,creativ-dz.com');
        $html2pdf->pdf->SetDisplayMode('real');

        $html2pdf->writeHTML($html);

        return $html2pdf;
    }
}