<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('roles',null, array(
                'type' => 'choice',

                'options' => array(
                    'label' => false,
                    'choices' => array('ROLE_ADMIN' => 'ADMINISTRATEUR', 'ROLE_USER' => 'CLIENT'),
                    'attr' => array('class' => 'form-control'),
                    'choices_as_values' => true,'multiple'=>false,'expanded'=>false,

                )))
            ->add('username')


            ->add('email','email',array(
                'label'  => 'Email * : ','required'=> true,'attr' => array('class' => 'form-control')))

            ->remove('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandes_commandesbundle_user';
    }


}
