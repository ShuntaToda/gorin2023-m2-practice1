<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $users = User::all();
    return view('home', compact("users"));
})->name("home");

Route::get('/login', [LoginController::class, "index"])->name("login");
Route::post('/login', [LoginController::class, "login"]);

Route::get('/logout', [LoginController::class, "logout"])->name("logout");

Route::group(['middleware' => ['auth', "can:admin-higher"], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('user/create', [AdminController::class, "createUser"])->name("createUser");
    Route::post('user/create', [AdminController::class, "storeUser"])->name("createUser");
    Route::get('user/{id}', [AdminController::class, "show"])->name("show");
    Route::delete('user/{id}', [AdminController::class, "destroy"])->name("delete");
    Route::get('user/edit/{id}', [AdminController::class, "edit"])->name("edit");
    Route::put('user/edit/{id}', [AdminController::class, "update"])->name("update");
});

Route::group(['middleware' => ['auth'],  'as' => 'user.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
