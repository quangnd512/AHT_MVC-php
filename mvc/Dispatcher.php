<?php
namespace mvc;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        // var_dump($this->request);
        // die;

        Router::parse($this->request->url, $this->request); 
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);

        exit;
        
    }

    public function loadController()
    {
        $controller =  new \mvc\Controllers\TasksController;
        // var_dump($controller);
        // die;
        return $controller;
    }

}