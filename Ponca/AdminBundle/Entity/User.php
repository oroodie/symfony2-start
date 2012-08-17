<?php

namespace Ponca\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
//use Ponca\AdminBundle\Entity\Role;


/**
 * Ponca\AdminBundle\Entity\User
 */
class User implements AdvancedUserInterface
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $salt
     */
    private $salt;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var boolean $isActive
     */
    private $isActive;

    private $role;

    public function __construct()
    {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true)); 
    }
    
     /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    { 
        $this->role= $role;
    }
    
    public function getRoles()
    { 
        return array($this->role);
    }
    /*
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    */
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
        
    public function eraseCredentials()
    {
        
    }

    
    public function equals(UserInterface $user)
    {
        return ($this->username === $user->getUsername() OR $this->email === $user->getUsername() );
    }
    
    #AdvancedUserInterface
    
    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }
/*
    public function equals(UserInterface $user) {
        
    }*/
}