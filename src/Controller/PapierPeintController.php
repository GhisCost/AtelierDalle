<?php

namespace App\Controller;

use App\Enum\Categorie;
use App\Repository\MediaAppartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PapierPeintController extends AbstractController
{
    #[Route('/papier/peint', name: 'app_papier_peint')]
    public function index(MediaAppartementRepository $mediaAppartementRepo): Response
    {

        $papierPeint= $mediaAppartementRepo->findBy(['Categorie' => Categorie::PAPIERPEINT]);


        return $this->render('papier_peint/index.html.twig', [
           'papierPeint'=>$papierPeint,
        ]);
    }
}
