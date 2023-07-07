<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $req) {
        $user = ['email' => $req->email , 'password' => $req->password];
        return response()->json($user);
    }
}
