<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function userView(){
        $users = User::all();
        return view("superadmin.user.main", ["users" => $users]);
    }
}
