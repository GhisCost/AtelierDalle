<?php

namespace App\Controller;

use App\Repository\ObjetHabitantRepository;
use App\Repository\PortraitHabitantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ChoixObjetHabitantController extends AbstractController
{
    #[Route('/choix/objet/habitant/{id}', name: 'app_choix_objet_habitant')]
    public function index(PortraitHabitantRepository $portraitHabitantRepository, int $id, ObjetHabitantRepository $objetHabitantRepository): Response
    {

        $habitant=$portraitHabitantRepository->find($id);

        $objets=$objetHabitantRepository->findByPortraitHabitant($habitant);

        return $this->render('choix_objet_habitant/index.html.twig', [
            'habitant'=>$habitant,
            'objets'=>$objets
        ]);
    }
}
