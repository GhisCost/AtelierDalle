<?php

namespace App\Controller;

use App\Repository\ObjetHabitantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageObjetsHabitantsController extends AbstractController
{
    #[Route('/page/objets/habitants/{id}', name: 'app_page_objets_habitants')]
    public function index(ObjetHabitantRepository $objetHabitantRepository, int $id): Response
    {
        
        $objet=$objetHabitantRepository->find($id);


        return $this->render('page_objets_habitants/index.html.twig', [
            'objet'=>$objet
        ]);
    }
}
