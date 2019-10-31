<?php

namespace Commandes\CommandesBundle\Form\Graphes;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use Doctrine\ORM\EntityRepository;

class GraphesType extends AbstractType
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

            ->add('typeRapport', ChoiceType::class, array(
                'choices' => array(
                    'Graphes' => array(
                        'revenue_and_expenses' => 'Revenus et Dépenses',
                        'revenue' => 'Revenus',
                        'expenses' => 'Dépenses',
                        'sales_count' => 'Nombre total de ventes',
                    ),
                    'Trésorerie' => array(
                        'income_tax_records' => 'Registre des ventes TVA',
                        'invoice_list' => 'Liste des revenus',
                        'expense_invoice_list' => 'Liste des dépenses',
                        'department_balance' => 'Situation financière des départements/succursales ',
                        'categories' => 'Revenus et dépenses par catégorie',
                        'unpaid_invoice_list' => 'Liste des factures non payées',
                    ),
                    'Produits' => array(
                        'products_income' => 'Produits: Ventes (revenus)',
                        'products_expense' => 'Produits: Achat (dépenses)',
                        'products_margin' => 'Produits: Marge',
                        'categories_products' => 'Revenus et dépenses par catégorie de produit ',

                    ),
                    'Stocks' => array(
                        'warehouse_actions' => 'Résumé des opérations de stock',
                        'cost_inventory' => 'Inventaire des achats',
                        'products_warehouse_statement' => 'Stock entré/sorti (selon les documents de gestion de stock)',
                        'products_availability' => 'État des stocks ',
                        'products_statement' => 'Mouvements des stocks',
                        'products_statement_fifo' => 'Mouvements des stocks (selon les documents de gestion de stock)',
                        'products_margin_warehouse' => 'Stocks: Marge',
                    ),
                    'Clients' => array(
                        'clients' => 'Clients',
                        'customer_balance' => 'Solde des clients',

                    ),
                    'Comptabilité' => array(
                        'income_tax_records' => 'Registre des ventes TVA ',
                        'expenses_tax_records' => 'Registre des achats TVA',
                    ),
                    'Espèces' => array(
                        'cash_report' => 'Mouvements des Espèces',

                    ),


                )))

            ->add('du', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now -12 month'),'label'=>' '))

            ->add('au', DateType::class,array('widget' => 'single_text', 'required'=>true,'data' => new \DateTime('now'),'label'=>' '))

            ->add('grouperPar', ChoiceType::class, array(
                'choices'  => array(
                    'year' => 'année',
                    'quarter' => 'trimestre',
                    'month' => 'mois',
                    'week' => 'semaine',
                    'day' => 'jour',

                ), 'data' => "month",))
            ->add('zonnestocks', 'entity', array(
                'class' => 'Commandes\CommandesBundle\Entity\Zonnestocks',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')

                        ->Where('u.user = :user')
                        ->setParameter('user',$this->tokenStorage->getToken()->getUser())


                        ;
                },
                'property' => 'nom',
                'multiple' => false,
                'required'=>true,

            ))

            ->add('additionnelle', ChoiceType::class, array(
                'choices'  => array(
                    'transaction_date' => 'Date additionnelle',
                    'issue_date' => 'Date de création',
                    'paid_date' => 'Date de paiement',

                ), 'data' => "issue_date",))

            ->add('montants', ChoiceType::class, array(
                'choices'  => array(
                    'gross' => 'T.T.C.',
                    'net' => 'H.T.',
                    'tax' => 'TVA',

                ), 'data' => "gross",))

            ->add('typeDocument', ChoiceType::class, array(
                'choices'  => array(
                    'accounting_only' => 'Tous documents comptables',
                    'vat' => 'Facture',
                    'proforma' => 'Facture Proforma',
                    'receipt' => 'Reçu',
                    'invoice_other' => 'Autre document',
                    'estimate' => 'Devis',
                    'client_order' => 'Bon de Commande',
                    'test_mode' => 'Test',


                )))
            ->add('etat', ChoiceType::class, array(
                'choices'  => array(
                    'Tous' => 'Tous',
                    'Créé' => 'Créé',
                    'Payé' => 'Payé',
                    'Payé en partie' => 'Payé en partie',
                    'Envoyé' => 'Envoyé',


                ), 'data' => "Tous",
                ))
            ->add('contact', 'text',array('required'=>false))
        ;


    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'Graphes';
    }


}
