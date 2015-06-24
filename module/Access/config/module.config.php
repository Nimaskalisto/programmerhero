<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Access\Controller\Access' => 'Access\Controller\AccessController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'access' => array(
                'type' => 'segment',
                'options' => array(
                    'route'       => '/access[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]'
                    ),
                    'defaults' => array(
                        'controller' => 'Access\Controller\Access',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'access' => __DIR__ . '/../view',
        ),
    ),    
);