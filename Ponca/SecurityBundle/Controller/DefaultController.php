<?php

namespace Ponca\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('PoncaSecurityBundle:Default:index.html.twig', array('name' => $name));
    }
}
