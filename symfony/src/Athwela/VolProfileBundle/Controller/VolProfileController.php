<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Athwela\VolProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VolProfileController extends Controller
{
    public function indexAction()
    {
        return $this->render('VolProfileBundle:VolProfile:index.html.twig');
    }
}
