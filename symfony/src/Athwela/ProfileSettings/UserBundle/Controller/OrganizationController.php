<?php

namespace Athwela\ProfileSettings\UserBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class OrganizationController extends ContainerAware {

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

        return $this->container->get('templating')->renderResponse(
            'AthwelaProfileSettingsUserBundle:Settings:SettingsOrganization.html.'.$this->container->getParameter('fos_user.template.engine'),
            array('form' => $form->createView(),'id' => $id)
        );
   
    }

    public function updatesAction(Request $request, $id) {
        $params = $this->getRequest()->request->all();
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
        /*         * ***************************************************************************** */
        return $this->container->get('templating')->renderResponse(
                        'AthwelaProfileSettingsUserBundle:Settings:UpdatesOrganization.html.' . $this->container->getParameter('fos_user.template.engine'), array('form' => $form->createView(),
                    'id' => $id,
                    'request' => $params,)
        );
    }
    
    protected function getRedirectionUrl(UserInterface $user)
    {
        return $this->container->get('router')->generate('fos_user_profile_show');
    }

    /**
     * @param string $action
     * @param string $value
     */
    protected function setFlash($action, $value)
    {
        $this->container->get('session')->getFlashBag()->set($action, $value);
    }

}
