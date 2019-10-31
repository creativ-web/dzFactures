<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\EntityRepository;
class DepartementsType extends AbstractType
{
    private $tokenStorage;

    public function __construct( TokenStorageInterface   $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('id', 'genemu_jqueryselect2_entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Departements',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')

                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())

                        ;
                },
                'property' => 'nom',
                'empty_value' => 'Ajouter un nouveau département (ou compagnie)',
                'multiple' => false,
                'required'=>true,

            ))
            ->add('user', 'genemu_jqueryselect2_entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\User',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->andWhere('u.id = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())

                        ;
                },
                'property' => 'username',
                'multiple' => false,
                'required'=>true,

            ))
            ->add('nom')
            ->add('nrcselect','choice',array(
                'choices'  => array(
                    'NRC' => 'NRC',
                    'NIF' => 'NIF',

                )))
            ->add('nrc')
            ->add('nif')
            ->add('iban')
            ->add('banque')
            ->add('bic')
            ->add('adresse')
            ->add('codepostal')
            ->add('ville')
            ->add('email')
            ->add('siteweb')
            ->add('fax')
            ->add('telephone');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Departements'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandes_commandesbundle_departements';
    }


}
