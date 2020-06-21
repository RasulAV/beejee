<?php

namespace App\Controllers;

use \Core\View;
use \App\Flash;
use \App\Models\Tasks as ModelTasks;

/**
 * Tasks controller
 *
 * PHP version 7.3
 */
class Tasks extends \Core\Controller
{
	/**
     * Error messages
     *
     * @var array
     */
	public $errors = [];
	
	/**
     * Validate task values, adding valiation error messages to the errors array property
     *
     * @return boolean
     */
    public function validateTask()
    {
        // Name
        if ( empty($_POST['name']) ) {
	        
            $this->errors[] = 'Необходимо вести имя';
        };
        
        // Description
        if ( empty($_POST['description']) ) {
	        
            $this->errors[] = 'Необходимо вести описание';
        };

        // Email address
        if( empty($_POST['email'] ) ){
	        
	        $this->errors[] = 'Необходимо вести e-mail';
	        
        } elseif ( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false ) {
	        
            $this->errors[] = 'Введите корректный email';
        }
    }

    /**
     * Show the tasks page
     *
     * @return void
     */
    public function showAction()
    {
	    if( isset($this->route_params['limit']) && isset($this->route_params['pageno']) ) {
			$limit = intval($this->route_params['limit']);
			$pageno = intval($this->route_params['pageno']);
		} else {
			$limit = 3;
			$pageno = 1;
		};

		$orderby= $this->route_params['orderby'] ?? 'name';
		$ascdesc= $this->route_params['ascdesc'] ?? 'asc';
		 
		$num= ModelTasks::countRows($pageno, $limit);
		$this->view_params['paginator']= array("num"=>$num, "pageno"=>$pageno, "limit"=>$limit);
	    $this->view_params['tasks']= ModelTasks::getAll($pageno, $limit, $orderby, $ascdesc);
	    $this->view_params['orderby']= $orderby;
	    $this->view_params['ascdesc']= $ascdesc;

        View::renderTemplate('Tasks/show.html', $this->view_params);
    }
    
    /**
     * Show new task page
     *
     * @return void
     */
    public function newAction()
    {	
	    View::renderTemplate('Tasks/new.html');
	}
	
	/**
     * Add new task 
     *
     * @return void
     */
    public function addAction()
    {	
	    $this->validateTask();
	    
    	$name= $_POST['name'];
	    $email= $_POST['email'];
	    $descr= $_POST['description'];
	    
	    if(empty($this->errors)){
		    
		    if(ModelTasks::add($name, $email, $descr)){
			    
		    	Flash::addMessage('Задача для '. $_POST['email'].' успешно добавлена', Flash::INFO);
		    } else {
			    
			    Flash::addMessage('При добавлении задачи произошла ошибка, попробуйте ещё раз', Flash::WARNING);
		    }
		    $this->redirect('/');
	    } else {
		    
		    $errorMsg= 'Исправьте следующие недочеты: ';
		    
		    foreach ($this->errors as $error) {
			    $errorMsg.= ' '.$error. ';  ';
		    };
		    
		    Flash::addMessage($errorMsg, Flash::WARNING);

		    View::renderTemplate('Tasks/new.html', ['name' => $name, 'email' => $email, 'descr' => $descr ]);
	    }  
	}
	
	/**
     * Edit task 
     *
     * @return void
     */
    public function editAction()
    {	
	    $this->requireLogin();
	    
		$id= $this->route_params['id'];
		
	    $this->view_params['task']= ModelTasks::edit($id);
	    $this->view_params['id']= $id;
	    
	    View::renderTemplate('Tasks/edit.html', $this->view_params);
    }	
    
    /**
	* Update edited Task 
	*
	* @return void
	*/
	public function updateAction()
	{	
		$this->requireLogin();
		
		$id= $_POST['id'];
		$descr= $_POST['description'];
		$isdone= isset($_POST['isdone']) ? '1' : '0';
		
		if(ModelTasks::update($id, $descr, $isdone)){
	    	Flash::addMessage('Задача No:'. $_POST['id'].' успешно отредактирована', Flash::INFO);
		} else {
		    Flash::addMessage('При редактировании произошла ошибка, пожалуйста попробуйте ещё раз', Flash::WARNING);
		};
		
		$this->redirect('/');	
	}
}