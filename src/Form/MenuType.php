<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->setParameter('type', 'Entree');
                },
            ])
            ->add('platUn', EntityType::class, [
                'class' => Plat::class,
                'choice_label' => 'id',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->setParameter('type', 'Plat');
                },
            ])
            ->add('platDeux', EntityType::class, [
                'class' => Plat::class,
                'choice_label' => 'id',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->setParameter('type', 'Plat');
                },
            ])
            ->add('platTrois', EntityType::class, [
                'class' => Plat::class,
                'choice_label' => 'id',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->setParameter('type', 'Plat');
                },
            ])
            ->add('dessert', EntityType::class, [
                'class' => Plat::class,
                'choice_label' => 'id',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->setParameter('type', 'Dessert');
                },
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
