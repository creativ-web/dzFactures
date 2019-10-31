<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;


class DiffprixType extends AbstractType
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



            ->add('zonnestocks', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Zonnestocks',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.nom', 'DESC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())
                        ;
                },
                'property' => 'nom',
                'empty_value' => ' ',
                'multiple' => false,
                'required'=>false,

            ))
            ->add('puHT','text',array('required'=>false))
            ->add('tva','entity',array('class' => 'CommandesBundle:Tva','property' => 'valeur','required'=>true))
            ->add('puTTC','text',array('required'=>false))
            ->add('produits','entity',array('class' => 'CommandesBundle:Produits','property' => 'id','required'=>true))




        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Diffprix'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandes_commandesbundle_diffprix';
    }


}
