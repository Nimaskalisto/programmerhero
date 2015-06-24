<?php

namespace Registration\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Registration\Form\RegistrationForm;
use Registration\Model\Registration;

class RegistrationController extends AbstractActionController{
    
    protected $registrationTable;
    
    public function indexAction(){
        
        $form = new RegistrationForm();
        $form->get('submit')->setValue('Add');
        $request = $this->getRequest();
        if($request->isPost()){
            
            $registration = new Registration();
            $form->setInputFilter($registration->getInputFilter());
            $form->setData($request->getPost());
            
            if($form->isValid()){
                
                $registration->exchangeArray($request->getPost());
                $this->getRegistrationTable()->saveKey($registration);
                
            }else{
                var_dump($form->getMessages());
            }
        }
        return array('form' => $form);
    }
    
    public function confirmAction(){
        
    }
    
    public function confirmationMail(Registration $registration){
        if(!empty($registration->confirmation_key)
            ){
            
        }
    }


    public function getRegistrationTable(){
        if(!$this->registrationTable){
            $sm = $this->getServiceLocator();
            $this->registrationTable = $sm->get('Registration\Model\RegistrationTable');
        }
        return $this->registrationTable;
    }
}
