<?php

namespace Registration\Form;

use Zend\Form\Form;

class RegistrationForm extends Form{
    
    public function __construct($name = null) {
        parent::__construct('registration');
        $this->add(array(
            'name' => 'nick',
            'type' => 'text',
            'options' => array(
                'label' => 'Nickname:'
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'text',
            'options' => array(
                'label' => 'Password:'
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'text',
            'options' => array(
                'label' => 'Email address:'
            ),
        ));
        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'First name:'
            ),
        ));
        $this->add(array(
            'name' => 'surname',
            'type' => 'text', 
            'options' => array(
                'label' => 'Surname:'
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit_registration'
            ),
        ));
    }
    
}



