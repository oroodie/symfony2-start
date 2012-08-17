<?php

namespace Ponca\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ponca\CmsBundle\Entity as Entity;
use Ponca\CmsBundle\Form as Form;

class UserController extends Controller
{
    public function addUserAction()
    {
        $user = new Entity\User();
        $form = $this->get('form.factory')->create(new Form\AddUserForm(), $user);
        $request = $this->getRequest();
        
        if ($request->getMethod() === 'POST')
        {
            $form->bindRequest($request);
            
            //$_POST data, see all post data: var_dump($request->request->all()); 
            $post_data = $request->request->get("cms_add_user"); //form name
            $group = $post_data['group'];
            //custom validation  
            if (!$this->valid_group($group)) $this->get('session')->setFlash('error','The group value is invalid!');
            
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                                
                $user->setDateAdded(new \DateTime());
                //salt
                $salt = md5( time().rand(99999999, 999999999999999999) );
                $user->setSalt($salt);
                $user->setIsActive(1);
                //password
                $user->setUserPassword();
                $em->persist($user);
                $em->flush();
                $this->get('session')->setFlash('notice', 'New user added successfully: '.$user->getFirstName().' '.$user->getLastName());
                
                return $this->redirect($this->generateUrl('cms_add_user'));
            }
        }
        
        return $this->render('PoncaCmsBundle:User:addUser.html.twig', 
                              array( 'form'=>$form->createView() ));
    }
    
    public function valid_group($groupId){
        
        // valid group check
        $em = $this->getDoctrine()->getEntityManager();
        
        $groups = $em->createQuery(' SELECT g.id FROM Ponca\CmsBundle\Entity\Groups g ')->getResult(); 
        if ($groups)
        foreach ($groups as $group){
            if ($group['id'] == $groupId) return true;
        }
        return false;
    }
    
}
