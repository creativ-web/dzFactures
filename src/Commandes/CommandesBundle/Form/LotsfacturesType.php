<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
class LotsfacturesType extends AbstractType
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
            ->add('name','text',array(
                'required'=>true,'label' => false,
            ))
            ->add('produits')

            ->add('reference','text', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('reduction')
            ->add('qte','number',array('required' => true))
            ->add('unite')
            ->add('description','textarea',array('required' => false,  'attr' => array(
                'placeholder' => 'Description',
            )))

            ->add('puHT','text', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))

            ->add('puHTreduit','hidden', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))

            ->add('puTTC','text', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))

            ->add('puTTCreduit','hidden', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))

            ->add('totalHT','text', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))

            ->add('totalTTC','text', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('prixHT','text', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('prixTTC','text', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalHTa','text', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalTTCa','text', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))

            ->add('totalreduct','hidden', array('required'=>false,'label' => false,
                'attr' => array('class'=>' form-control')))


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
            ->add('type','hidden')
            ->add('user')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Lotsfactures'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lotsfactures';
    }


}
