<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AcceuillController extends AbstractController
{
    #[Route('/acceuill', name: 'app_acceuill')]
    public function index(): Response
    {
        return $this->render('acceuill/index.html.twig', [
            'controller_name' => 'AcceuillController',
        ]);
    }
}
