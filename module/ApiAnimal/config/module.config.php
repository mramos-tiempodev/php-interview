<?php
return array(
    'router' => array(
        'routes' => array(
            'api' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/api/animal[/id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'ApiAnimal\Controller\Animalrest',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'ApiAnimal\Controller\Animalrest' => 'ApiAnimal\Controller\AnimalrestControllerFactory',
        ),
    ),
);