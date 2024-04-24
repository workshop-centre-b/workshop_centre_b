<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text'
            ])
            ->add('service', ChoiceType::class, [
                'label' => 'Service',
                'choices' => [
                    'Midi' => 'Midi',
                    'Soir' => 'Soir'
                ],
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ],
            ])
            ->add('entree', EntityType::class, [
                'label' => "Entrée",
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ],
                'class' => Plat::class,
                'choice_label' => 'nom',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->setParameter('type', 'Entree');
                },
            ])
            ->add('platUn', EntityType::class, [
                'label' => "Plat Viande",
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ],
                'class' => Plat::class,
                'choice_label' => 'nom',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->setParameter('type', 'Plat');
                },
            ])
            ->add('platDeux', EntityType::class, [
                'label' => "Plat Poisson",
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ],
                'class' => Plat::class,
                'choice_label' => 'nom',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->setParameter('type', 'Plat');
                },
            ])
            ->add('platTrois', EntityType::class, [
                'label' => "Plat Végétarien (Optionnel)",
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ],
                'class' => Plat::class,
                'choice_label' => 'nom',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->setParameter('type', 'Plat');
                },
            ])
            ->add('dessert', EntityType::class, [
                'label' => "Dessert",
                'label_attr' => [
                    'class' => ''
                ],
                'attr' => [
                    'class' => ''
                ],
                'class' => Plat::class,
                'choice_label' => 'nom',
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
