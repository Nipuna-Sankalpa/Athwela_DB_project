<?php

namespace Athwela\AdministratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function AdminAction()
    {
        return $this->render('AthwelaAdministratorBundle:Administrator:Admin.html.twig');
    }
    public function MessagesAction()
    {
        return $this->render('AthwelaAdministratorBundle:Administrator:Messages.html.twig');
    }
    public function OrganizationAction()
    {
        return $this->render('AthwelaAdministratorBundle:Administrator:Organization.html.twig');
    }
    public function ProjectAction()
    {
        return $this->render('AthwelaAdministratorBundle:Administrator:Project.html.twig');
    }
    public function VolunteersAction()
    {
        return $this->render('AthwelaAdministratorBundle:Administrator:Volunteers.html.twig');
    }
    public function adminDashBoardAction()
    {
        return $this->render('AthwelaAdministratorBundle:Administrator:adminDashBoard.html.twig');
    }
    public function adminSettingsAction()
    {
        return $this->render('AthwelaAdministratorBundle:Administrator:adminSettings.html.twig');
    }
}
