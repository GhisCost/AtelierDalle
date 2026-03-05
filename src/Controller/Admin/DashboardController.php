<?php

namespace App\Controller\Admin;

use App\Controller\Admin\UsersCrudController;
use App\Entity\CultureDuMonde;
use App\Entity\CultureUrbaine;
use App\Entity\EvenementCulture;
use App\Entity\GastronomieDalle;
use App\Entity\MediaEvenementCulture;
use App\Entity\MediaGastronomie;
use App\Entity\MediaPortrait;
use App\Entity\PortraitHabitant;
use App\Entity\PortraitNonHabitant;
use App\Entity\TexteGastronomie;
use App\Entity\TextePortrait;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        // return parent::index();

        // 1.2) Same example but using the "ugly URLs" that were used in previous EasyAdmin versions:
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(UsersCrudController::class)->generateUrl());
        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }
        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
        
        return $this->redirectToRoute('admin_users_index'); 
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Atelier Dalle');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fa fa-list', Users::class);

        yield MenuItem::section('Portrait');
        yield MenuItem::linkToCrud('Portrait Habitant', 'fa fa-list', PortraitHabitant::class);
        yield MenuItem::linkToCrud('Portrait Non Habitant', 'fa fa-list', PortraitNonHabitant::class);
        yield MenuItem::linkToCrud('Media Portrait', 'fa fa-photo-film', MediaPortrait::class);
        yield MenuItem::linkToCrud('Texte Portrait', 'fa fa-align-justify', TextePortrait::class);

        yield MenuItem::section('Culture');
        yield MenuItem::linkToCrud('Culture du Monde', 'fa fa-list', CultureDuMonde::class);
        yield MenuItem::linkToCrud('Culture Urbaine', 'fa fa-list', CultureUrbaine::class);

        yield MenuItem::section('Evenement');
        yield MenuItem::linkToCrud('Evenement Culture', 'fa fa-list', EvenementCulture::class);
        yield MenuItem::linkToCrud('Media Evenement Culture', 'fa fa-photo-film', MediaEvenementCulture::class);
        
        yield MenuItem::section('Gastronomie');
        yield MenuItem::linkToCrud('Gastronomie de la Dalle', 'fa fa-list', GastronomieDalle::class);
        yield MenuItem::linkToCrud('Media Gatronomie', 'fa fa-photo-film', MediaGastronomie::class);
        yield MenuItem::linkToCrud('Texte Gastronomie', 'fa fa-align-justify', TexteGastronomie::class);

        
        yield MenuItem::section('Site');
        yield MenuItem::linkToUrl('Retour au site', 'fa fa-globe', '/');
    }


}
