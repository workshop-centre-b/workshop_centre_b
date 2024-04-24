<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AllergenController extends AbstractController
{
    #[Route('/allergen', name: 'app_allergen')]
    public function index(): Response
    {
        return $this->render('allergen/index.html.twig', [
            'controller_name' => 'AllergenController',
        ]);
    }
}
