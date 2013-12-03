<?php

 namespace Bdd\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Bdd\Model\Bdd;
 use Bdd\Form\BddForm;

 class BddController extends AbstractActionController
 {
	protected $bddTable;
       public function indexAction()
     {
         return new ViewModel(array(
             'bdds' => $this->getBddTable()->fetchAll(),
         ));
     }

     public function addAction()
     {
		$form = new BddForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
         if ($request->isPost()) {
             $bdd = new Bdd();
             $form->setInputFilter($bdd->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $bdd->exchangeArray($form->getData());
                 $this->getBddTable()->saveBdd($bdd);

                 // Redirect to list of bdds
                 return $this->redirect()->toRoute('bdd');
             }
         }
         return array('form' => $form);
     }

     public function editAction()
     {
		$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('bdd', array(
                 'action' => 'add'
             ));
         }

         // Get the Bdd with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $bdd = $this->getBddTable()->getBdd($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('bdd', array(
                 'action' => 'index'
             ));
         }

         $form  = new BddForm();
         $form->bind($bdd);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($bdd->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getBddTable()->saveBdd($bdd);

                 // Redirect to list of bdds
                 return $this->redirect()->toRoute('bdd');
             }
         }

         return array(
             'id' => $id,
             'form' => $form,
         );
     }

     public function deleteAction()
     {
		$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('bdd');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getBddTable()->deleteBdd($id);
             }

             // Redirect to list of bdds
             return $this->redirect()->toRoute('bdd');
         }

         return array(
             'id'    => $id,
             'bdd' => $this->getBddTable()->getBdd($id)
         );
     }
	 
	 // module/Bdd/src/Bdd/Controller/BddController.php:
     public function getBddTable()
     {
         if (!$this->bddTable) {
             $sm = $this->getServiceLocator();
             $this->bddTable = $sm->get('Bdd\Model\BddTable');
         }
         return $this->bddTable;
     }
 }