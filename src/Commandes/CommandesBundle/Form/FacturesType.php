<?php
namespace Commandes\CommandesBundle\Form;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
class FacturesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    private $tokenStorage;
    public function __construct( TokenStorageInterface   $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'choices_as_values' => false,'multiple'=>false,'expanded'=>false,
                'choices'  => array(
                    'fact' => 'Facture',
                    'proforma' => 'Facture Proforma',
                    'recu' => 'Reçu',
                    'devis' => 'Devis',
                    'bdc' => 'Bon de Commande',
                ),

                'data' => "fact",
                'required'=>true))
            ->add('nf',TextType::class,array('required'=>false))
            ->add('tables', EntityType::class, array(
                'choice_label' => 'nom',
                'class' => 'Commandes\CommandesBundle\Entity\Tables',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'ASC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())
                        ;
                },
                'choice_label' => 'nom',
                'multiple' => false,
                'required'=>true,
            ))
            ->add('datecreation', DateType::class,array('widget' => 'single_text', 'required'=>true))
            ->add('departements',DepartementsType::class,array('required'=>false))
            ->add('acheteur', Acheteurs2Type::class,array('required'=>false))
            ->add('ventes', CollectionType::class, array(
                'entry_type' => VentesType::class,
                'prototype'=>true,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ))

            ->add('objet', TextType::class,array('required'=>false))
            ->add('lieu',TextType::class,array('required'=>false))
            ->add('moderegle', ChoiceType::class, array(
                'choices_as_values' => false,'multiple'=>false,'expanded'=>false,
                'choices'  => array(
                    'Espèces' => 'Espèces',
                    'Virement bancaire' => 'Virement bancaire',
                    'Carte bancaire' => 'Carte bancaire',
                    'Chèque' => 'Chèque',
                )))
            ->add('additionnelle', ChoiceType::class, array(
                'choices'  => array(
                    'Date de vente' => 'Date de vente',
                    'Date limite de validité' => 'Date limite de validité',
                    'Délai de rétractation jusqu\'au' => 'Délai de rétractation jusqu\'au ',

                )))
            ->add('dateadd', DateType::class,array('widget' => 'single_text', 'required'=>true))
            ->add('lignes', CollectionType::class, array(

                'entry_type' => LignesType::class,
                'prototype'=>true,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ))
            ->add('dateregle', ChoiceType::class, array(
                'choices_as_values' => false,'multiple'=>false,'expanded'=>false,
                'choices'  => array(
                    '5' => '5 jours',
                    '10' => '10 jours',
                    '15' => '15 jours',
                    '30' => '30 jours',
                    '45' => '45 jours',
                    '60' => '60 jours',
                    '0' => '0 jours',
                    'a_reception' => 'A réception',
                    'a_la_comande' => 'A la commande',
                    'end_of_next_m' => '30 jours fin de mois',
                ),'data' => '5'))
            ->add('etat', ChoiceType::class, array(
                'choices_as_values' => false,'multiple'=>false,'expanded'=>false,

                'choices'  => array(
                    'Créé' => 'Créé',
                    'Payé' => 'Payé',
                    'Payé en partie' => 'Payé en partie',
                    'Envoyé' => 'Envoyé',

                )))

            ->add('totalHT', HiddenType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalTTC', HiddenType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('totalReduction', HiddenType::class, array('required' => false, 'label' => false,
                'attr' => array('class'=>' form-control')))
            ->add('montantpaye')
            ->add('zonnestocks', EntityType::class, array(
                'choice_label' => 'nom',
                'class' => 'Commandes\CommandesBundle\Entity\Zonnestocks',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'DESC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())
                        ;
                },
                'choice_label' => 'nom',
                'multiple' => false,
                'required'=>true,
            ))
            ->add('nomvendeur', TextType::class,array('required'=>false))
            ->add('informations', TextType::class,array('required'=>false))
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Factures'
        ));
    }
}