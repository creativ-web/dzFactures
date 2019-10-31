<?php
namespace Commandes\CommandesBundle\Form\Filtre;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\StocksType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
class FiltreFacturesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    private $tokenStorage;
    public function __construct(TokenStorageInterface   $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mot', TextType::class, array(
                'required'=>false,
                'attr' => array(
                    'placeholder' => 'Ecrire un mot ou n°',
                )))
            ->add('type', ChoiceType::class, array(
                'choices_as_values' => false,'multiple'=>false,'expanded'=>false,
                'required'=>false,
                'choices'  => array(
                    'tous' => 'Tous',
                    'fact' => 'Facture',
                    'proforma' => 'Facture Proforma',
                    'recu' => 'Reçu',
                    'devis' => 'Devis',
                    'bdc' => 'Bon de Commande',
                ),
                'data' => "fact",
                'required'=>true))
            ->add('periode', ChoiceType::class, array(
                'choices_as_values' => false,'multiple'=>false,'expanded'=>false,
                'choices'  => array(
                    'last_12_months' => 'aujourd\'hui',
                    'this_month' => 'ce mois',
                    'last_30_days' => '30 derniers jour',
                    'last_month' => 'le mois dernier',
                    'this_year' => 'cette année',
                    'last_year' => 'l\'année dernière',
                    'actual_accounting_period' => 'exercice comptable',
                    'tous' => 'Tous',
                    'more' => 'autre...',
                ),
                'data' => "last_12_months",
                'required'=>true))
            ->add('du', DateTimeType::class,array(
                'required'=>true,
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd  HH:mm',
                'data' => new \DateTime('now  00:00'),
            ))
            ->add('au', DateTimeType::class,array(
                'required'=>true,
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd  HH:mm',
                'data' => new \DateTime('now +1 day 00:00'),
            ))
            ->add('etat', ChoiceType::class, array(
                'choices_as_values' => false,'multiple'=>false,'expanded'=>false,
                'choices'  => array(
                    'tous' => 'Tous',
                    'Créé' => 'Créé',
                    'Payé' => 'Payé',
                    'Payé en partie' => 'Payé en partie',
                    'Envoyé' => 'Envoyé',
                    'Impayé' => 'Impayé',
                ),
                'data' => "Créé",'required'=>true))
            ->add('zone', EntityType::class, array(
                'class' => 'Commandes\CommandesBundle\Entity\Zonnestocks',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'DESC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser());
                },
                'property' => 'nom',
                'multiple' => false,
                'required'=>false,
            ))
            ->add('tables', EntityType::class, array(
                'class' => 'Commandes\CommandesBundle\Entity\Tables',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'ASC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser());
                },
                'property' => 'nom',
                'empty_value'   => 'Tous',
                'multiple' => false,
                'required'=>false,
            ))
            ->add('valzone', EntityType::class, array(
                'class' => 'Commandes\CommandesBundle\Entity\Zonnestocks',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id', 'ASC')
                        ->andWhere('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser());
                },
                'property' => 'nom',
                'multiple' => false,
                'required'=>true,
            ));
    }
}