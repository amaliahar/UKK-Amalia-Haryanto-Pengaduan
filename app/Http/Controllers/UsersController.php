<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $user = user::latest();
        return view('user.index', compact('user'))
            ->with('i', (request()->input('page', 1) -1) * 500);
    }
}


