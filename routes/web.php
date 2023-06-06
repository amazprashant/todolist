<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
include(app_path().'/global_constants.php');

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
    return view('welcome');
});
Route::get("index",[TodoController::class,'index'])->name('index');
Route::post("add",[TodoController::class,'add'])->name('add');
Route::get("delete/{id}", [TodoController::class, 'delete'])->name('delete');





//Route::get("login",[LoginController::class,'index'])->name('login');
/* Route::group(['middleware' => 'web'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('/', [LoginController::class, 'profile'])->name('profile');
}); */