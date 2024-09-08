<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController {
    public function getTasks() {
        $tasks = Task::all();

        if($tasks -> isEmpty()){
            $data = [
                'message' => 'You dont have any task',
                'status' => 200
            ];

            return response()->json($data, 200);
        }

        return response()->json($tasks, 200);
    }

    public function getTaskById($id) {
        return "Task ".$id;
    }

    public function createTask(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:25',
            'description' => 'max:255',
            'done' => 'required|boolean'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error at validate',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'done' => $request->done
        ]);

        if(!$task){
            $data = [
                'message' => 'Error at create the task',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'task' => $task,
            'status' => 201
        ];

        return response()->json($data, 201);
    }
    
    public function editTask($id) {
        return "Task ".$id." edited";
    }

    public function deleteTask($id) {
        return "Task ".$id." deleted";
    }
}
