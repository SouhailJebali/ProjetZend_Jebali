<?php

namespace Bdd\Model;

 use Zend\Db\TableGateway\TableGateway;

 class BddTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getBdd($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveBdd(Bdd $bdd)
     {
         $data = array(
             'prenom' => $bdd->prenom,
             'nom'  => $bdd->nom,
         );

         $id = (int) $bdd->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getBdd($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Bdd id does not exist');
             }
         }
     }

     public function deleteBdd($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }