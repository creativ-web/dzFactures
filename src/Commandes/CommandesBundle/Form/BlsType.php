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
class BlsType extends AbstractType
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
                    'ci' => 'Consommation interne (CI)',
                    'bt' => 'Bons de transfert (BT)',


                ),
                'data' => "bl",
                'required'=>true))
            ->add('nf')
            ->add('datecreation', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now')))

            ->add('dateadd', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now'),'label'=>' '))
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

            ->add('factures', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Factures',
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
            ->add('aprofact', CollectionType::class, array(

                'entry_type' => AprofactType::class,
                'prototype'=>true,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
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
            'data_class' => 'Commandes\CommandesBundle\Entity\Bls'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bls';
    }


}
