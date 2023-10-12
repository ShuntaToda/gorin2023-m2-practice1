<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function show($id)
    {
        $user = User::find($id);
        return view("showUser", compact("user"));
    }

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
            "password" => "required|confirmed",
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role,
            "password" => Hash::make($request->password),
        ]);
        // リダイレクトで画面遷移をするためにはwithメソッドを用いる必要がある
        // 逆に直接viewで表示するときにはcompactなどで値を渡すことができる
        // ちなみに配列などもwithは送信できる
        return redirect(route("admin.createUser"))->with("message", "登録完了しました");
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("editUser", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "role" => "required",
        ]);
        $user = User::find($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role,
            "is_active" => $request->is_active == "on" ? 1 : 0
        ]);

        return redirect(route("home"))->with("message", "更新完了しました");
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $message = "削除しました。";
        return redirect(route("home"))->with(compact("message"));
    }
}
