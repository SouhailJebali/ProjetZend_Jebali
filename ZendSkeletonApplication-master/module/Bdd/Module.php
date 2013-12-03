<?php

namespace Bdd;

 // Add these import statements:
 use Bdd\Model\Bdd;
 use Bdd\Model\BddTable;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;
 
 class Module
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }
 
 
  //namespace Bdd;



     // getAutoloaderConfig() and getConfig() methods here

     // Add this method:
     public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Bdd\Model\BddTable' =>  function($sm) {
                     $tableGateway = $sm->get('BddTableGateway');
                     $table = new BddTable($tableGateway);
                     return $table;
                 },
                 'BddTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Bdd());
                     return new TableGateway('bdd', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }

