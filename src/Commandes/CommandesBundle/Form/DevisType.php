<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\StocksType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class DevisType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'fact' => 'Facture',
                    'proforma' => 'Facture Proforma',
                    'recu' => 'Reçu',
                    'devis' => 'Devis',
                    'bdc' => 'Bon de Commande',

                ),
                'data' => "devis",
                'required'=>true))
            ->add('nf')
            ->add('datecreation', DateType::class,array('widget' => 'single_text', 'required'=>true))
            ->add('lieu')
            ->add('additionnelle', ChoiceType::class, array(
                'choices'  => array(
                    'Date de vente' => 'Date de vente',
                    'Date limite de validité' => 'Date limite de validité',
                    'Délai de rétractation jusqu\'au' => 'Délai de rétractation jusqu\'au ',

                )))
            ->add('dateadd', DateType::class,array('widget' => 'single_text', 'required'=>true,'label'=>' '))
            ->add('departements',DepartementsType::class)
            ->add('acheteur', Acheteurs2Type::class)
            ->add('ventes', CollectionType::class, array(

                'entry_type' => VentesType::class,
                'prototype'=>true,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ))

            ->add('objet')
            ->add('moderegle', ChoiceType::class, array(
                'choices'  => array(
                    'Espèces' => 'Espèces',
                    'Virement bancaire' => 'Virement bancaire',
                    'Carte bancaire' => 'Carte bancaire',
                    'Chèque' => 'Chèque',

                )))
            ->add('dateregle', ChoiceType::class, array(
                'choices'  => array(
                    '5' => '5 jours',
                    '10' => '10 jours',
                    '15' => '15 jours',
                    '30' => '30 jours',
                    '45' => '45 jours',
                    '60' => '60 jours',
                    '0' => '0 jours',
                    'a_reception' => 'A réception',
                    'a_la_comande' => 'A la commande',
                    'end_of_next_m' => '30 jours fin de mois',

                ),'data' => '5'))
            ->add('etat', ChoiceType::class, array(
                'choices'  => array(
                    'Créé' => 'Créé',
                    'Payé' => 'Payé',
                    'Payé en partie' => 'Payé en partie',
                    'Envoyé' => 'Envoyé',


                )))
            ->add('lignes', CollectionType::class, array(

                'entry_type' => LignesType::class,
                'prototype'=>true,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ))
            ->add('montantpaye')
            ->add('zonnestocks','entity',array('class' => 'CommandesBundle:Zonnestocks','required'=>true))
            ->add('nomvendeur')
            ->add('informations')
            ->add('totalHT','hidden', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalTTC','hidden', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalReduction','hidden', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Devis'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'devis';
    }


}
