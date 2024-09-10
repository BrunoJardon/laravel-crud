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
        $task = Task::find($id);

        if(!$task){
            $data = [
                'message' => 'Task not found',
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $data = [
            'task' => $task,
            'status' => 200
        ];

        return response()->json($data, 200);
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
    
    public function editTask(Request $request, $id) {
        $task = Task::find($id);

        if(!$task){
            $data = [
                'message' => 'Task not found',
                'status' => 400
            ];
            return response()->json($data, 400);
        }

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

        $task->title = $request->title;
        $task->description = $request->description;
        $task->done = $request->done;

        $task->save();

        $data = [
            'task' => "Task edited",
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function deleteTask($id) {
        $task = Task::find($id);

        if(!$task){
            $data = [
                'message' => 'Task not found',
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $task->delete();

        $data = [
            'task' => 'Task deleted',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
