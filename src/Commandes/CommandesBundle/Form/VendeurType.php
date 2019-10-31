<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class VendeurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('user')
            ->add('nom')
            ->add('nifselect',ChoiceType::class,array(
                'choices_as_values' => true,'multiple'=>false,'expanded'=>false,
                'choices'  => array(
                    'NIF' => 'NIF',

                )))
            ->add('nif')
            ->add('adresse')
            ->add('codepostal')
            ->add('ville')
            ->add('email')
            ->add('siteweb')
            ->add('fax')
            ->add('telephone')
        ;

    }






}
