<?php

namespace Commandes\CommandesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class RapportsController extends Controller
{
    public function indexAction( )
    {


        return $this->render('rapports/index.html.twig');

    }

}
