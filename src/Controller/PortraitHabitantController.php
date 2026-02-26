<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PortraitHabitantController extends AbstractController
{
    #[Route('/portrait/habitant', name: 'app_portrait_habitant')]
    public function index(): Response
    {
        return $this->render('portrait_habitant/index.html.twig', [
            'controller_name' => 'PortraitHabitantController',
        ]);
    }
}
