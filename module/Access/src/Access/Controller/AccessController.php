<?php

namespace Access\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Model\User;
use User\Form\UserForm;
use Access\Model\Access;
use Access\Form\LoginForm;

class AccessController extends AbstractActionController{
    
    protected $userTable;

    public function indexAction(){
        return array();
    }
    
    public function loginAction(){

        $form = new LoginForm();
        $form->get('submit')->setValue('Login');
        $request = $this->getRequest();
        
        if($request->isPost()){
            
            $access = new Access();
            $form->setInputFilter($access->getInputFilter());
            $form->setData($request->getPost());
            
            if($form->isValid()){
                
                return array(
                    'message' => 'Successful logged in',
                    'form' => $form
                );
                
            }else{
                
                return array('message' => 'Not logged in');
                
            }
            
        }
        
        return array('form' => $form);
    }
    
    public function logoutAction(){
        
    }
    
    public function getUserTable(){
        if(!$this->userTable){
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('User\Model\UserTable');
        }
        return $this->userTable;
    }    
    
}
