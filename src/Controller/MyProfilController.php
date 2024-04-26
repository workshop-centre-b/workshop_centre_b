<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserProfilType;
use App\Form\UserStatutType;
use App\Repository\UserRepository;
use App\Form\UserResetPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/my_profil')]
#[Isgranted(new Expression('is_granted("ROLE_ADMIN") or is_granted("ROLE_PERSONNEL") or is_granted("ROLE_ELEVE")'))]
class MyProfilController extends AbstractController
{
    #[Route('/', name: 'app_my_profil')]
    public function index(UserRepository $userRepository): Response
    {
        $user = $userRepository->findOneBy([
            'id' => $this->getUser()
        ]);
        return $this->render('my_profil/index.html.twig', [
            'users' => $userRepository->findAll()
        ]);
    }

    #[Route('/edit/{id}', name:"app_my_profil_edit", methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserProfilType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_my_profil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('my_profil/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/reset_password/{id}', name:'app_my_profil_reset_password', methods: ['GET', 'POST'])]
    #[IsGranted(new Expression('is_granted("ROLE_ADMIN") or is_granted("ROLE_MED") or is_granted("ROLE_INF")'))]
    public function reset(Request $request, User $user, UserRepository $userRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $form = $this->createForm(UserResetPasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );
    
                $entityManager->flush();
                


            return $this->redirectToRoute('app_my_profil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('my_profil/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
}
