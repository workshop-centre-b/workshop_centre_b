<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Plat;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text'
            ])
            ->add('service')
            ->add('optionPlat')
            ->add('entree', EntityType::class, [
                'class' => Plat::class,
'choice_label' => 'id',
            ])
            ->add('platUn', EntityType::class, [
                'class' => Plat::class,
'choice_label' => 'id',
            ])
            ->add('platDeux', EntityType::class, [
                'class' => Plat::class,
'choice_label' => 'id',
            ])
            ->add('platTrois', EntityType::class, [
                'class' => Plat::class,
'choice_label' => 'id',
            ])
            ->add('dessert', EntityType::class, [
                'class' => Plat::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
