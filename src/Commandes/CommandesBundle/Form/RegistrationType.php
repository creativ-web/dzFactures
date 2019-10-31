<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->remove('username')
            ->remove('password')

            ->add('departements')

            ->add('esssmail','email',array(
                'label'  => 'Email * : ','required'=> true,'attr' => array('class' => 'form-control')))

            ->add('email','email',array(
                'label'  => 'Email * : ','required'=> true,'attr' => array('class' => 'form-control')))


        ;
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';
    }
}