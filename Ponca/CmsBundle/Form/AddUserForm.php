<?php

namespace Ponca\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AddUserForm extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('last_name')
            ->add('first_name')
            ->add('username')
            ->add('email')
            ->add('password', 'repeated', array('first_name' => '*Password',
                                                'second_name' => '*Confirm',
                                                'type' => 'password'))
            ->add('group')
        ;
    }

    public function getName()
    {
        return 'cms_add_user';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Ponca\CmsBundle\Entity\User'
        );
    }
}
