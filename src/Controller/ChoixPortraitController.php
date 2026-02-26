<?php

namespace App\Controller;

use App\Entity\PortraitHabitant;
use App\Repository\PortraitHabitantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ChoixPortraitController extends AbstractController
{
    #[Route('/choix/portrait', name: 'app_choix_portrait')]
    public function index(PortraitHabitantRepository $portraitHabitantRepository): Response
    {
        $portraits = $portraitHabitantRepository->findAllPortraits();


        return $this->render('choix_portrait/index.html.twig', [
            'portraits' => $portraits,
        ]);
    }
}
