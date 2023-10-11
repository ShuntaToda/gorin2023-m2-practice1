<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createUser()
    {
        return view("createUser");
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "role" => "required",
            "password" => "required",
            "confirm" => "required",
        ]);
        dd($request);
        return view("createUser");
    }
}
