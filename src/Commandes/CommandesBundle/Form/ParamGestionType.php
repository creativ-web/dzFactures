<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityRepository;

class ParamGestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('autobl', ChoiceType::class, array(
                'choices'  => array(
                    '' => 'Inactif',

                    'create_bl' => 'Créer un bon de livraison à chaque création de facture',

                ),

                'required'=>false))
            ->add('autobe', ChoiceType::class, array(
                'choices'  => array(
                    '' => 'Inactif',

                    'create_be' => 'Créer un bon d\'entrée à chaque création de facture d\'achat (dépense)',

                ),

                'required'=>false))

            ->add('galeriephotos', ChoiceType::class, array(
                'choices'  => array(
                    '' => 'Inactif',

                    'activer' => 'Activer',

                ),

                'required'=>false))


            ->add('tablesystem', ChoiceType::class, array(
                'choices'  => array(
                    '' => 'Inactif',

                    'activer' => 'Activer',

                ),

                'required'=>false))
        ;


    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Paramgestions'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'paramgestion';
    }

}
