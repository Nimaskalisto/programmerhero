<?php

namespace Registration\Model;

use Zend\Db\TableGateway\TableGateway;

class RegistrationTable{
    
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }    
    
    public function saveKey(Registration $registration){
        if(!empty($registration)){
            $data = array(
                'id' => $registration->id,
                'confirmation_key' => $registration->confirmation_key
            );
            $this->tableGateway->insert($data);
        }
    }
    
    
    
}

