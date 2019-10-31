<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
//permettra à l’autoload d’importer la librarie HTML2PDF
$loader->add('Html2Pdf', __DIR__.'/../vendor/Html2Pdf'); //ligne à ajouter
$loader->add('DoctrineExtensions', __DIR__.'/../vendor/beberlei'); //ligne à ajouter
$loader->register();
return $loader;

$classLoader = new \Doctrine\Common\ClassLoader('DoctrineExtensions','/vendor/beberlei');
$classLoader->register();