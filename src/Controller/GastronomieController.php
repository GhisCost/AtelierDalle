<?php

namespace App\Controller;

use App\Entity\GastronomieDalle;
use App\Repository\GastronomieDalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GastronomieController extends AbstractController
{
    #[Route('/gastronomie/{id}', name: 'app_gastronomie')]
    public function index(GastronomieDalleRepository $repo,int $id): Response
    {
        $gastronomie = $repo->find($id);
        

        return $this->render('gastronomie/index.html.twig', [
            'gastronomie' => $gastronomie,
        ]);
    }


}
