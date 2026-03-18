<?php

namespace App\Controller\Admin;

use App\Entity\Appartement;
use App\Entity\ArchiveMedia;
use App\Entity\AteliersPlantes;
use App\Entity\Barrieres;
use App\Entity\BruitChantier;
use App\Entity\CultureDuMonde;
use App\Entity\CultureUrbaine;
use App\Entity\DescriptionDispositif;
use App\Entity\Dispositif;
use App\Entity\Echafaudages;
use App\Entity\EvenementCulture;
use App\Entity\EvenementPlantes;
use App\Entity\GastronomieDalle;
use App\Entity\MediaAppartement;
use App\Entity\MediaAtelier;
use App\Entity\MediaAutre;
use App\Entity\MediaBarrieres;
use App\Entity\MediaBruitChantier;
use App\Entity\MediaCulture;
use App\Entity\MediaDispositif;
use App\Entity\MediaEchafaudages;
use App\Entity\MediaEvenementCulture;
use App\Entity\MediaEvenementPlante;
use App\Entity\MediaGastronomie;
use App\Entity\MediaObjet;
use App\Entity\MediaObjetCulture;
use App\Entity\MediaPortrait;
use App\Entity\ObjetCulture;
use App\Entity\ObjetHabitant;
use App\Entity\PortraitHabitant;
use App\Entity\PortraitNonHabitant;
use App\Entity\SymboleCulture;
use App\Entity\TexteAteliers;
use App\Entity\TexteCulture;
use App\Entity\TexteEvenementCulture;
use App\Entity\TexteEvenementPlantes;
use App\Entity\TexteGastronomie;
use App\Entity\TextePortrait;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->redirectToRoute('admin_user_index'); 
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Atelier Dalle');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::section('Site');
        yield MenuItem::linkToUrl('Retour au site', 'fa fa-globe', '/');
        
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('User', 'fa fa-circle-user', User::class);

        yield MenuItem::linkToCrud('Media Autre', 'fa fa-photo-film', MediaAutre::class);

        yield MenuItem::linkToCrud('Photo Anciennes', 'fa fa-photo-film', ArchiveMedia::class);

        yield MenuItem::section('Portraits');
        yield MenuItem::linkToCrud('Portraits Habitant', 'fa fa-users', PortraitHabitant::class);
        yield MenuItem::linkToCrud('Portraits Non Habitant', 'fa fa-users', PortraitNonHabitant::class);
        yield MenuItem::linkToCrud('Media Portrait', 'fa fa-photo-film', MediaPortrait::class);
        yield MenuItem::linkToCrud('Textes Portrait', 'fa fa-align-justify', TextePortrait::class);
        yield MenuItem::linkToCrud('Objet Habitant', 'fa fa-cube', ObjetHabitant::class);
        yield MenuItem::linkToCrud('Media Objet Habitant', 'fa fa-photo-film', MediaObjet::class);

        yield MenuItem::section('Cultures');
        yield MenuItem::linkToCrud('Cultures du Monde', 'fa fa-earth-africa', CultureDuMonde::class);
        yield MenuItem::linkToCrud('Cultures Urbaine', 'fa fa-tree-city', CultureUrbaine::class);
        yield MenuItem::linkToCrud('Media Cultures', 'fa fa-photo-film', MediaCulture::class);
        yield MenuItem::linkToCrud('Textes Cultures', 'fa fa-align-justify', TexteCulture::class);
        yield MenuItem::linkToCrud('Objets Cultures', 'fa fa-cube', ObjetCulture::class);
        yield MenuItem::linkToCrud('Media Objets Cultures', 'fa fa-photo-film', MediaObjetCulture::class);
        yield MenuItem::linkToCrud('Symbole des Cultures', 'fa fa-om', SymboleCulture::class);

        yield MenuItem::section('Evenements');
        yield MenuItem::linkToCrud('Evenements Cultures', 'fa fa-calendar-days', EvenementCulture::class);
        yield MenuItem::linkToCrud('Media Evenements Culture', 'fa fa-photo-film', MediaEvenementCulture::class);
        yield MenuItem::linkToCrud('Textes Evenements Culture', 'fa fa-align-justify', TexteEvenementCulture::class);
        yield MenuItem::linkToCrud('Evenements Plantes', 'fa fa-calendar-days', EvenementPlantes::class);
        yield MenuItem::linkToCrud('Media Evenements Plantes', 'fa fa-photo-film', MediaEvenementPlante::class);
        yield MenuItem::linkToCrud('Textes Evenements Plantes', 'fa fa-align-justify', TexteEvenementPlantes::class);

        yield MenuItem::section('Gastronomies');
        yield MenuItem::linkToCrud('Gastronomies de la Dalle', 'fa fa-utensils', GastronomieDalle::class);
        yield MenuItem::linkToCrud('Media Gatronomies', 'fa fa-photo-film', MediaGastronomie::class);
        yield MenuItem::linkToCrud('Textes Gastronomies', 'fa fa-align-justify', TexteGastronomie::class);

        yield MenuItem::section('Chantier');
        yield MenuItem::linkToCrud('Echafaudages', 'fa fa-helmet-safety', Echafaudages::class);
        yield MenuItem::linkToCrud('Media Echafaudages', 'fa fa-photo-film', MediaEchafaudages::class); 
        yield MenuItem::linkToCrud('Barrieres', 'fa fa-road-barrier', Barrieres::class);
        yield MenuItem::linkToCrud('Media Barrieres', 'fa fa-photo-film', MediaBarrieres::class); 
        yield MenuItem::linkToCrud('Bruits de Chantier', 'fa fa-file-audio', BruitChantier::class);
        yield MenuItem::linkToCrud('Media Bruits de chantier', 'fa fa-photo-film', MediaBruitChantier::class); 

        yield MenuItem::section('Atelier');
        yield MenuItem::linkToCrud('Ateliers Plantes', 'fa fa-leaf', AteliersPlantes::class);
        yield MenuItem::linkToCrud('Textes Ateliers Plantes', 'fa fa-align-justify', TexteAteliers::class);
        yield MenuItem::linkToCrud('Media Ateliers', 'fa fa-photo-film', MediaAtelier::class); 

        yield MenuItem::section('Dispositifs');
        yield MenuItem::linkToCrud('Dispositifs', 'fa fa-toolbox', Dispositif::class);
        yield MenuItem::linkToCrud('Media Dispositifs', 'fa fa-photo-film', MediaDispositif::class);
        yield MenuItem::linkToCrud('Description Dispositif', 'fa fa-align-justify', DescriptionDispositif::class);

        yield MenuItem::section('Appartements');
        yield MenuItem::linkToCrud('Appartements', 'fa fa-building', Appartement::class);
        yield MenuItem::linkToCrud('Media Appartements', 'fa fa-photo-film', MediaAppartement::class);


       
    }


}
