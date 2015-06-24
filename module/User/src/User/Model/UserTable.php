<?php

namespace User\Model;

use Zend\Db\TableGateway\TableGateway;

class UserTable {
    
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll(){
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    
    public function checkUser($user){
        $rowset = $this->tableGateway->select(array('nick' => $user['nick'], 'password' => $user['password']));
        $row = $rowset->current();
        if(!$row){
            throw new \Exception("Wrong nickname or/and password");
        }
        return $row;
    }
    
    public function getUser($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if(!$row){
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function saveUser(User $user){
        $data = array(
            'nick'      => $user->nick,
            'password'  => $user->password,
            'name'      => $user->name,
            'surname'   => $user->surname,
            'email'     => $user->email
        );
        $id = (int) $user->id;
        if($id == 0){
            $this->tableGateway->insert($data);
        }else{
            if($this->getUser($id)){
                $this->tableGateway->update($data, array('id' => $id));
            }else{
                throw new \Exception('User id not exist');
            }
        }
    }
    
    public function deleteUser($id){
        $this->tableGateway->delete(array('id' => (int) $id));
    }
    
}