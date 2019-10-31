<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StocksType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dispo')->add('datexp')->add('datexpAlert')->add('datentrer')->add('ug')->add('reference')->add('description')->add('prixHT')->add('prixTTC')->add('prixVente')->add('qte')->add('qtealert')->add('barcode')->add('familles')->add('fournisseurs')->add('achats')->add('zonnestocks')
            ->add('name', 'datalist', array('choices'=>array('a','b')))
            ->add('tva')
            ->add('totalHT')
            ->add('totalTTC')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Stocks'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandes_commandesbundle_stocks';
    }


}
