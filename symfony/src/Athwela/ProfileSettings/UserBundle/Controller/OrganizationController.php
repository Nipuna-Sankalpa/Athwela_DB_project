<?php

namespace Athwela\ProfileSettings\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CRUD\Update;

class OrganizationController extends Controller {

    public function settingsAction($id) {
        
        
        $organization_name = Read::getInstance()->readSpecific('name','organization','ID', $id);
        $description = Read::getInstance()->readSpecific('description','organization','ID', $id);
        $phoneNu = Read::getInstance()->readMul('o_ID',$id,'organization_mobile');
        $faxNu = Read::getInstance()->readMul('o_ID',$id,'organization_fax');
        $street = Read::getInstance()->readSpecific('street','organization','ID', $id);
        $city = Read::getInstance()->readSpecific('city','organization','ID', $id);
        $country = Read::getInstance()->readSpecific('country','organization','ID', $id);
        
        $params = array('organization_name'=>$organization_name , 'description' => $description , 'phoneNu' => $phoneNu , 'faxNu' => $faxNu , 'street' => $street , 'city' => $city , 'country' => $country);
        
        
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
            array('form' => $form->createView(),'id' => $id, 'request' =>$params)
        );
   
    }

    public function updatesAction(Request $request, $id) {
        $data = $this->getRequest()->request->all();
        
        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'name', $data['organization_name']);
        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'description', $data['description']);
        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'city', $data['city']);
        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'street', $data['street']);
        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'country', $data['country']);
        Update::getInstance()->updateMobile('organization_mobile',$data['phoneNu'],'o_ID',$id);
        Update::getInstance()->updateMobile('organization_fax',$data['phoneNu'],'o_ID',$id);
        
        
        $organization_name = Read::getInstance()->readSpecific('name','organization','ID', $id);
        $description = Read::getInstance()->readSpecific('description','organization','ID', $id);
        $phoneNu = Read::getInstance()->readMul('o_ID',$id,'organization_mobile');
        $faxNu = Read::getInstance()->readMul('o_ID',$id,'organization_fax');
        $street = Read::getInstance()->readSpecific('street','organization','ID', $id);
        $city = Read::getInstance()->readSpecific('city','organization','ID', $id);
        $country = Read::getInstance()->readSpecific('country','organization','ID', $id);
        
        $params = array('organization_name'=>$organization_name , 'description' => $description , 'phoneNu' => $phoneNu , 'faxNu' => $faxNu , 'street' => $street , 'city' => $city , 'country' => $country);
        
        
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
                    'request' => $params)
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
