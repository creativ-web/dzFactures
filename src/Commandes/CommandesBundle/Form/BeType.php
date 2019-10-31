<?php

namespace Commandes\CommandesBundle\Form;

use Commandes\CommandesBundle\Entity\Departements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\StocksType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class BeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'be' => 'Bon d\'entrée (BE)',
                    'bl' => 'Bon de livraison (BL)',
                    'Res' => 'Réservation',
                    'bc' => 'Bon de commande (BC)',
                    'pi' => 'Production interne (PI)',
                    'bt' => 'Bons de transfert (BT)',
                    'inv' => 'Inventaire',
                    'blc' => 'Bon de livraison Corrigé (BLC)',
                    'bec' => 'Bon d\'entrée Corrigé (BEC)',

                ), 'required'=>true))
            ->add('nf')
            ->add('datecreation', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now')))

            ->add('dateadd', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now'),'label'=>' '))
            ->add('departements',new DepartementsType())
            ->add('acheteur', new Acheteurs2Type())

            ->add('achats', CollectionType::class, array(

                'entry_type' => AchatsType::class,
                'prototype'=>true,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ))


            ->add('zonnestocks','entity',array('class' => 'CommandesBundle:Zonnestocks','required'=>true))
            ->add('informations')
            ->add('editerpar')
            ->add('expedierpar')
            ->add('receptionnerpar')
            ->add('ncommande')
          
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Documents'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'documents';
    }


}
