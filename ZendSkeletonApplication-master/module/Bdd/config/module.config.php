<?php

 return array(
     'controllers' => array(
         'invokables' => array(
             'Bdd\Controller\Bdd' => 'Bdd\Controller\BddController',
         ),
     ),
	 
	     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'bdd' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/bdd[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Bdd\Controller\Bdd',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

	 
     'view_manager' => array(
         'template_path_stack' => array(
             'bdd' => __DIR__ . '/../view',
         ),
     ),
 );

