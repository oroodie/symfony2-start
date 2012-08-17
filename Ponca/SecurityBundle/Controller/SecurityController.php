<?php

namespace Ponca\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use JMS\SecurityExtraBundle\Annotation\Secure;


/**
 * @Secure(roles="ROLE_ADMIN")
 */
class SecurityController extends Controller
{

    public function loginAction()
    {
        $request = $this->getRequest(); //var_dump($request);
        $session = $request->getSession();
        
        //get login error
        if($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR))
        {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } 
        else 
        {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        
        return $this->render('PoncaSecurityBundle:Security:login.html.twig',  array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
                    ));
        
    }
}
