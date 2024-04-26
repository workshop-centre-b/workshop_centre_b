<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuSemaineController extends AbstractController
{
    #[Route('/menu_semaine', name: 'app_menu_semaine')]
    public function index(MenuRepository $menuRepository): Response
    {
        return $this->render('menu_semaine/index.html.twig', [
            'menus' => $menuRepository->findAll(),
        ]);
    }
}
