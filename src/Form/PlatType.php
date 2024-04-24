<?php

namespace App\Form;

use App\Entity\Plat;
use App\Entity\Allergen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PlatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => "Nom",
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('composition', TextareaType::class, [
                'label' => "Composition",
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type de plat',
                'choices' => [
                    'Entree' => 'Entree',
                    'Plat' => 'Plat',
                    'Dessert' => 'Dessert'
                ]
            ])
            ->add('regime', ChoiceType::class, [
                'label' => 'Régime',
                'choices' => [
                    'Viande' => 'Viande',
                    'Poisson' => 'Poisson',
                    'Végétarien' => 'Végétarien',
                    'Autre' => 'Autre'
                ],
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('allergenes', EntityType::class, [
                'label' => "Allergènes",
                'class' => Allergen::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plat::class,
        ]);
    }
}
