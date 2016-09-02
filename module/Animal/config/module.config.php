<?php
return array(
    'router' => array(
        'routes' => array(
            'Animal' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/Animal',
                    'defaults' => array(
                        'controller' => 'Animal\Controller\Animalclient',
                        'action' => 'index'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'Animalclient' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route' => '/Animalclient[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Animal\Controller\Animalclient' => 'Animal\Controller\AnimalclientController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'animal/animalclient/index'   => __DIR__ . '/../view/animal/index/index.phtml',
            'animal/animalclient/insert'   => __DIR__ . '/../view/animal/index/index.phtml',
            'animal/animalclient/create'   => __DIR__ . '/../view/animal/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    ,
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),
    'service_manager' => array(
        'invokables' => array(
//            'Zend\Hydrator\ClassMethods' => 'Zend\Hydrator\ClassMethods',
//            'Wall\Service\tiempo' => 'Wall\Service\tiempo'
        ),
        'factories' => array(
            'Animal' => 'Animal\Model\AnimalFactory'
        ),
    ),
);