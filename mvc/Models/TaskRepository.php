<?php
namespace mvc\Models;

use mvc\Models\TaskResourceModel;
use mvc\Models\TaskModel;

class TaskRepository
{
    protected $taskResourceModel;
    
    public function __construct()
    {
        $this->taskResaurceModel = new TaskResourceModel();
    }

    public function add($model) 
    {
        return  $this->taskResaurceModel->save($model);
    }

    public function edit($model)
    {
        return $this->taskResaurceModel->save($model);
    }

    public function delete(\mvc\Models\TaskModel $model)
    {
    
        return $this->taskResaurceModel->delete($model);     
    }

    public function get(int $id)
    {
        return $this->taskResaurceModel->find($id);
    }

    public function getAll($model)
    {
        return $this->taskResaurceModel->all($model);
    }
}