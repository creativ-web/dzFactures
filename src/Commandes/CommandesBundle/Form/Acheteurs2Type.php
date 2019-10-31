<?php
namespace Commandes\CommandesBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
class Acheteurs2Type extends AbstractType
{
    private $tokenStorage;
    public function __construct(TokenStorageInterface   $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', EntityType::class, array(
                'class' => 'Commandes\CommandesBundle\Entity\Acheteurs',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser());
                },
                'choice_label' => false,
                'choice_label' => 'nom',
                'multiple' => false,
                'required'=>false,
            ))
            ->add('user', 'genemu_jqueryselect2_entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\User',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->andWhere('u.id = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser());
                },
                'choice_label' => 'username',
                'multiple' => false,
                'required'=>true,
            ))
            ->add('nom', TextareaType::class, array(
                'required'=>true))
            ->add('prenom',TextType::class,array('required'=>false))
            ->add('famille',TextType::class,array('required'=>false))
            ->add('nrcselect', ChoiceType::class, array(
                'choices_as_values' => true,'multiple'=>false,'expanded'=>false,

                'choices'  => array(
                    'NRC' => 'NRC',
                    'NIF' => 'NIF',
                )))
            ->add('nrc', TextType::class,array('required'=>false))
            ->add('nif', TextType::class,array('required'=>false))
            ->add('adresse', TextType::class,array('required'=>false))
            ->add('codepostal', TextType::class,array('required'=>false))
            ->add('ville', TextType::class,array('required'=>false))
            ->add('email', EmailType::class,array('required'=>false))
            ->add('siteweb', TextType::class,array('required'=>false))
            ->add('fax', TextType::class,array('required'=>false))
            ->add('telephone', TextType::class,array('required'=>false))
            ->add('type',HiddenType::class,array('required'=>false),

                array('choices' => array(
                    'Professionnel' => '1',
                    'Particulier' => '2',
                ),
                    'data' => 1,
                    'choices_as_values' => true,'multiple'=>false,'expanded'=>true))
            ->add('civilite', ChoiceType::class, array(
                'choices_as_values' => true,'multiple'=>false,'expanded'=>false,

                'empty_value' => false,
                'required'=>false,
                'choices'  => array(
                    'm' => 'M.',
                    'mme' => 'Mme',
                    'mmes' => 'Mmes',
                    'mrs' => 'Mrs',
                    'm&mme' => 'M. & Mme',
                )));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Acheteurs'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandes_commandesbundle_acheteurs';
    }
}