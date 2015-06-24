<?php

namespace Access\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Access {
    
    public $nick; 
    public $password; 
    protected $inputFilter;

    public function exchangeArray($data){
        $this->nick = (!empty($data['nick'])) ? $data['nick'] : null;
        $this->password = (!empty($data['password'])) ? $data['password'] : null; 
    }
    
    public function getArrayCopy(){
        return get_object_vars($this);
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter){
        throw new \Exception('Not used');
    }
    
    public function getInputFilter(){
        if(!$this->inputFilter){
            
            $inputFilter = new InputFilter();
            
            $inputFilter->add(array(
                'name'      => 'nick',
                'required'  => true,
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding'  => 'UTF-8',
                            'min'       => 5,
                            'max'       => 33,
                        )
                    )
                )
            ));
            
            $inputFilter->add(array(
                'name'      => 'password',
                'required'  => true,
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding'  => 'UTF-8',
                            'min'       => 5,
                            'max'       => 33,
                        )
                    )
                )
            ));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
}
