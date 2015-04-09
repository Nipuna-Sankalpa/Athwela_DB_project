<?php

namespace Athwela\ProfileSettings\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use Athwela\DA\DBConnection;
use Athwela\DA\CRUD\Read;
use Athwela\EntityBundle\Entity\Volunteer;

class VolunteerController extends Controller {

    public function settingsAction($id) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->container->get('fos_user.change_password.form');
        $formHandler = $this->container->get('fos_user.change_password.form.handler');

        $process = $formHandler->process($user);
        if ($process) {
            $this->setFlash('fos_user_success', 'change_password.flash.success');

            return new RedirectResponse($this->getRedirectionUrl($user));
        }
        
        //$conn = DBConnection::getInstance()->getConnection();
        $entity = $this->createVolunteerEditForm($user->getEmail());
        //$entitymobile = Read::getInstance()->readMul($conn, 'v_ID', $entity->getId(), 'volunteer_mobile');
        
        if(!$entity){
            return $this->container->get('templating')->renderResponse('AthwelaProfileSettingsUserBundle:Settings:SettingsVolunteer.html.' . $this->container->getParameter('fos_user.template.engine'), array('form' => $form->createView(), 'id' => $id));
        }else{
        return $this->container->get('templating')->renderResponse(
            'AthwelaProfileSettingsUserBundle:Settings:SettingsVolunteer.html.' . $this->container->getParameter('fos_user.template.engine'), array(
            'form' => $form->createView(), 'id' => $id, 'entity' => $entity));
        }
    }

    public function updatesAction(Request $request, $id) {
        $params = $this->getRequest()->request->all();
        $skills = array(".Net","Java","C","PHP","Perl","Ruby","Python","Javascript");

        /*         * **************************** dont edit/delete ************************************************* */
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->container->get('fos_user.change_password.form');
        $formHandler = $this->container->get('fos_user.change_password.form.handler');

        $process = $formHandler->process($user);
        if ($process) {
            $this->setFlash('fos_user_success', 'change_password.flash.success');

            return new RedirectResponse($this->getRedirectionUrl($user));
        }
        /*         * **************************** ************************************************* */
        return $this->container->get('templating')->renderResponse(
                        'AthwelaProfileSettingsUserBundle:Settings:UpdatesVolunteer.html.' . $this->container->getParameter('fos_user.template.engine'), array('form' => $form->createView(),
                    'id' => $id,
                    'request' => $params,
                    'skills' => $skills)
        );
    }

    protected function getRedirectionUrl(UserInterface $user) {
        return $this->container->get('router')->generate('fos_user_profile_show');
    }

    /**
     * @param string $action
     * @param string $value
     */
    protected function setFlash($action, $value) {
        $this->container->get('session')->getFlashBag()->set($action, $value);
    }
    
    private function createVolunteerEditForm($email){        
        $conn = DBConnection::getInstance()->getConnection();
        $entity = Read::getInstance()->read($conn, new Volunteer(), 'volunteer', 'email', $email);
        return $entity;
    }


}
