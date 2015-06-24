<?php

namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form{
    
    public function __construct($name = null) {
        parent::__construct('user');
        $this->add(array(
            'name' => 'id',
            'type' => 'hidden'
        ));
        $this->add(array(
            'name'    => 'nick',
            'type'    => 'Text',
            'options' => array(
                'label' => 'Nickname:'
            )
        ));
        $this->add(array(
            'name'    => 'name',
            'type'    => 'Text',
            'options' => array(
                'label' => 'Name:'
            )
        ));
        $this->add(array(
            'name'    => 'password',
            'type'    => 'Text',
            'options' => array(
                'label' => 'Password'
            ),
        ));
        $this->add(array(
            'name'    => 'surname',
            'type'    => 'Text',
            'options' => array(
                'label' => 'Surname:'
            )
        ));
        $this->add(array(
            'name'    => 'email',
            'type'    => 'Text',
            'options' => array(
                'label' => 'Email:'
            )
        ));
        $this->add(array(
            'name'       => 'submit',
            'type'       => 'Submit',
            'attributes' => array(
                'value' => 'Add',
                'id'    => 'submitbutton'
            )
        ));
    }
    
}