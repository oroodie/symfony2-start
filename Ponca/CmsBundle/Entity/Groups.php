<?php

namespace Ponca\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ponca\CmsBundle\Entity\Groups
 *
 * @ORM\Table(name="cms_groups")
 * @ORM\Entity
 */
class Groups
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="Ponca\CmsBundle\Entity\User", mappedBy="group")
     */
    protected $members;

    public function __construct()
    {
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() 
    {
        return $this->name;
    }

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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add members
     *
     * @param Ponca\CmsBundle\Entity\User $members
     */
    public function addUser(\Ponca\CmsBundle\Entity\User $members)
    {
        $this->members[] = $members;
    }

    /**
     * Get members
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }
}