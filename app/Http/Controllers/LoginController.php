<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view("login");
    }
    public function login(Request $request) {

        $check = $request->only("name", "password");
        if(Auth::attempt(($check))){
            $users = User::all();
            $request->session()->regenerate();
            return redirect(route("home", compact("users")));
        }

        return back()->withErrors(["message" => "アカウントまたはパスワードが正しくありません"]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->flush();

        return redirect(route("login"));
    }
}
