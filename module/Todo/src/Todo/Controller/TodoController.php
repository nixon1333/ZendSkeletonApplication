<?php

namespace Todo\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;

 class TodoController extends AbstractActionController
 {
     
     protected $todoTable;
     
     public function indexAction()
     {
         return new ViewModel(array(
             'todo' => $this->getTodoTable()->fetchAll()
         ));
     }

     public function addAction()
     {
     }

     public function editAction()
     {
                  return new ViewModel(array('greet' => 'Hello Todo List!'));
     }

     public function deleteAction()
     {
     }
     
     public function getTodoTable()
     {
         if (!$this->todoTable) {
             $sm = $this->getServiceLocator();
             $this->todoTable = $sm->get('Todo\Model\todoTable');
         }
         return $this->todoTable;
     }
 }