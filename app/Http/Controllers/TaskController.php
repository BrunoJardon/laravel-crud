<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController {
    public function getTasks() {
        $tasks = Task::all();

        if($tasks -> isEmpty()){
            $data = [
                'message' => 'No hay tareas pendiente',
                'status' => 200
            ];

            return response()->json($data, 200);
        }

        return response()->json($tasks, 200);
    }

    public function getTaskById($id) {
        return "Task ".$id;
    }

    public function createTask() {
        return "Create task";
    }
    
    public function editTask($id) {
        return "Task ".$id." edited";
    }

    public function deleteTask($id) {
        return "Task ".$id." deleted";
    }
}
