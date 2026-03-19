<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DispositifsController extends AbstractController
{
    #[Route('/dispositifs', name: 'app_dispositifs')]
    public function index(): Response
    {
        return $this->render('dispositifs/index.html.twig', [
         
        ]);
    }
}
