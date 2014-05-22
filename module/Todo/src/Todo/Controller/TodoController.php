<?php

namespace Todo\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Todo\Model\Todo;
 use Todo\Form\TodoForm;   
 
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
        $form = new TodoForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $todo = new Todo();
            $form->setInputFilter($todo->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $todo->exchangeArray($form->getData());
                $this->getTodoTable()->saveTodo($todo);

                // Redirect to list of todos
                return $this->redirect()->toRoute('todo');
            }
        }
        return array('form' => $form);

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