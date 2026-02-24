<?php

namespace App\Controller\Admin;

use App\Controller\Admin\UsersCrudController;
use App\Entity\MediaPortrait;
use App\Entity\PortraitHabitant;
use App\Entity\TextePortrait;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
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
        yield MenuItem::linkToCrud('Users', 'fas fa-list', Users::class);
        yield MenuItem::linkToCrud('Portrait Habitant', 'fas fa-list', PortraitHabitant::class);
        yield MenuItem::linkToCrud('Media Portrait', 'fas fa-list', MediaPortrait::class);
        yield MenuItem::linkToCrud('Texte Portrait', 'fas fa-list', TextePortrait::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
