<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Plat;
use App\Repository\PlatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use PhpParser\Node\Expr\AssignOp\Div;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
                'label_attr' => [
                    'class' => 'form-label label first'
                ],
                'attr' => [
                    'class' => 'form-control control'
                ],
            ])
            ->add('service', ChoiceType::class, [
                'label' => 'Service',
                'choices' => [
                    'Midi' => 'Midi',
                    'Soir' => 'Soir'
                ],
                'label_attr' => [
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control'
                ],
            ])
            ->add('entree', EntityType::class, [
                'label' => "Entrée",
                'label_attr' => [
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control'
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
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control'
                ],
                'class' => Plat::class,
                'choice_label' => 'nom',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.type = :type')
                        ->andWhere('p.regime = :regime')
                        ->setParameter('type', 'Plat')
                        ->setParameter('regime', 'Viande');
                },
            ])
            ->add('platDeux', EntityType::class, [
                'label' => "Plat Poisson",
                'label_attr' => [
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control'
                ],
                'class' => Plat::class,
                'choice_label' => 'nom',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                    ->where('p.type = :type')
                    ->andWhere('p.regime = :regime')
                    ->setParameter('type', 'Plat')
                    ->setParameter('regime', 'Poisson');
                },
            ])
            ->add('platTrois', EntityType::class, [
                'label' => "Plat Végétarien (Optionnel)",
                'label_attr' => [
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control'
                ],
                'class' => Plat::class,
                'choice_label' => 'nom',
                'query_builder' => function (PlatRepository $er) {
                    return $er->createQueryBuilder('p')
                    ->where('p.type = :type')
                    ->andWhere('p.regime = :regime')
                    ->setParameter('type', 'Plat')
                    ->setParameter('regime', 'Végétarien');
                },
            ])
            ->add('dessert', EntityType::class, [
                'label' => "Dessert",
                'label_attr' => [
                    'class' => 'form-label label'
                ],
                'attr' => [
                    'class' => 'form-control control'
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
