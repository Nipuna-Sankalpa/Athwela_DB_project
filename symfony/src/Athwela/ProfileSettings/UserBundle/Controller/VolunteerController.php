<?php

namespace Athwela\ProfileSettings\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

use Athwela\DA\CRUD\Read;
use Athwela\DA\CRUD\Update;
use Athwela\EntityBundle\Entity\Volunteer;

class VolunteerController extends Controller {

    public function settingsAction($id) {

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

        /*         * *************************** dont edit/delete *************************************** */

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
                        'AthwelaProfileSettingsUserBundle:Settings:SettingsVolunteer.html.' . $this->container->getParameter('fos_user.template.engine'), array('form' => $form->createView(),
                    'id' => $id,
                    'request' => $params)
        );
    }

    public function updatesAction(Request $request, $id) {

        $data = $this->getRequest()->request->all();
        if (array_key_exists('file', $data)) {
            $default = "C:\\wamp\\www\\Athwela_DB_project\\symfony\\web\\img\\";
            $image = file_get_contents($default . $data['file']);
            $image = mysql_real_escape_string($image);
            Update::getInstance()->updateSpecific('volunteer', 'ID', $id, 'image', $image);
        }
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
                    'request' => $params)
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

    private function createVolunteerEditForm($email) {

        $entity = Read::getInstance()->read(new Volunteer(), 'volunteer', 'email', $email);
        return $entity;
    }

}
