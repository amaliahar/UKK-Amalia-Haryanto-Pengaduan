<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        $data = array(
            'id' => "users",
            'user' => User::all(),
        );
        return view('user.index')->with($data);
    }

    public function show($id){
        $users = Users::find($id);
        return User::find($id);
    }


}


