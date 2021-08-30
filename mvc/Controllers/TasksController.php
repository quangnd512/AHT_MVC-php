<?php
namespace mvc\Controllers;

use mvc\Core\Controller;
use mvc\Models\TaskModel;
use mvc\Models\TaskRepository;

class TasksController extends Controller {

    public function index() 
    {
        $tasks = new TaskModel();
        $taskRespository = new TaskRepository();

        $d['tasks'] = $taskRespository->getAll($tasks);
        $this->set($d);
        $this->render("index");     
    }

      
    public function create()
    {
        if(!empty(isset($_POST['title'])) && !empty(isset($_POST['description'])) ){
            $tasks = new TaskModel();
            $taskRespository = new TaskRepository();

            $tasks->setTitle($_POST['title']);
            $tasks->setDescription($_POST['description']); 
                   
            if($taskRespository->add($tasks)){
                header("location: " . WEBROOT . "tasks/index");
            }
        }
        $this->render("create");
    }


    public function edit($id)
    {
        $taskRespository = new TaskRepository();

        $d['tasks'] = $taskRespository->get($id);  

        if(isset($_POST['title'])){    

            $tasks = new TaskModel();

            $tasks->setId($id);   
            $tasks->setTitle($_POST['title']);
            $tasks->setDescription($_POST['description']);
            
            if($taskRespository->edit($tasks)){
                header("location:" . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id)
    {
        $tasks = new TaskModel();
        $taskRespository = new TaskRepository();
        $tasks->setId($id);

        if($taskRespository->delete($tasks)){
            header("location:" . WEBROOT . "tasks/index");
        }  
    }
}