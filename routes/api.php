<?php

use App\Http\Controllers\api\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', function (Request $request) {
    $check = $request->only("name", "password");
    if (Auth::attempt(($check))) {
        $request->session()->regenerate();
        $token = $request->user()->createToken("token");
        return response()->json([Auth::user(), "token" => $token->plainTextToken]);
    }
    return response()->json(false);
});

Route::group(["middleware" => ["auth:sanctum", "can:admin-higher"], "prefix" => "admin"], function () {
    Route::get("/user/{id}", [AdminController::class, "show"]);
});
