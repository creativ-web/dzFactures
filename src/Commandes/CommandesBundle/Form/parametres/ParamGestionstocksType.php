<?php

namespace Commandes\CommandesBundle\Form\parametres;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityRepository;

class ParamGestionstocksType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('defaultTax', 'text',array('required'=>false))
            ->add('invoiceTaxName', 'text',array('required'=>false))

            ->add('invoiceTax2Visible', 'checkbox', array(
                'label'    => 'Deuxième taxe',
                'required' => false,
            ))

            ->add('defaultTax2', 'text',array('required'=>false))
            ->add('invoiceTax2Name', 'text',array('required'=>false))

            ->add('invoiceTax3Visible', 'checkbox', array(
                'label'    => 'Droit de timbre',
                'required' => false,
            ))

            ->add('defaultTax3', 'text',array('required'=>false))
            ->add('invoiceTax3Name', 'text',array('required'=>false))
        ;


    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Sectiondocs'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'Sectiondocs';
    }

}
