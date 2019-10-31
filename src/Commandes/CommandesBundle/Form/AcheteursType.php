<?php
namespace Commandes\CommandesBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class AcheteursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,array('required'=>false))
            ->add('nrcselect', ChoiceType::class, array(
                'choices'  => array(
                    'NIF' => 'NIF',
                    'NRC' => 'NRC',
                    'choices_as_values' => true,'multiple'=>false,'expanded'=>true
                )))
            ->add('civilite', ChoiceType::class, array(
                'empty_value' => ' ',
                'required'=>false,
                'choices'  => array(
                    'm' => 'M.',
                    'mme' => 'Mme',
                    'mmes' => 'Mmes',
                    'mrs' => 'Mrs',
                    'm&mme' => 'M. & Mme',
                    'choices_as_values' => true,'multiple'=>false,'expanded'=>false,
                )))
            ->add('pays', ChoiceType::class, array(
                'choices_as_values' => true,'multiple'=>false,'expanded'=>false,

                'choices'  => array(
                    'algerie' => 'Algérie',
                )))
            ->add('prenom', TextType::class,array('required'=>false))
            ->add('famille', TextType::class,array('required'=>false))
            ->add('nif', TextType::class,array('required'=>false))
            ->add('nrc', TextType::class,array('required'=>false))
            ->add('adresse', TextType::class,array('required'=>false))
            ->add('adressesupp', TextType::class,array('required'=>false))
            ->add('codepostal', TextType::class,array('required'=>false))
            ->add('ville', TextType::class,array('required'=>false))
            ->add('email', TextType::class,array('required'=>false))
            ->add('siteweb', TextType::class,array('required'=>false))
            ->add('fax', TextType::class,array('required'=>false))
            ->add('telephone', TextType::class,array('required'=>false))
            ->add('telmobile', TextType::class,array('required'=>false))
            ->add('description', TextType::class,array('required'=>false))
            ->add('nomusage', TextType::class,array('required'=>false))
            ->add('type', ChoiceType::class, array(
                'choices_as_values' => true,'multiple'=>false,'expanded'=>false,

                'choices'  => array(
                    'client&fournisseur' => 'Client ou Fournisseur',
                    'client' => 'Client',
                    'fournisseur' => 'Fournisseur',
                )))
            ->add('reduction', HiddenType::class,array('required'=>false))
            ->add('taxe', TextType::class,array('required'=>false))
            ->add('cb', TextType::class,array('required'=>false))
            ->add('ncb', TextType::class,array('required'=>false))
            ->add('limitereglement', ChoiceType::class, array(
                'choices_as_values' => true,'multiple'=>false,'expanded'=>false,

                'choices'  => array(
                    '5 jours' => '5 jours',
                    '10 jours' => '10 jours',
                    '15 jours' => '15 jours',
                    '30 jours' => '30 jours',
                    '45 jours' => '45 jours',
                    '60 jours' => '60 jours',
                    '0 jours' => '0 jours',
                    'A réception' => 'A réception',
                    'A la commande' => 'A la commande',
                    '30 jours fin de mois' => '30 jours fin de mois',
                ),'data' => '60 jours'))
            ->add('modereglement', ChoiceType::class, array(
                'choices_as_values' => true,'multiple'=>false,'expanded'=>false,

                'choices'  => array(
                    'virementbancaire' => 'Virement bancaire',
                    'cartebancaire' => 'Carte bancaire',
                    'espèces' => 'Espèces',
                    'chèque' => 'Chèque',
                )))
            ->add('immatriculation', TextType::class,array('required'=>false))
            ->add('relances', CheckboxType::class, array('required' => false))
            ->add('personne', TextType::class,array('required'=>false))
            ->add('codeclient', TextType::class,array('required'=>false));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Commandes\CommandesBundle\Entity\Acheteurs'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandes_commandesbundle_acheteurs';
    }
}