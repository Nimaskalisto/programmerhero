<?php

namespace User\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class User {
    
    public $id;
    public $nick;
    public $password;
    public $name;
    public $surname;
    public $email;
    protected $inputFilter;

    public function exchangeArray($data){
        $this->id        = (!empty($data['id'])) ? $data['id'] : null;
        $this->nick      = (!empty($data['nick'])) ? $data['nick'] : null;
        $this->password  = (!empty($data['password'])) ? $data['password'] : null;
        $this->name      = (!empty($data['name'])) ? $data['name'] : null;
        $this->surname   = (!empty($data['surname'])) ? $data['surname'] : null;
        $this->email     = (!empty($data['email'])) ? $data['email'] : null;
    }
    
    public function getArrayCopy(){
        return get_object_vars($this);
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter){
        throw new \Exception("not used");
    }
    
    public function getInputFilter(){
        
        if(!$this->inputFilter){
            
            $inputFilter = new InputFilter();
            
            $inputFilter->add(array(
                'name'      => 'id',
                'required'  => true,
                'filters'   => array(
                    array('name' => 'Int'),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'nick',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding'  => 'UTF-8',
                            'min'       => 5,
                            'max'       => 50,
                        )
                    ),
                ),
            ));
                
            $inputFilter->add(array(
                'name'       => 'password',
                'required'   => true,
                'filters'    => array(
                    array('name' => 'StripTags'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding'  => 'UTF-8',
                            'min'       => 5,
                            'max'       => 33,
                        ),
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding'  => 'UTF-8',
                            'min'       => 5,
                            'max'       => 50,
                        )
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'surname',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding'  => 'UTF-8',
                            'min'       => 5,
                            'max'       => 50,
                        )
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'email',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding'  => 'UTF-8',
                            'min'       => 5,
                            'max'       => 50,
                        )
                    ),
                ),
            ));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
        
    }
}
