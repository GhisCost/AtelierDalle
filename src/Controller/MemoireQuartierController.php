<?php
namespace App\Controller;

use App\Repository\PortraitHabitantRepository;
use App\Repository\PortraitNonHabitantRepository;
use App\Repository\AppartementRepository;
use App\Repository\ArchiveMediaRepository;
use App\Repository\MediaAppartementRepository;
use App\Enum\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MemoireQuartierController extends AbstractController
{
    #[Route('/memoire/quartier', name: 'app_memoire_quartier')]
    public function index(
    PortraitHabitantRepository $portraitHabitantRepo,
    PortraitNonHabitantRepository $portraitNonHabitantRepo,
    AppartementRepository $appartementRepo,
    ArchiveMediaRepository $archiveMediaRepo,
    MediaAppartementRepository $mediaAppartementRepo
): Response {
    $appartements = $appartementRepo->findAll();
    $appartementsAvecPhoto = [];

    foreach ($appartements as $appartement) {
        $photo = $mediaAppartementRepo->findOneBy([
            'appartement' => $appartement,
            'Categorie' => Categorie::PHOTOS
        ]);
        if ($photo) {
            $appartementsAvecPhoto[] = [
                'appartement' => $appartement,
                'photo' => $photo
            ];
        }
    }

    return $this->render('memoire_quartier/index.html.twig', [
        'portraitsHabitants' => $portraitHabitantRepo->findAll(),
        'portraitsNonHabitants' => $portraitNonHabitantRepo->findAll(),
        'appartements' => $appartements,
        'archivesMedia' => $archiveMediaRepo->findAll(),
        'appartementsAvecPhoto' => $appartementsAvecPhoto,
        'mediaAppartementsPapierPeint' => $mediaAppartementRepo->findBy(['Categorie' => Categorie::PAPIERPEINT]),
    ]);
}}







