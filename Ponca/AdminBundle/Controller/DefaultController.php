<?php

namespace Ponca\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('PoncaAdminBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        
        //$x = new SecurityContext(); 
       //var_dump(SecurityContext::LAST_REMEMBER_ME);
        

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
            $this->container->get('session')->migrate($destroy = false, $lifetime = 0);
        }
        
       // $user = $this->container->get('security.context'); 
       // var_dump(@$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY'));        
        //if ($this->get('security.context')->isGranted('ROLE_ADMIN')){}

        return $this->render('PoncaAdminBundle:Security:login.html.php', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }
}
