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
                    'class' => 'form-label label first'
                ],
                'attr' => [
                    'class' => 'form-control control'
                ]
            ])
            ->add('composition', TextareaType::class, [
                'label' => "Composition",
                'label_attr' => [
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control'
                ]
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type de plat',
                'choices' => [
                    'Entree' => 'Entree',
                    'Plat' => 'Plat',
                    'Dessert' => 'Dessert'
                ],
                'label_attr' => [
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control'
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
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control'
                ]
            ])
            ->add('allergenes', EntityType::class, [
                'label' => "Allergènes",
                'class' => Allergen::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
                'label_attr' => [
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control test'
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
