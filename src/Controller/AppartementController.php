<?php

namespace App\Controller;

use App\Repository\AppartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppartementController extends AbstractController
{
    #[Route('/appartement/{id}', name: 'app_appartement')]
    public function index(AppartementRepository $appartementRepository, int $id): Response
    {
        $appartement=$appartementRepository->find($id);

        return $this->render('appartement/index.html.twig', [
            'appartement'=>$appartement,
        
        ]);
    }
}
