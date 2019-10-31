<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepartementsfiltreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departements', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Departements',
                'property' => 'nom',

                'empty_value' =>false,
                'multiple' => false,
                'required'=>false,


            ))
        ;
    }



}
