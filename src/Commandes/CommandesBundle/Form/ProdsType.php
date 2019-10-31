<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Commandes\CommandesBundle\Form\MediaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProdsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'genemu_jqueryselect2_entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Produits',
                'property' => 'name',
                'empty_value' => ' ',
                'placeholder' => ' ',
                'multiple' => false,
                'required'=>true,

            ))

            ->add('reference','text', array('label' => false,
                'attr' => array('class'=>' form-control'),))

            ->add('qte','number',array('data' => '1'))

            ->add('prixunHT')->add('totalHT')->add('totalTTC')
            ->add('tva','entity',array('class' => 'CommandesBundle:Tva','property' => 'valeur','required'=>true))

        ;
    }



}
