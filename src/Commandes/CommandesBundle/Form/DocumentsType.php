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

class DocumentsType extends AbstractType
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
            ->add('lieu')
            ->add('additionnelle', ChoiceType::class, array(
                'choices'  => array(
                    'Date de vente' => 'Date de vente',
                    'Date limite de validité' => 'Date limite de validité',
                    'Délai de rétractation jusqu\'au' => 'Délai de rétractation jusqu\'au ',

                )))
            ->add('dateadd', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now'),'label'=>' '))
            ->add('departements',new DepartementsType())
            ->add('acheteur', new AcheteursType())

            ->add('achats', CollectionType::class, array(

                'entry_type' => AchatsType::class,
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
                    '5 jours' => '5 jours',
                    '10 jours' => '10 jours',
                    '15 jours' => '15 jours',
                    '30 jours' => '30 jours',
                    '45 jours' => '45 jours',
                    '60 jours' => '60 jours',
                    '0 jours' => '0 jours',
                    'A réception' => 'A réception',
                    'A la commande' => 'A la commande',
                    '30 jours fin de mois' => '30 jours fin de mois',

                ),'data' => '60 jours'))
            ->add('etat', ChoiceType::class, array(
                'choices'  => array(
                    'Créé' => 'Créé',
                    'Payé' => 'Payé',
                    'Payé en partie' => 'Payé en partie',
                    'Envoyé' => 'Envoyé',


                )))

            ->add('montantpaye')
            ->add('zonnestocks')
            ->add('nomvendeur')
            ->add('informations')

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
