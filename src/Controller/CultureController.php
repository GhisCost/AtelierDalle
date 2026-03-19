<?php

namespace App\Controller;

use App\Entity\GastronomieDalle;
use App\Repository\CultureDuMondeRepository;
use App\Repository\GastronomieDalleRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CultureController extends AbstractController
{
    #[Route('/culture', name: 'app_culture')]
    public function index(CultureDuMondeRepository $cultureDuMondeRepo, GastronomieDalleRepository  $gastronomieDalleRepo): Response
    {

        $culturesDuMonde=$cultureDuMondeRepo->findAll();
        $gastronomies=$gastronomieDalleRepo->findAll();

        return $this->render('culture/index.html.twig', [
            'cultureDuMonde'=>$culturesDuMonde,
            'gastronomies'=>$gastronomies
        ]);
    }
}
