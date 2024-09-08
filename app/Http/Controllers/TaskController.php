<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController
{
    public function getTasks(){
        return "Tasks lists";
    }

    public function getTaskById($id){
        return "Task ".$id;
    }

    public function createTask(){
        return "Create task";
    }
    
    public function editTask($id){
        return "Task ".$id." edited";
    }

    public function deleteTask($id){
        return "Task ".$id." deleted";
    }
}
