<?php

namespace Athwela\ProfileSettings\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CRUD\Update;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\EntityBundle\Entity\Image;
use Athwela\ProfileSettings\UserBundle\Form\Type\ImageUpload;
use Athwela\DA\CustomQuery\CustomQuery;


class VolunteerController extends Controller {

    public function settingsAction($id, Request $request) {

        /*         * ***************************************** assign values from database ********************************* */


        $skills = Read::getInstance()->readAllSkills(); // all skills
        $first_name = Read::getInstance()->readSpecific('first_name', 'volunteer', 'ID', $id);
        $last_name = Read::getInstance()->readSpecific('last_name', 'volunteer', 'ID', $id);
        $birthday = Read::getInstance()->readSpecific('dob', 'volunteer', 'ID', $id);
        $gender = Read::getInstance()->readSpecific('gender', 'volunteer', 'ID', $id);
        $street = Read::getInstance()->readSpecific('street', 'volunteer', 'ID', $id);
        $city = Read::getInstance()->readSpecific('city', 'volunteer', 'ID', $id);
        $country = Read::getInstance()->readSpecific('country', 'volunteer', 'ID', $id);
        $i_ID = Read::getInstance()->readSpecific('i_ID', 'volunteer_education', 'v_ID', $id);
        $institute = Read::getInstance()->readSpecific('name', 'institute', 'ID', $i_ID);
        $start_date = Read::getInstance()->readSpecific('start_date', 'volunteer_education', 'v_ID', $id);
        $end_date = Read::getInstance()->readSpecific('end_date', 'volunteer_education', 'v_ID', $id);
        $degree = Read::getInstance()->readSpecific('degree', 'volunteer_education', 'v_ID', $id);
        $programs = Read::getInstance()->readSkills($id);   // selected skills
        $phoneNu = Read::getInstance()->readMul('v_ID', $id, 'volunteer_mobile');


        $params = array('first_name' => $first_name, 'last_name' => $last_name, 'birthday' => $birthday, 'phoneNu' => $phoneNu, 'gender' => $gender, 'street' => $street, 'city' => $city, 'country' => $country, 'institute' => $institute, 'start_date' => $start_date, 'end_date' => $end_date, 'degree' => $degree, 'programs' => $programs, 'skills' => $skills);

        $user = $this->container->get('security.context')->getToken()->getUser();
        $email = $user->getEmail();

        /** Image Uploader ***/
        
        $entity = new Image();
        $formImage = $this->CreateFormVol($entity, $id);
        $formImage->handleRequest($request);

        $query = "SELECT image FROM volunteer WHERE email=" . "'" . $email . "'";
        $result = CustomQuery::getInstance()->customQuery($query);
        $image = null;
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $image = $row[0];
            }
        }

        if ($formImage->isValid()) {
            $entity->setUploadPath('uploads/volunteers/' . $email);
            Update::getInstance()->update('volunteer', 'email', $email, array('image'), array($entity->getImagePath()));
            $entity->upload();
            return $this->redirect($this->generateUrl('volunteer_profile_settings', array('id' => $id)));
        }

        /*         * ************************** */

        /*         * ****** change password ********** */

        $form = $this->container->get('fos_user.change_password.form');


        /*         * **************** */

        return $this->container->get('templating')->renderResponse(
                    'AthwelaProfileSettingsUserBundle:Settings:SettingsVolunteer.html.' . $this->container->getParameter('fos_user.template.engine'), array('form' => $form->createView(),
                    'id' => $id,
                    'formImage' => $formImage->createView(),
                    'proPic' => $image,
                    'request' => $params)
        );
    }

    public function updatesAction($id) {

        $data = $this->getRequest()->request->all();


        if (array_key_exists('first_name', $data)) {
            Update::getInstance()->updateSpecific('volunteer', 'ID', $id, 'first_name', $data['first_name']);
            Update::getInstance()->updateSpecific('volunteer', 'ID', $id, 'last_name', $data['last_name']);
            Update::getInstance()->updateSpecific('volunteer', 'ID', $id, 'dob', $data['birthday']);
            Update::getInstance()->updateSpecific('volunteer', 'ID', $id, 'gender', $data['gender']);
            Update::getInstance()->updateSpecific('volunteer', 'ID', $id, 'street', $data['street']);
            Update::getInstance()->updateSpecific('volunteer', 'ID', $id, 'city', $data['city']);
            Update::getInstance()->updateSpecific('volunteer', 'ID', $id, 'country', $data['country']);
            $i_ID = Read::getInstance()->readSpecific('ID', 'institute', 'name', $data['institute']);
            Update::getInstance()->updateSpecific('volunteer_education', 'v_ID', $id, 'i_ID', $i_ID);
            Update::getInstance()->updateSpecific('volunteer_education', 'v_ID', $id, 'start_date', $data['start_date']);
            Update::getInstance()->updateSpecific('volunteer_education', 'v_ID', $id, 'end_date', $data['end_date']);
            Update::getInstance()->updateSpecific('volunteer_education', 'v_ID', $id, 'degree', $data['degree']);
            Update::getInstance()->updateSkills($data['programs'], $id);
            Update::getInstance()->updateMobile('volunteer_mobile', $data['phoneNu'], 'v_ID', $id);
        }

        $user = $this->container->get('security.context')->getToken()->getUser();
        $email = $user->getEmail();

        return $this->redirect($this->generateUrl('vol_profile_show',array('email'=>$email)));

        
    }

    public function CreateFormVol(Image $entity, $id) {
        $form = $this->createForm(new ImageUpload(), $entity, array('action' => $this->generateUrl('volunteer_profile_settings', array('id' => $id)), 'method' => 'POST'));
        $form->add('upImg', 'submit', array('label' => 'Upload'));
        return $form;
    }

}
