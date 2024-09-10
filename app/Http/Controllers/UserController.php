<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController {
    public function getUser($id){
        return 'Get user '.$id.' data';
    }

    public function createUser(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha:ascii|max:25',
            'surname' => 'required|alpha:ascii|max:25',
            'password' => 'required|max:75',
            'email' => 'required|email|max:75',
            'phone' => 'required|max:14'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error at validate',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if(!$user){
            $data = [
                'message' => 'Error at create the user',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'user' => $user,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function editUser($id){
        return 'Edit user '.$id.' data';
    }

    public function deleteUser($id){
        return 'Delete user '.$id;
    }
}
