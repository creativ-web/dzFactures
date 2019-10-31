<?php

namespace Commandes\CommandesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Zend\Json\Expr;

class GraphesController extends Controller
{


    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('Commandes\CommandesBundle\Form\Graphes\GraphesType');
        $form->handleRequest($request);
        $user=$this->getUser();

        $typeRapport = $form->get('typeRapport')->getData();
        $du = $form->get('du')->getData();
        $au = $form->get('au')->getData();
        $grouperPar = $form->get('grouperPar')->getData();
        $zone = $form->get('zonnestocks')->getData();
        $additionnelle = $form->get('additionnelle')->getData();
        $montants = $form->get('montants')->getData();
        $type = $form->get('typeDocument')->getData();
        $etat = $form->get('etat')->getData();
        $contact = $form->get('contact')->getData();


        if($zone == null){
            $zone = empty($zone);
        }
        if(empty($contact)){
            $contact = empty($contact);
        }
        if($etat == 'Tous'){
            $etat = empty($etat);
        }
        if($montants =='gross'){
            $factures = $em->getRepository('CommandesBundle:Factures')->graphesTTC($typeRapport,$du,$au,$grouperPar,$zone,$additionnelle,$montants,$type,$etat,$contact,$user);
            $depenses = $em->getRepository('CommandesBundle:Depenses')->graphesTTC($typeRapport,$du,$au,$grouperPar,$zone,$additionnelle,$montants,$type,$etat,$contact,$user);

        }
        if($montants =='net'){
            $factures = $em->getRepository('CommandesBundle:Factures')->graphesHT($typeRapport,$du,$au,$grouperPar,$zone,$additionnelle,$montants,$type,$etat,$contact,$user);
            $depenses = $em->getRepository('CommandesBundle:Depenses')->graphesHT($typeRapport,$du,$au,$grouperPar,$zone,$additionnelle,$montants,$type,$etat,$contact,$user);

        }


        $fact=array();
        $factYear=array();
        $factQuarter=array();
        $factMonth=array();
        $factWeek=array();
        $factDay=array();
        foreach ( $factures as $facture){

            $fact[] = floatval($facture['total']);
            $factYear[] = floatval($facture['year']);
            $factQuarter[] = floatval($facture['quarter']);
            $factMonth[] = floatval($facture['month']);
            $factWeek[] = floatval($facture['week']);
            $factDay[] = floatval($facture['day']);

        }
        $dep=array();
        $depYear=array();
        $depQuarter=array();
        $depMonth=array();
        $depWeek=array();
        $depDay=array();
        foreach ( $depenses as $depense){

            $dep[] = floatval($depense['total']);
            $depYear[] = floatval($depense['year']);
            $depQuarter[] = floatval($depense['quarter']);
            $depMonth[] = floatval($depense['month']);
            $depWeek[] = floatval($depense['week']);
            $depDay[] = floatval($depense['day']);
        }

        $facts = $fact;
        $deps = $dep;

        if($fact){
            $t1 = $fact[0];

        }else{
            $t1 = 0;
        }

        if($dep){
            $t2 = $dep[0];
        }else{

            $t2 = 0;
        }

        $total = $t1 - $t2 ;



        // Chart
        $series = array(
            array("name" => "Revenus",    "data" => $facts),
            array("name" => "Dépenses",    "data" => $deps),
        );

        $ob = new Highchart();
        $ob->colors('#2075bc','#CC6874');
        $ob->chart->renderTo('linechart');  // The #id of the div where to render the chart
        $ob->chart->defaultSeriesType('column');

        if($montants == 'gross'){
            $ob->title->text('Revenus et Dépenses T.T.C.');
        }
        if($montants == 'net'){
            $ob->title->text('Revenus et Dépenses H.T.');
        }


        $ob->subtitle->text("total de l'ensemble ".number_format($total, 2, ',', ' ').' DA');
        $ob->xAxis->type('datetime');
        $ob->xAxis->dateTimeLabelFormats(array(
            "month" => "%b-%y",
            "year" => "%Y"
        ));


        if($grouperPar == 'year'){
            $ob->xAxis->categories($factYear);
        }
        if($grouperPar == 'quarter'){
            $ob->xAxis->categories($factQuarter);
        }
        if($grouperPar == 'month'){
            $ob->xAxis->categories($factMonth);
        }
        if($grouperPar == 'week'){
            $ob->xAxis->categories($factWeek);
        }
        if($grouperPar == 'day'){
            $ob->xAxis->categories($factDay);
        }

        $ob->xAxis->labels(array('rotation'  => -90,'align'  => 'right','style'=>array('font'=>'normal 9px Verdana, sans-serif')));

        $ob->xAxis->title(array('text'  => " "));

        $formatter = new Expr("function () {  return ''+
															'<b>'+ Highcharts.numberFormat(this.y, 0, ' ', ' ') +'</b> DA ' +
															'/ '+ Highcharts.numberFormat(this.point.stackTotal, 0, ' ', ' ') + ' DA'; }");
        $ob->tooltip->formatter($formatter);

        $formatter2= new Expr("function () {
            return Highcharts.numberFormat(this.value, 0, ' ', ' ')+' DA';
        }");


        $ob->yAxis->title(array('text'  => " "));
        $ob->yAxis->labels(array('formatter'=>$formatter2));

        $ob->legend->enabled(true);
        $ob->legend->align('right');
        $ob->legend->verticalAlign('top');
        $ob->legend->floating(true);
        $ob->credits->href('http://creativ-dz.com');
        $ob->credits->text('Creativ-dz.com');
        $ob->exporting->enabled(false);



        $ob->series($series);

        return $this->render('graphes/index.html.twig', array(

            'form' => $form->createView(),
            'chart' => $ob,
            'fact'=>$fact,
            'factures'=>$factures,
            'depenses'=>$depenses,



        ));

    }




}
