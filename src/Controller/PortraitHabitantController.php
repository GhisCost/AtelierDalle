<?php

namespace App\Controller;

use App\Repository\PortraitHabitantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PortraitHabitantController extends AbstractController
{
    #[Route('/portrait/{id}', name: 'app_portrait_habitant')]
    public function index(PortraitHabitantRepository $portraitHabitantRepository, int $id): Response
    {
        $portrait=$portraitHabitantRepository->find($id);

        return $this->render('portrait_habitant/index.html.twig', [
           'portrait'=>$portrait,
        ]);
    }
}
