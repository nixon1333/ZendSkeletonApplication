<?php

namespace Todo\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;

 class TodoController extends AbstractActionController
 {
     public function indexAction()
     {
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
 }