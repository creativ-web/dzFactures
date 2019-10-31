<?php

namespace Commandes\CommandesBundle\Form\Filtre;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\StocksType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class FiltreProformasType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('mot','text', array(
                'required'=>false,
                'attr' => array(
                    'placeholder' => 'Ecrire un mot ou n°',

                )))

            ->add('type', ChoiceType::class, array(
                'required'=>false,
                'choices'  => array(
                    'tous' => 'Tous',
                    'fact' => 'Facture',
                    'proforma' => 'Facture Proforma',
                    'recu' => 'Reçu',
                    'devis' => 'Devis',
                    'bdc' => 'Bon de Commande',
                ),
                'data' => "proforma",
                'required'=>true))

            ->add('periode', ChoiceType::class, array(
                'choices'  => array(
                    'last_12_months' => '12 derniers mois',
                    'this_month' => 'ce mois',
                    'last_30_days' => '30 derniers jour',
                    'last_month' => 'le mois dernier',
                    'this_year' => 'cette année',
                    'last_year' => 'l\'année dernière',
                    'actual_accounting_period' => 'exercice comptable',
                    'tous' => 'Tous',
                    'more' => 'autre...',


                ),
                'data' => "last_12_months",
                'required'=>true))

            ->add('du', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now -12 month'),'label'=>' '))

            ->add('au', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now'),'label'=>' '))

            ->add('etat', ChoiceType::class, array(
                'choices'  => array(
                    'tous' => 'Tous',
                    'Créé' => 'Créé',
                    'Payé' => 'Payé',
                    'Payé en partie' => 'Payé en partie',
                    'Envoyé' => 'Envoyé',
                    'Impayé' => 'Impayé',
                ),
                'data' => "tous",'required'=>true))
            ->add('zone', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Zonnestocks',
                'empty_value' => 'Tous',
                'multiple' => false,
                'required'=>false,

            ))

            ->add('valzone','hidden', array(
                'required'=>false,
            ))
        ;
    }

}
