<?php

namespace Commandes\CommandesBundle\Form;


use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class VentesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    private $tokenStorage;

    public function __construct(TokenStorageInterface   $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', TextType::class, array(
                'required'=>true,'label' => false,
            ))
            ->add('produits', EntityType::class, array(
                'class' => 'Commandes\CommandesBundle\Entity\Produits',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'DESC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user', $this->tokenStorage->getToken()->getUser());
                },
                'choice_label' => false,
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,


            ))
            ->add('reference', TextType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('reduction')
            ->add('qte', NumberType::class, array('required' => true))
            ->add('unite', TextType::class,array('required'=>false))
            ->add('description', TextareaType::class, array('required' => false, 'attr' => array(
                'placeholder' => 'Description',
            )))
            ->add('puHT', TextType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('puHTreduit', HiddenType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('puTTC', TextType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('puTTCreduit', HiddenType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalHT', TextType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalTTC', TextType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('prixHT', TextType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('prixTTC', TextType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalHTa', TextType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalTTCa', TextType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalreduct', HiddenType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('tva', EntityType::class, array(
                'class' => 'Commandes\CommandesBundle\Entity\Tva',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'ASC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser());
                },
                'choice_label' => 'valeur',
                'multiple' => false,
                'required'=>true,

            ))
            ->add('tva2', EntityType::class, array(
                'class' => 'Commandes\CommandesBundle\Entity\Tva',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'ASC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser());
                },
                'choice_label' => 'valeur',
                'multiple' => false,
                'required'=>true,

            ))
            ->add('type', HiddenType::class,array('required'=>false))
            ->add('user', EntityType::class, array(
                'class' => 'Commandes\CommandesBundle\Entity\User',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')

                        ->where('u.id = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser());
                },


                'multiple' => false,


            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Ventes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ventes';
    }


}
