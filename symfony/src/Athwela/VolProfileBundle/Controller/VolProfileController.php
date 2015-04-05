<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Athwela\VolProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Athwela\EntityBundle\Entity\Volunteer;

class VolProfileController extends Controller
{
    public function indexAction()
    {
        return $this->render('VolProfileBundle:VolProfile:index.html.twig');
    }
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AthwelaEntityBundle:Volunteer')->find($id);
//        $entitymobile = $em->getRepository('EntityBundle:VolunteerMobile')->findBy(array(
//            'id' => $id,            
//        ));
//        $entityEdu = $em->getRepository('ProfileBundle:VolunteerEducation')->findBy(array(
//            'id' => $id,            
//        ));
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Volunteer entity.');
        }

        return $this->render('VolProfileBundle:VolProfile:show.html.twig', array(
                    'entity' => $entity
                    //'entitymobile' => $entitymobile,
                    //'entityedu' => $entityEdu,
        ));
        //return $this->render('VolProfileBundle:VolProfile:show.html.twig');
    }
}
