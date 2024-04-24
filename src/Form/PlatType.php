<?php

namespace App\Form;

use App\Entity\Plat;
use App\Entity\Allergen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PlatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('composition')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Entree' => 'Entree',
                    'Plat' => 'Plat',
                    'Dessert' => 'Dessert'
                ]
            ])
            ->add('regime', ChoiceType::class, [
                'choices' => [
                    'Viande' => 'Viande',
                    'Poisson' => 'Poisson',
                    'Végétarien' => 'Végétarien',
                    'Autre' => 'Autre'
                ]
            ])
            ->add('allergenes', EntityType::class, [
                'class' => Allergen::class,
'choice_label' => 'id',
'multiple' => true,
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
