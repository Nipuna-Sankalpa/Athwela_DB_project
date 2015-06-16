<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Athwela\DA\CustomQuery\CustomQuery;
use Athwela\DA\CRUD\Create;
use Athwela\ProjectBundle\Form\ProfileType;
use Athwela\EntityBundle\Entity\Project;
use Symfony\Component\HttpFoundation\Request;

//use Athwela\EntityBundle\Entity\Image;
//use Athwela\ProfileSettings\UserBundle\Form\Type\ImageUpload;

/**
 * Description of Settings
 *
 * @author Flash
 */
class SettingsController extends Controller {

    public function createAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $entityProject = new Project();
        $formProject = $this->renderForm($entityProject);
        $formProject->handleRequest($request);

//        $entityImage = new Image();
//        $formImage = $this->CreateFormVol($entityImage, $id);
//        $formImage->handleRequest($request);
//
//        if ($formImage->isValid()) {
//            $entityImage->setUploadPath('uploads/Projects/' . $id);
//            Create::getInstance()->create(array(), 'project_img');
//            $entityImage->upload();
//            return $this->redirect($this->generateUrl('volunteer_profile_settings', array('id' => $id)));
//        }


        if ($formProject->isValid()) {

            $query = "INSERT INTO project (`type_ID`,`organization_ID`,`title`,`description`,`start_date`,`end_date`,`volunteers_needed`) VALUES ('" . $entityProject->getType() . "','" . $user->getId() . "','" . $entityProject->getTitle() . "','" . $entityProject->getDescription() . "','" . $entityProject->getStartDate()->format('Y-m-d H:i:s') . "','" . $entityProject->getEndDate()->format('Y-m-d H:i:s') . "','" . $entityProject->getVolunteersNeeded() . "')";
            CustomQuery::getInstance()->customQuery($query);
            $resultID = CustomQuery::getInstance()->customQuery("SELECT ID FROM project ORDER BY ID DESC LIMIT 1");

            if ($resultID) {
                while ($row = mysqli_fetch_row($resultID)) {
                    $id = $row[0];
                }
            }
            $skills = $entityProject->getSkill();
            foreach ($skills as $skill) {
                Create::getInstance()->create(array($id, $skill), 'project_skill');
            }

            return $this->redirect($this->generateUrl('show_project', array('ID' => $id)));
        }

        return $this->render('AthwelaProjectBundle:Project:EditProfile.html.twig', array(
                    'formProject' => $formProject->createView(),
                    'img' => null
        ));
    }

    private function getTypes() {
        $query = "SELECT ID,name FROM type";
        $result = CustomQuery::getInstance()->customQuery($query);
        $type = null;

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $type[$row[0]] = $row[1];
            }
        }
        return $type;
    }

    private function getSkill() {

        $query = "SELECT ID,name FROM skill";
        $result = CustomQuery::getInstance()->customQuery($query);
        $skill = null;

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $skill[$row[0]] = $row[1];
            }
        }
        return $skill;
    }

    private function renderForm($entity) {
        $form = $this->createForm(new ProfileType(), $entity, array(
            'action' => $this->generateUrl("Athwela_projectProfile_settings"),
            'method' => 'POST'
        ));
        $form->add('skill', 'choice', array(
                    'label' => 'Select skills required',
                    'choices' => $this->getSkill(),
                    'multiple' => TRUE,
                    'expanded' => TRUE,
                    'required' => TRUE,
                    'placeholder' => 'Select Skills'
                ))
                ->add('create', 'submit', array(
                    'label' => 'Create Project'
                ))
                ->add('volunteersNeeded', 'text', array(
                    'required' => TRUE,
                    'label' => 'Volunteer needed'
                ))
                ->add('type', 'choice', array(
                    'label' => 'Select type',
                    'choices' => $this->getTypes(),
                    'required' => TRUE,
        ));

        return $form;
    }

//    public function CreateFormVol(Image $entity, $id) {
//        $form = $this->createForm(new ImageUpload(), $entity, array('action' => $this->generateUrl('volunteer_profile_settings', array('id' => $id)), 'method' => 'POST'));
//        $form->add('upImg', 'submit', array('label' => 'Upload'));
//        return $form;
//    }
}
