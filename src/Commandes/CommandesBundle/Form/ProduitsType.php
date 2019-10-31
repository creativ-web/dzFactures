<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Commandes\CommandesBundle\Form\MediaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
class ProduitsType extends AbstractType
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

            ->add('name', 'text')
            ->add('reference','text', array('label' => false,'required'=>false,
                'attr' => array('class'=>' form-control'),))
            ->add('categories','entity',array('class' => 'CommandesBundle:Categories','property' => 'nom','required'=>false))

            ->add('qte',IntegerType::class,array('required'=>false))
            ->add('puHT',IntegerType::class)


            ->add('activlot','checkbox', array('required'=>false,
                'attr' => array('checked'   => false)))

            ->add('lots', CollectionType::class, array(

                'entry_type' => LotsType::class,
                'prototype'=>true,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ))


            ->add('tva', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Tva',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'ASC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())


                        ;
                },
                'property' => 'valeur',
                'multiple' => false,
                'required'=>true,

            ))

            ->add('tva2', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Tva',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'ASC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())


                        ;
                },
                'property' => 'valeur',
                'multiple' => false,
                'required'=>true,

            ))

            ->add('puTTC','number',array('required'=>false))
            ->add('description')

            ->add('prixHT')
            ->add('prixTTC')
            ->add('prixTTC')
            ->add('unite', ChoiceType::class, array(
                'choices'  => array(
                    'pc' => 'pc',
                    'h' => 'h',
                    'j' => 'j',
                    'm' => 'm',
                    'km' => 'km',
                    'm²' => 'm²',
                    'kg' => 'kg',


                )))


            ->add('qtedefault','number',array('data' => '1'))

            ->add('images' ,new MediaType(),array('required'=>false))


            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Produits'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandes_commandesbundle_produits';
    }


}
