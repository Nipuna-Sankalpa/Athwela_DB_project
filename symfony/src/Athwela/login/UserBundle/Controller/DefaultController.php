<?php

namespace Athwela\login\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Athwela\DA\CRUD\Read;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\DA\DBConnection;

class DefaultController extends Controller {

    public function indexAction() {
//      $conn=DBConnection::getInstance()->openConnection($host, $username, $password, $database);
        $conn = DBConnection::getInstance()->getConnection();

//first parameter=>connection variable to database connection
//second parameter=>values what you need to insert(example given below is for insert new row to admin table)data type need to be array and the sequence must be protected
//table name       
//        Create::getInstance()->create($conn, array('ID value', 'firstname value', 'lastname value', 'street value', 'city value', 'country value', 'email value'), 'admin');


        $admin = Read::getInstance()->read($conn, new Volunteer(), 'volunteer', 'ID', 1);
        echo $admin->getDob();

        return $this->render('AthwelaloginUserBundle:Default:index.html.twig');
    }

}
