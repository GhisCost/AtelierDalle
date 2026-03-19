<?php

namespace App\Controller;

use App\Entity\CultureDuMonde; // <-- LIGNE TRÈS IMPORTANTE
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageCultureController extends AbstractController
{
    // Ajout de {id} dans la route pour savoir quelle culture chercher
    #[Route('/page/culture/{id}', name: 'app_page_culture')]
    public function index(CultureDuMonde $culture): Response // Injection de l'entité
    {
        return $this->render('page_culture/index.html.twig', [
            'culture' => $culture, // <-- C'EST ICI QU'ON DONNE LA VARIABLE À TWIG
        ]);
    }
}
