<?php

namespace Registration\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Crypt\Password\Bcrypt;

class Registration{
    
    public $id;
    public $email;
    public $confirmation_key;    
    protected $inputFilter;
    
    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;        
        if(!empty($data['nick'])
            && !empty($data['password'])
            && !empty($data['email'])
            && !empty($data['name'])
            && !empty($data['surname'])
                ){
            $bcrypt = new Bcrypt();
            $ckey = $data['nick'].'_'.$data['password'].'_'.$data['email'].'_'.$data['name'].'_'.$data['surname'];
            $this->confirmation_key = $bcrypt->create($ckey);       
        }else{ 
            $this->confirmation_key = null;
        }
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter){
        throw new \Exception("not used");
    }
    
    public function getInputFilter(){
        
        if(!$this->inputFilter){
            
            $inputFilter = new InputFilter();
            
            $inputFilter->add(array(
                'name'      => 'nick',
                'required'  => true
            ));
            $inputFilter->add(array(
                'name'      => 'password',
                'required'  => true
            ));            
            $inputFilter->add(array(
                'name'      => 'email',
                'required'  => true
            ));
            $inputFilter->add(array(
                'name'      => 'name',
                'required'  => true
            ));
            $inputFilter->add(array(
                'name'      => 'surname',
                'required'  => true
            ));
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}
