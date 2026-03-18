<?php

namespace App\Controller;

use App\Entity\GastronomieDalle;
use App\Repository\GastronomieDalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GastronomieController extends AbstractController
{
    // 📌 LISTE de toutes les gastronomies
    #[Route('/gastronomie', name: 'app_gastronomie')]
    public function index(GastronomieDalleRepository $repo): Response
    {
        $gastronomie = $repo->findAll();
        // dd($gastronomie);

        return $this->render('gastronomie/index.html.twig', [
            'gastronomie' => $gastronomie,
        ]);
    }

    // 📌 DETAIL d'une gastronomie
    #[Route('/gastronomie/{id}', name: 'app_gastronomie_show')]
    public function show(GastronomieDalle $gastronomie): Response
    {
        return $this->render('gastronomie/show.html.twig', [
            'gastronomie' => $gastronomie,
        ]);
    }
}
