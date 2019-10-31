<?php

namespace Commandes\CommandesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\StocksType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class SearchsProduitsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('mot','text', array(
                'required'=>false,
                'attr' => array(
                    'placeholder' => 'Ecrire un mot ou n°',

                )))
            ->add('zone', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Zonnestocks',
                'property' => 'nom',
                'empty_value' => 'Tous',
                'multiple' => false,
                'required'=>false,

            ))

            ->add('type', ChoiceType::class, array(
                'required'=>false,
                'choices'  => array(
                    'all' => 'Tous',
                    'buy' => 'A l\'achat',
                    'sell' => 'A la vente',
                    'both' => 'A la vente ou à l\'achat',


                ),
                'data' => "all",
            ))
            ->add('nature', ChoiceType::class, array(
                'required'=>false,
                'choices'  => array(
                    'all' => 'Tout',
                    'products_only' => 'Produits "articles" seulement',
                    'services_only' => 'Produits "services" seulement',



                ),
                'data' => "all",
            ))



        ;
    }




}
