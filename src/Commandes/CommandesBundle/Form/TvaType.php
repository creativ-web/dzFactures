<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Commandes\CommandesBundle\Form\MediaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class TvaType extends AbstractType
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

            ->add('produits', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Tva',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'DESC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())


                        ;
                },
                'property' => 'nom',
                'empty_value' => ' ',
                'multiple' => false,
                'required'=>false,


            ))
            ->add('valeur',NumberType::class,array('required'=>false))

        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Tva'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandes_commandesbundle_tva';
    }


}
