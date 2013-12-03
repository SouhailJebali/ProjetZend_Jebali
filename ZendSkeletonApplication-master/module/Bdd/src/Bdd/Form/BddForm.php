<?php
namespace Bdd\Form;
use Zend\Form\Form;

 class BddForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('bdd');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'prenom',
             'type' => 'Text',
             'options' => array(
                 'label' => 'prenom',
             ),
         ));
         $this->add(array(
             'name' => 'nom',
             'type' => 'Text',
             'options' => array(
                 'label' => 'nom',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }
 
 ?>