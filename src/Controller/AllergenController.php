<?php

namespace App\Controller;

use App\Entity\Allergen;
use App\Form\AllergenType;
use App\Repository\AllergenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/allergen')]
#[Isgranted(new Expression('is_granted("ROLE_ADMIN") or is_granted("ROLE_PERSONNEL")'))]
class AllergenController extends AbstractController
{
    #[Route('/', name: 'app_allergen_index', methods: ['GET'])]
    public function index(AllergenRepository $allergenRepository): Response
    {
        return $this->render('allergen/index.html.twig', [
            'allergens' => $allergenRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_allergen_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $allergen = new Allergen();
        $form = $this->createForm(AllergenType::class, $allergen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($allergen);
            $entityManager->flush();

            return $this->redirectToRoute('app_allergen_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('allergen/new.html.twig', [
            'allergen' => $allergen,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_allergen_show', methods: ['GET'])]
    public function show(Allergen $allergen): Response
    {
        return $this->render('allergen/show.html.twig', [
            'allergen' => $allergen,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_allergen_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Allergen $allergen, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AllergenType::class, $allergen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_allergen_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('allergen/edit.html.twig', [
            'allergen' => $allergen,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_allergen_delete', methods: ['POST'])]
    public function delete(Request $request, Allergen $allergen, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$allergen->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($allergen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_allergen_index', [], Response::HTTP_SEE_OTHER);
    }
}
