<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'label' => "Rôle",
                'attr' => [
                    'class' => 'form-control d-block'
                ],
                'multiple' => true,
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Personnel' => "ROLE_PERSONNEL"
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'invalid_message' => 'Les mots de passe ne correspondent pas',
                'first_options' => [
                    'label' => 'Entrer un mot de passe : ',
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ],
                'second_options' => [
                    'label' => 'Répéter le mot de passe : ',
                    'attr' => [
                        'class' => 'form-control'
                    ],
                ],
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe'
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe est trop petit',
                        'max' => 20,
                        'maxMessage' => 'Votre mot de passe est trop grand'
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
