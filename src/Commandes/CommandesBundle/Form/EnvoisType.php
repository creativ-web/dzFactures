<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\StocksType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EnvoisType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('expediteur','text', array(
                'required'=>false,
             ))

            ->add('adresseEmail','text', array(
                'required'=>false,
            ))

            ->add('copie','text', array(
                'required'=>false,
            ))
            ->add('titre','text', array(
                'required'=>false,
            ))

            ->add('texte',TextareaType::class, array(
                'required'=>true,

            ))
            ->add('document','checkbox', array(
                'required'=>false))


        ;
    }




}
