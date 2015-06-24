<?php

namespace Access\Form;

use Zend\Form\Form;

class LoginForm extends Form{
    
    public function __construct($name = null) {
        parent::__construct('login');
        
        $this->add(array(
            'name'    => 'nick',
            'type'    => 'Text',
            'options' => array(
                'label' => 'Your nickname:'
            ),
        ));
        
        $this->add(array(
            'name'    => 'password',
            'type'    => 'Text',
            'options' => array(
                'label' => 'Your password:'
            ),
        ));
           
        $this->add(array(
            'name'       => 'submit',
            'type'       => 'submit',
            'attributes' => array(
                'value' => 'Login',
                'id'    => 'submitlogin',
            ),
        ));
        
    }
    
}