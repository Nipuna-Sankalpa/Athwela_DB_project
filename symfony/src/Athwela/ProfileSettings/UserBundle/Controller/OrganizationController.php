<?php

namespace Athwela\ProfileSettings\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Athwela\EntityBundle\Entity\Image;
use Athwela\ProfileSettings\UserBundle\Form\Type\ImageUpload;
use Athwela\DA\CustomQuery\CustomQuery;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CRUD\Update;

class OrganizationController extends Controller {

    public function settingsAction($id, Request $request) {


        $organization_name = Read::getInstance()->readSpecific('name', 'organization', 'ID', $id);
        $description = Read::getInstance()->readSpecific('description', 'organization', 'ID', $id);
        $phoneNu = Read::getInstance()->readMul('o_ID', $id, 'organization_mobile');
        $faxNu = Read::getInstance()->readMul('o_ID', $id, 'organization_fax');
        $street = Read::getInstance()->readSpecific('street', 'organization', 'ID', $id);
        $city = Read::getInstance()->readSpecific('city', 'organization', 'ID', $id);
        $country = Read::getInstance()->readSpecific('country', 'organization', 'ID', $id);

        $params = array('organization_name' => $organization_name, 'description' => $description, 'phoneNu' => $phoneNu, 'faxNu' => $faxNu, 'street' => $street, 'city' => $city, 'country' => $country);

        /*         * ** reset password *** */

        $form = $form = $this->container->get('fos_user.change_password.form');

        /*         * ***************** */

        $user = $this->container->get('security.context')->getToken()->getUser();
        $email = $user->getEmail();

        /*         * ******** img upload************** */

        $entity = new Image();
        $formImage = $this->CreateFormOrg($entity, $id);
        $formImage->handleRequest($request);

        $query = "SELECT image FROM organization WHERE email=" . "'" . $email . "'";
        $result = CustomQuery::getInstance()->customQuery($query);
        $image = null;
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $image = $row[0];
            }
        }

        if ($formImage->isValid()) {
            $entity->setUploadPath('uploads/organizations/' . $email);
            Update::getInstance()->update('organization', 'email', $email, array('image'), array($entity->getImagePath()));
            $entity->upload();

            return $this->redirect($this->generateUrl('organization_profile_settings', array('id' => $id)));
        }

        /*         * ********************** */


        return $this->container->get('templating')->renderResponse(
                        'AthwelaProfileSettingsUserBundle:Settings:SettingsOrganization.html.' . $this->container->getParameter('fos_user.template.engine'), array('form' => $form->createView(), 'id' => $id,
                    'request' => $params,
                    'formImage' => $formImage->createView(),
                    'proPic' => $image,
        ));
    }

    public function updatesAction($id) {
        $data = $this->getRequest()->request->all();

        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'name', $data['organization_name']);
        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'description', $data['description']);
        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'city', $data['city']);
        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'street', $data['street']);
        Update::getInstance()->updateSpecific('organization', 'ID', $id, 'country', $data['country']);
        Update::getInstance()->updateMobile('organization_mobile', $data['phoneNu'], 'o_ID', $id);
        Update::getInstance()->updateMobile('organization_fax', $data['phoneNu'], 'o_ID', $id);


        $user = $this->container->get('security.context')->getToken()->getUser();
        $email = $user->getEmail();

        return $this->redirect($this->generateUrl('org_profile_show', array('email' => $email)));
    }

    public function CreateFormOrg(Image $entity, $id) {
        $form = $this->createForm(new ImageUpload(), $entity, array('action' => $this->generateUrl('organization_profile_settings', array('id' => $id)), 'method' => 'POST'));
        $form->add('upImg', 'submit', array('label' => 'Upload'));
        return $form;
    }
}
