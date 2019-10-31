<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\StocksType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
class BesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */

    private $tokenStorage;

    public function __construct( TokenStorageInterface   $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
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
                    'ci' => 'Consommation interne (CI)',
                    'bt' => 'Bons de transfert (BT)',
                ),
                'data' => "be",
                'required'=>true))
            ->add('nf')
            ->add('datecreation', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now')))

            ->add('dateadd', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now'),'label'=>' '))
            ->add('departements',DepartementsType::class)
            ->add('acheteur', Acheteurs2Type::class)

            ->add('achats', CollectionType::class, array(

                'entry_type' => AchatsType::class,
                'prototype'=>true,
                'label' => false,
                'allow_add' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ))
            ->add('aprodoc', CollectionType::class, array(

                'entry_type' => AprodocType::class,
                'prototype'=>true,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'by_reference' => false,

            ))
            ->add('zonnestocks', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Zonnestocks',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'DESC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())


                        ;
                },
                'property' => 'nom',
                'multiple' => false,
                'required'=>true,

            ))

            ->add('informations')
            ->add('editerpar')
            ->add('expedierpar')
            ->add('receptionnerpar')
            ->add('ncommande')
            ->add('lieu')
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

                ),'data' => '5 jours'))
            ->add('etat', ChoiceType::class, array(
                'choices'  => array(
                    'Créé' => 'Créé',
                    'Payé' => 'Payé',
                    'Payé en partie' => 'Payé en partie',
                    'Envoyé' => 'Envoyé',


                )))
            ->add('totalHT','hidden', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalTTC','hidden', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalReduction','hidden', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('montantpaye')
            ->add('nomvendeur')
            ->add('informations')
            ->add('additionnelle', ChoiceType::class, array(
                'choices'  => array(
                    'Date de vente' => 'Date de vente',
                    'Date limite de validité' => 'Date limite de validité',
                    'Délai de rétractation jusqu\'au' => 'Délai de rétractation jusqu\'au ',

                ), 'data' => "Date limite de validité"))
            ->add('depenses', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Depenses',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'DESC')


                        ;
                },
                'property' => 'id',
                'empty_value' => ' ',
                'multiple' => false,
                'required'=>false,

            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Bes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bes';
    }


}
