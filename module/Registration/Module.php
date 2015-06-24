<?php

namespace Registration;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Registration\Model\Registration;
use Registration\Model\RegistrationTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface{
    
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/'. __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getConfig() {
        return include __DIR__. '/config/module.config.php';
    }
    
    public function getServiceConfig(){
        return array(
            'factories' => array(
                'Registration\Model\RegistrationTable' => function($sm){
                    $tableGateway = $sm->get('RegistrationTableGateway');
                    $table = new RegistrationTable($tableGateway);
                    return $table;
                },
                'RegistrationTableGateway' => function($sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Registration());
                    return new TableGateway('registration', $dbAdapter, null, $resultSetPrototype);
                }
            )
        );
    }
    
}
