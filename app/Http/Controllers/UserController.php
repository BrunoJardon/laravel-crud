<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController {
    public function getUser($id){
        return 'Get user '.$id.' data';
    }

    public function createUser(){
        return 'Create a user';
    }

    public function editUser($id){
        return 'Edit user '.$id.' data';
    }

    public function deleteUser($id){
        return 'Delete user '.$id;
    }
}
