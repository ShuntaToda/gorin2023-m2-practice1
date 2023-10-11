<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        $deleteMessage = "削除しました。";
        return redirect(route("home"))->with(compact("deleteMessage"));
    }
}
